<?php

namespace Sosnowiec\KinoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use nSolutions\Filmweb;
use Sosnowiec\KinoBundle\Entity\Rezerwacje;
use Sosnowiec\KinoBundle\Entity\Seanse;
use Sosnowiec\KinoBundle\Entity\MiejscaZajete;
use Sosnowiec\KinoBundle\Entity\Bilety;

class BookController extends Controller {

    /**
     * @Route(
     *     "/book/confirm",
     *      name="sosnowiec_kino_book_confirm")
     *
     * @Template
     */
    public function potwierdzenieAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $json = $request->get('json');
            $json = json_decode($json);

            //sprawdzam czy miejsca są zajete
            $em = $this->getDoctrine()->getManager();
            foreach ($json->bilety as $bilet) {
                
                $zajete = $em->getRepository('SosnowiecKinoBundle:MiejscaZajete')->findOneBy(array(
                    'seanseSeansu' => $json->id_seansu,
                    'miejscaMiejsca' => $bilet->id_miejsca
                ));
                
                if ($zajete) {
                    if ($zajete->getZajete()) {
                        return new Response("miejca zostaly zajete w miedzyczasie przez kogos innego. Spróbuj jeszcze raz");
                    }
                }
            }
            foreach ($json->bilety as $bilet) {
                $zajete = $em->getRepository('SosnowiecKinoBundle:MiejscaZajete')->findOneBy(array(
                    'seanseSeansu' => $json->id_seansu,
                    'miejscaMiejsca' => $bilet->id_miejsca
                ));
                $seans = $em->getRepository('SosnowiecKinoBundle:Seanse')->find($json->id_seansu);
                $miejsce = $em->getRepository('SosnowiecKinoBundle:Miejsca')->find($bilet->id_miejsca);
                //1 $zajete->setZajete(true);
                //2 $bilet->id_miejsca
                //3 $json->id_seansu
                if (!$zajete) {
                    $Miejsce = new MiejscaZajete();
                    $Miejsce->setZajete(true); //ok
                    $Miejsce->setSeanseSeansu($seans); //ok
                    $Miejsce->setMiejscaMiejsca($miejsce); //ok
                    //sprawdza poprawnosc
                    $validator = $this->get('validator');
                    $errors = $validator->validate($Miejsce);
                    if (count($errors) > 0) {
                        return new Response(print_r($errors, true));
                    } else {
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($Miejsce);
                        $em->flush();
                    }
                } else {//jezeli juz jest w bazie to trzeba zmienic
                    $zajete->setZajete(true);
                    $validator = $this->get('validator');
                    $errors = $validator->validate($zajete);
                    if (count($errors) > 0) {
                        return new Response(print_r($errors, true));
                    } else {
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($zajete);
                        $em->flush();
                    }
                }
                $Bilecik = new Bilety();
                $rezerwacja = $em->getRepository('SosnowiecKinoBundle:Rezerwacje')->find($json->id_rezerwacji);
                $cena = $em->getRepository('SosnowiecKinoBundle:Ceny')->find($bilet->id_ceny);
                
                $Bilecik->setCenyceny($cena);
                $Bilecik->setMiejscaMiejsca($miejsce);
                $Bilecik->setRezerwacjeRezerwacji($rezerwacja);
                $validator = $this->get('validator');
                    $errors = $validator->validate($Bilecik);
                    if (count($errors) > 0) {
                        return new Response(print_r($errors, true));
                    } else {
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($Bilecik);
                        $em->flush();
                    }
            }

            return array('json' => $json);
        }
    }

    /**
     * @Route(
     *     "/book/tickets",
     *      name="sosnowiec_kino_tickets")
     *
     * @Template
     */
    public function wyborBiletowAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $elements = $request->get('elements');
            //$elements = explode(',', $elements);//robi ze stringa tablice
            $id_seansu = $request->get('id_seansu');

            $id_uzytkownika = $request->getSession()->get('id');
            $em = $this->getDoctrine()->getManager();
            $uzytkownik = $em->getRepository('SosnowiecKinoBundle:Uzytkownicy')->find($id_uzytkownika);
            $seans = $em->getRepository('SosnowiecKinoBundle:Seanse')->find($id_seansu);
            $seans->getRozpoczecie()->getTimeStamp();


            $weekend = (date('N', $seans->getRozpoczecie()->getTimeStamp()) >= 5) ? 1 : 0; //jezeli to weekend - zwroc 1





            $Rezerwacja = new Rezerwacje();
            $Rezerwacja->setUzytkownicyUzytkownika($uzytkownik);
            $Rezerwacja->setSeanseSeansu($seans);

            //zabawa z cenami dzien roboczy/weekend
            $ceny = $em->getRepository('SosnowiecKinoBundle:Ceny')->findAll();
            if ($weekend === 1) {
                foreach ($ceny as $cena) {
                    $cena->koszt = $cena->getCenaWeekend();
                    $cena->id_ceny =$cena->getIdCeny();
                }
            } else {
                foreach ($ceny as $cena) {
                    $cena->koszt = $cena->getCena();
                    $cena->id_ceny =$cena->getIdCeny();
                }
            }

            //sprawdza poprawnosc tworzonej rezerwacji
            $validator = $this->get('validator');
            $errors = $validator->validate($Rezerwacja);
            if (count($errors) > 0) {
                return new Response(print_r($errors, true));
            } else {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($Rezerwacja);
                $em->flush();
                $idRezerwacji = $Rezerwacja->getIdRezerwacji();
                return $this->render("SosnowiecKinoBundle:Book:wyborBiletow.html.twig", array(
                            'rezerwacja' => $idRezerwacji,
                            'miejsca' => $elements,
                            'ceny' => $ceny,
                            'id_seansu' => $id_seansu
                ));
            }

            return new Response("cos nie tak");
        }
    }

    /**
     * @Route(
     *     "/book/{id_seansu}/",
     *      name="sosnowiec_kino_book")
     *
     * @Template
     */
    public function wyborSiedzenAction($id_seansu) {
        //id to identyfikator seansu
        //
            //MIEJSCAZAJETE
//    private $zajete; 
//    private $idmiejscaZajete;
//    private $seanseSeansu;
//    private $miejscaMiejsca;


        $em = $this->getDoctrine()->getManager();
        $seans = $em->getRepository('SosnowiecKinoBundle:Seanse')->find($id_seansu);
        $idSali = $seans->getSaleKinoweSaleKinowe();
        $miejsca = $em->getRepository('SosnowiecKinoBundle:Miejsca')->findBysaleKinoweSaleKinowe($idSali);
        $miejsca_zajete = $em->getRepository('SosnowiecKinoBundle:MiejscaZajete');

        //w tej petli dodajemy informacje o tym, czy miejsce jest zajete
        foreach ($miejsca as $miejsce) {

            $zajete = $miejsca_zajete->findOneBy(array(
                'seanseSeansu' => $id_seansu,
                'miejscaMiejsca' => $miejsce->getIdMiejsca()
            ));

            if ($zajete) {
                if ($zajete->getZajete()) {
                    //dane miejsce jest juz zajete
                    $miejsce->zajete = true;
                } else {
                    $miejsce->zajete = false;
                }
            } else {
                $miejsce->zajete = false;
            }
        }

        return $this->render("SosnowiecKinoBundle:Book:wyborSiedzen.html.twig", array(
                    'miejsca' => $miejsca,
                    'id_seansu' => $id_seansu
        ));
    }

}
