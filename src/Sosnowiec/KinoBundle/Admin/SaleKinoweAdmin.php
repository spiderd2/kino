<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class SaleKinoweAdmin extends Admin
{
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
      
           
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            
                ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            
           ;
    }
}
?>