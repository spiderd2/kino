<?php

namespace Sosnowiec\KinoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use nSolutions\Filmweb;

class UserController extends Controller {

    /**
     * @Route(
     *     "/rezerwacje/{id}",
     *      name="sosnowiec_kino_rezerwacje")
     *
     * @Template
     */
    public function rezerwacjeAction($id) {

        $em = $this->getDoctrine()->getManager();
        $rezerwacje = $em->getRepository('SosnowiecKinoBundle:Rezerwacje')->findByuzytkownicyUzytkownika($id);

        $filmweb = Filmweb::instance();

        //szukam wszystkich ID rezerwacji, by potem zsumować ilosc kupionych biletów

        foreach ($rezerwacje as $val) {
            $bilety = $em->getRepository('SosnowiecKinoBundle:Bilety')->findByrezerwacjeRezerwacji($val->getIdRezerwacji());
            $val->ileBiletow = count($bilety);
            $filmwebID = $val->getSeanseSeansu()->getFilmyFilmu()->getFilmwebId();
            $filminfo = $filmweb->getFilmInfoFull($filmwebID)->execute();
            $val->image = $filminfo->imagePath;
        }



        return $this->render("SosnowiecKinoBundle:User:rezerwacje.html.twig", array(
                    'rezerwacje' => $rezerwacje
        ));
    }

    /**
     * @Route(
     *     "/usun/{rezerwacja}",
     *      name="sosnowiec_kino_rezerwacje_usun")

     */
    public function usunRezerwacjeAction($rezerwacja) {

        $em = $this->getDoctrine()->getManager();
        $rezerwacje = $this->getDoctrine()->getRepository('SosnowiecKinoBundle:Rezerwacje')->find($rezerwacja);

        //szukam wszystkich biletow, by potem usunac kazdy bilet, a na koncu rezerwacje


        $bilety = $this->getDoctrine()->getRepository('SosnowiecKinoBundle:Bilety')->findByrezerwacjeRezerwacji($rezerwacje->getIdRezerwacji());

        foreach ($bilety as $bilet) {


            if (NULL == $bilet) {
                throw $this->createNotFoundException("Nie znaleziono biletow do usuniecia");
            }

            $em->remove($bilet);
        }
        $em->flush();


        if (NULL == $rezerwacje) {
            throw $this->createNotFoundException("Nie znaleziono rezerwacji do usuniecia");
        }
        $em->remove($rezerwacje);
        $em->flush();

        $redirectUrl = $this->generateUrl('sosnowiec_kino_rezerwacje', array(
            'id' => 1
        ));
        return $this->redirect($redirectUrl);
    }

}
