<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class SeanseAdmin extends Admin
{
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('rozpoczecie', null, array(
                'label' => 'Data'
            ))
            ->add('saleKinoweSaleKinowe', 'entity', array(
                'class' => 'Sosnowiec\KinoBundle\Entity\SaleKinowe',
                'property' => 'idSaleKinowe',
                'label' => 'Sala kinowa'
            ))
            ->add('filmyFilmu', 'sonata_type_model_autocomplete', array(
                'property' => 'tytul',
                'label' => 'Tytul filmu',
                'placeholder' => 'Wybierz tytul filmu',
                'to_string_callback' => function($enitity, $property) {
                    return $enitity->getTytul();
                },
        ));
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('rozpoczecie', 'doctrine_orm_datetime_range', array('label' => 'Rozpoczecie'))
            ->add('saleKinoweSaleKinowe.nazwa', null, array('label' => 'Sala'))
            ->add('filmyFilmu.tytul', null, array('label' => 'Film'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('rozpoczecie', null, array('label' => 'Rozpoczecie'))
                ->add('saleKinoweSaleKinowe.nazwa', null, array('label' => 'Sala'))
                ->add('filmyFilmu.tytul', null, array('label' => 'Film'))
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