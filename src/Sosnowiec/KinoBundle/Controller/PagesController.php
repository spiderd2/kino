<?php

namespace Sosnowiec\KinoBundle\Controller;
    
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Component\HttpFoundation\Response;
     use Symfony\Component\HttpFoundation\Request;
    
class PagesController extends Controller{
    
    /**
     * @Route("/about")
     * 
     * @Template("SosnowiecKinoBundle:Pages:about.html.twig")
     */
    public function aboutAction(){
        //return new Response('about');
        
        
       $content = $this->renderView('SosnowiecKinoBundle:Pages:about.html.twig');
       return new Response($content);
    }
    
    /**
     * @Route("/print-header/{title}/{color}")
     * 
     * @Template
     */
    public function printHeaderAction($title, $color){
 //       return new Response("aa");
        return array(
            'title' => $title,
            'color' => $color
        );
    }
    /**
     * @Route("/contact")
     */
    public function contactPageAction(){
        return $this->forward('SosnowiecKinoBundle:Pages:printHeader', array(
             'title' => 'Kontakt',
            'color' => 'blue'
        ));
    }
    
    /**
     * @Route("/mastering-request")
     */
    public function masteringRequestAction(Request $Request){
        return new Response($Request->get('_route'));
    }
}
