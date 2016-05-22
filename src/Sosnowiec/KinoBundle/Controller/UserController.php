<?php

namespace Sosnowiec\KinoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        $rezerwacje= $em->getRepository('SosnowiecKinoBundle:Rezerwacje')->findByuzytkownicyUzytkownika($id);

        return $this->render("SosnowiecKinoBundle:User:rezerwacje.html.twig", array(
            'rezerwacje' => $rezerwacje
        ));
    }


}
