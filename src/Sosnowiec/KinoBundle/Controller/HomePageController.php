<?php

namespace Sosnowiec\KinoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
     * @Route("/kino")
     */
class HomePageController extends Controller{
    
    /**
     * @Route("/")
     * 
     * @Template
     */
    public function indexAction(){
              
        return array();
    }
}
