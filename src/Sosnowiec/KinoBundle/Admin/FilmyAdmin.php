<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use nSolutions\Filmweb;
use Goutte\Client;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\DomCrawler\Crawler;

class FilmyAdmin extends Admin
{
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        if ($this->id($this->getSubject())) {
            $formMapper
                ->add('tytul');
        }
        else {
            $formMapper
                ->add('url', 'text');
        }

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('tytul')
              ->add('filmwebId');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('tytul')
              ->add('filmwebId')
              ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('filmwebId')
            ->add('tytul')
        ;
    }

    public function prePersist($obj)
    {
        if (!($this->id($this->getSubject()))) {
            $client = new Client();
            $crawler = $client->request('GET', $obj->getUrl());
            $filmwebId = $crawler->filter('body a')->each(function (Crawler $node, $i) {
                $id = $node->attr('data-filmid');
                if ($id != null) {
                    return $id;
                }
            });

            $id = null;
            foreach ($filmwebId as $value){
                if ($value !== null){
                    $id = $value;
                }
            }
            $filmweb = Filmweb::instance();
            $filminfo = $filmweb->getFilmInfoFull($id)->execute();
            $obj->setTytul($filminfo->title);
            $obj->setFilmwebId($id);
        }

    }
}
?>