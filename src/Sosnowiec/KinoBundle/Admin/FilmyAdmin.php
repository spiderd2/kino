<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class FilmyAdmin extends Admin
{
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper->add('tytul')
              ->add('filmwebId')
              ;
           
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('tytul')
              ->add('filmwebId')
            
                ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('tytul')
              ->add('filmwebId')
              ;
    }
}
?>