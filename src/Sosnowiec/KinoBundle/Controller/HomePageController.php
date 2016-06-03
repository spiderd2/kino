<?php

namespace Sosnowiec\KinoBundle\Controller;

use Sosnowiec\KinoBundle\SosnowiecKinoBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Sosnowiec\KinoBundle\Entity\Uzytkownicy;
use Sosnowiec\KinoBundle\Modals\Login;

/**
 * @Route("/")
 */
class HomePageController extends Controller {

    /**
     * @Route("/", 
     * name="sosnowiec_kino_index"
     * )
     * 
     * @Template
     */
    public function indexAction(Request $request) {
        
        $em = $this->getDoctrine()->getManager();
        $rows = $em->getRepository('SosnowiecKinoBundle:Seanse')->findLimitedShows(3);
        //dump($rows);die;
        
        if(NULL!=$this->getUser() && $this->getUser() instanceof Uzytkownicy){
        $session = $request->getSession();
        $session->set('id', $this->getUser()->getIdUzytkownika());
        }

        return $this->render("SosnowiecKinoBundle:HomePage:index.html.twig", array(
            'rows' => $rows
        ));
    }

    /**
     * @Route("/login",
     *      name="sosnowiec_kino_login")
     * 
     * @Template
     */
    public function loginAction(Request $request) {
        $session = $request->getSession();
        
        $authenticationUtils = $this->get('security.authentication_utils');
                // get the login error if there is one
                $error = $authenticationUtils->getLastAuthenticationError();

                // last username entered by the user
                $lastUsername = $authenticationUtils->getLastUsername();
        

//        $session = $this->getRequest()->getSession();
//        $em = $this->getDoctrine()->getEntityManager();
        
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SosnowiecKinoBundle:Uzytkownicy');
        if ($session->has('login')) {
            $login = $session->get('login');
            $email = $login->getUsername();
            $password = $login->getPassword();
            $username = $repository->findOneBy(array(
                'email' => $email,
                'haslo' => $password
            ));

            if ($username) {
                return $this->render('SosnowiecKinoBundle:HomePage:welcome.html.twig', array(
                            'name' => $username->getImie()
                ));
            }
        }
        if ($request->getMethod() == 'POST') {
            $session->clear();
            $email = $request->get('_username');
            $password = $request->get('_password');
            

            $username = $repository->findOneBy(array(
                'email' => $email,
                'haslo' => $password
            ));

            if ($username) {
                
                
                $login = new Login();
                $login->setUsername($email);
                $login->setPassword($password);
                $session->set('login', $login);
                $session->set('username', $username->getLogin());

                return $this->render('SosnowiecKinoBundle:HomePage:welcome.html.twig', array(
                            'name' => $username->getImie(),
                            'last_username' => $lastUsername,
                            'error' => $error,
                ));
            } else {
                if ($session->has('login')) {
                    $login = $session->get('login');
                    $email = $login->getUsername();
                    $password = $login->getPassword();
                    $username = $repository->findOneBy(array(
                        'email' => $email,
                        'haslo' => $password
                    ));

                    if ($username) {
                        return $this->render('SosnowiecKinoBundle:HomePage:welcome.html.twig', array(
                                    'name' => $username->getImie()
                        ));
                    }
                }
                return $this->render('SosnowiecKinoBundle:HomePage:login.html.twig', array(
                            'msg' => "Podano nieprawidłowe dane"
                ));
            }
        }
        //return array();
    }

    /**
     * @Route("/register",
     *      name="sosnowiec_kino_register")
     * 
     * @Template
     */
    public function registerAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $login = $request->get('login');
            $imie = $request->get('imie');
            $nazwisko = $request->get('nazwisko');
            $email = $request->get('email');
            $haslo = $request->get('haslo');
            $telefon = $request->get('telefon');

            $user = new Uzytkownicy();
            $user->setEmail($email);
            $user->setHaslo($haslo);
            $user->setImie($imie);
            $user->setLogin($login);
            $user->setNazwisko($nazwisko);
            $user->setTelefon($telefon);


            //sprawdza poprawnosc zgodnie z Entity/Uzytkownicy
            $validator = $this->get('validator');
            $errors = $validator->validate($user);
            if (count($errors) > 0) {
                return new Response(print_r($errors, true));
            } else {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();
                $message = \Swift_Message::newInstance()
                    ->setSubject('Potwierdzenie rejestracji')
                    ->setFrom(array('kino.kremowka@gmail.com'=>'Kino'))
                    ->setTo(array($email=>$login))
                    ->setBody('Dziekujemy za rejestracje.');
                $this->get('mailer')->send($message);
                $redirectUrl = $this->generateUrl('sosnowiec_kino_login');
                return $this->redirect($redirectUrl);
                //return $this->render('SosnowiecKinoBundle:HomePage:login.html.twig');
            }
        }
    }

    /**
     * @Route("/welcome",
     *      name="sosnowiec_kino_welcome")
     * 
     * @Template
     */
    public function welcomeAction() {

        return array();
    }

    /**
     * @Route("/logout",
     *      name="sosnowiec_kino_logout")
     * 
     * @Template
     */
    public function logoutAction() {
        $session = $this->getRequest()->getSession();
        $session->clear();

        $redirectUrl = $this->generateUrl('sosnowiec_kino_login');
        return $this->redirect($redirectUrl);
    }

     /**
     * @Route("/cennik",
     *      name="sosnowiec_kino_cennik")
     * 
     * @Template
     */
    public function cennikAction() 
    {
        $em = $this->getDoctrine()->getManager();
        
        $ticketPrices = $em->getRepository('SosnowiecKinoBundle:Ceny')->findAll();
       
        return $this->render('SosnowiecKinoBundle:HomePage:cennik.html.twig', [
            'ticketPrices' => $ticketPrices,
        ]);
    }
    
     /**
     * @Route("/kontakt",
     *      name="sosnowiec_kino_kontakt")
     * 
     * @Template
     */
    public function kontaktAction() {
       
        return array();
    }
}
