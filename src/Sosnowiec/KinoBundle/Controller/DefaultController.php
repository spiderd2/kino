<?php

namespace Sosnowiec\KinoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SosnowiecKinoBundle:Default:index.html.twig', array('name' => $name));
    }

    
    public function registerUserAction(){
        $responseMsg = 'Rejestracja uzytkownika';
        return new \Symfony\Component\HttpFoundation\Response($responseMsg);
    }
    
    /**
     * 
     * @Route(
     *      "/register-tester",
     *      name="sosnowiec_kino_resisterTester"
     *      )
     * 
     * @Method({"GET"})
     */
     public function registerTesterAction(){
        $responseMsg = 'Rejestracja testera';
        return new \Symfony\Component\HttpFoundation\Response($responseMsg);
    }
    
    
}
