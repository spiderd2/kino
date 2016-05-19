<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class MiejscaAdmin extends Admin
{
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
      
          $formMapper->add('miejsce')
                  ->add('rzad')
                  ->add('saleKinoweSaleKinowe', 'entity', array(
            'class' => 'Sosnowiec\KinoBundle\Entity\SaleKinowe',
            'property' => 'nazwa',
            'label' => 'Sala kinowa'
        ))
            ;
                 
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('idMiejsca')
                ->add('rzad')
                ->add('miejsce')
                ->add('saleKinoweSaleKinowe.nazwa', null, array('label' => 'Sala'))
            
                ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('idMiejsca')
                ->add('rzad')
                ->add('miejsce')
                ->add('saleKinoweSaleKinowe.nazwa', null, array('label' => 'Sala'))
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