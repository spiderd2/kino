<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class BiletyAdmin extends Admin
{
    
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
      
           
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
     $datagridMapper->add('idBiletu')
             ->add('rezerwacjeRezerwacji.uzytkownicyUzytkownika.login', null, array('label' => 'Login użytkownika'))
                ->add('rezerwacjeRezerwacji.seanseSeansu.filmyFilmu.tytul', null, array('label' => 'Film'))
                ->add('rezerwacjeRezerwacji.seanseSeansu.rozpoczecie', null, array('label' => 'Rozpoczecie'))
             ->add('miejscaMiejsca.saleKinoweSaleKinowe.nazwa', null, array('label' => 'Sala'))
             ->add('cenyceny.rodzaj', null, array('label' => 'Rodzaj biletu'))
               
    ;
    ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('idBiletu')
             ->add('rezerwacjeRezerwacji.uzytkownicyUzytkownika.login', null, array('label' => 'Login użytkownika'))
                ->add('rezerwacjeRezerwacji.seanseSeansu.filmyFilmu.tytul', null, array('label' => 'Film'))
                ->add('rezerwacjeRezerwacji.seanseSeansu.rozpoczecie', null, array('label' => 'Rozpoczecie'))
             ->add('miejscaMiejsca.saleKinoweSaleKinowe.nazwa', null, array('label' => 'Sala'))
                ->add('miejscaMiejsca.rzad', null, array('label' => 'Rząd'))
                ->add('miejscaMiejsca.miejsce', null, array('label' => 'Miejsce'))
             ->add('cenyceny.rodzaj', null, array('label' => 'Rodzaj biletu'))
                ->add('cenyceny.cena', null, array('label' => 'Cena'))
    ;
    }
}
?>