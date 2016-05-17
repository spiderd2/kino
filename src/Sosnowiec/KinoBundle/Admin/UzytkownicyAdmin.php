<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class UzytkownicyAdmin extends Admin
{
    
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper->add('login', 'text', array(
            'read_only' => true,
            ))
            ->add('imie', 'text', array(
            'read_only' => true,
            ))
            ->add('nazwisko', 'text', array(
            'read_only' => true,
            ));
           
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idUzytkownika')
            ->add('login')
            ->add('email')
            ->add('imie')
            ->add('nazwisko')
            ->add('telefon')
                ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idUzytkownika', 'text')
            ->add('login', 'text')
            ->add('email', 'text')
            ->add('imie', 'text')
            ->add('nazwisko', 'text')
            ->add('telefon', 'text')
           ;
    }
}
?>