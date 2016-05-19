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
      
            $formMapper->add('nazwa');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nazwa');
            
                ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nazwa')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }
}
?>