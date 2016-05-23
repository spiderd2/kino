<?php

namespace Sosnowiec\KinoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use nSolutions\Filmweb;

class BookController extends Controller {

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
        $idSaliKinowej=$seans->getSaleKinoweSaleKinowe();
        $miejsca = $em->getRepository('SosnowiecKinoBundle:Miejsca')->findBysaleKinoweSaleKinowe($idSaliKinowej);
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
                    'miejsca' => $miejsca
        ));
    }

    

}
