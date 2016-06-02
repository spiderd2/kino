<?php

namespace Sosnowiec\KinoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use nSolutions\Filmweb;

class ShowController extends Controller {


     /**
     * @Route(
      *     "/repertuar",
     *      name="sosnowiec_kino_repertuar")
     *
     * @Template
     */
    public function repertuarAction() {


        $em = $this->getDoctrine()->getManager();
        $rows = $em->getRepository('SosnowiecKinoBundle:Seanse')->findAllShows();
        //dump($rows);die;
        return $this->render("SosnowiecKinoBundle:Show:repertuar.html.twig", array(
            'rows' => $rows
        ));
    }


    /**
     * @Route(
     *     "/repertuar/{title}",
     *      name="sosnowiec_kino_repertuar_film")
     *
     * @Template
     */
    public function repertuarFilmuAction($title) {


        $em = $this->getDoctrine()->getManager();
        $rows = $em->getRepository('SosnowiecKinoBundle:Seanse')->findShowByTitle($title);
        $movie = $em->getRepository('SosnowiecKinoBundle:Seanse')->findOneByTitle($title);
        //dump($movie);die;
        return $this->render("SosnowiecKinoBundle:Show:repertuarFilmu.html.twig", array(
            'movie' => $movie,
            'rows' => $rows
        ));
    }
}
