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

        $filmweb = Filmweb::instance();


        $em = $this->getDoctrine()->getManager();
        $rows = $em->getRepository('SosnowiecKinoBundle:Seanse')->findAllShows();
        foreach($rows as $row){
            $filmwebID = $row->getFilmyFilmu()->getFilmwebId();
            $filminfo=$filmweb->getFilmInfoFull($filmwebID)->execute();
            $row->image = $filminfo->imagePath;
        }

        return $this->render("SosnowiecKinoBundle:Show:repertuar.html.twig", array(
            'rows' => $rows
        ));
    }
}
