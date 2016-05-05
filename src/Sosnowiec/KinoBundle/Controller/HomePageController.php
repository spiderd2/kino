<?php

namespace Sosnowiec\KinoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Sosnowiec\KinoBundle\Entity\Uzytkownicy;
use Sosnowiec\KinoBundle\Modals\Login;

/**
 * @Route("/kino")
 */
class HomePageController extends Controller {

    /**
     * @Route("/", 
     * name="sosnowiec_kino_index"
     * )
     * 
     * @Template
     */
    public function indexAction() {

        return array();
    }

    /**
     * @Route("/login",
     *      name="sosnowiec_kino_login")
     * 
     * @Template
     */
    public function loginAction(Request $request) {
        $session = $request->getSession();
        //$session = $this->get('request')->getSession();
        //->getEntityManager();
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
            $email = $request->get('email');
            $password = $request->get('password');
            $remember = $request->get('remember');

            $username = $repository->findOneBy(array(
                'email' => $email,
                'haslo' => $password
            ));

            if ($username) {
                if ($remember == 'remember-me') {
                    $login = new Login();
                    $login->setUsername($email);
                    $login->setPassword($password);
                    $session->set('login', $login);
                }
                return $this->render('SosnowiecKinoBundle:HomePage:welcome.html.twig', array(
                            'name' => $username->getImie()
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

            //->getEntityManager();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $redirectUrl = $this->generateUrl('sosnowiec_kino_login');
            return $this->redirect($redirectUrl);
            //return $this->render('SosnowiecKinoBundle:HomePage:login.html.twig');
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
        $session = $this->get('request')->getSession();
        $session->clear();

        $redirectUrl = $this->generateUrl('sosnowiec_kino_login');
        return $this->redirect($redirectUrl);
    }

}
