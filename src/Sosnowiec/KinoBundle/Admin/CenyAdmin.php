<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class CenyAdmin extends Admin
{
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper->add('rodzaj')
                ->add('cena')
                ;
           
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('rodzaj')
                ->add('cena')            
                ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('rodzaj')
                ->add('cena')
                ;
            
           ;
    }
}
?>