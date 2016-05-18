<?php
namespace Sosnowiec\KinoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class RezerwacjeAdmin extends Admin
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
        $datagridMapper
                ->add('dataRezerwacji', 'doctrine_orm_datetime_range')
                ->add('uzytkownicyUzytkownika.login', null, array('label' => 'Login użytkownika'))
                ->add('uzytkownicyUzytkownika.email', null, array('label' => 'Email'))
                ->add('uzytkownicyUzytkownika.imie', null, array('label' => 'Imie'))
                ->add('uzytkownicyUzytkownika.nazwisko', null, array('label' => 'Nazwisko'))
                ->add('seanseSeansu.filmyFilmu.tytul', null, array('label' => 'Tytuł filmu'))
                ->add('seanseSeansu.rozpoczecie', 'doctrine_orm_datetime_range', array('label' => 'Data i godzina seansu'))
                ->add('seanseSeansu.saleKinoweSaleKinowe.nazwa', null, array('label' => 'Sala'))
                ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('idRezerwacji', null, array('label' => 'ID'))
                ->add('dataRezerwacji', null, array('label' => 'Data rezerwacji'))
                ->add('uzytkownicyUzytkownika.login', null, array('label' => 'Login użytkownika'))
                ->add('uzytkownicyUzytkownika.email', null, array('label' => 'Email'))
                ->add('uzytkownicyUzytkownika.imie', null, array('label' => 'Imie'))
                ->add('uzytkownicyUzytkownika.nazwisko', null, array('label' => 'Nazwisko'))
                ->add('seanseSeansu.filmyFilmu.tytul', null, array('label' => 'Tytuł filmu'))
                ->add('seanseSeansu.rozpoczecie', null, array('label' => 'Data i godzina seansu'))
                ->add('seanseSeansu.saleKinoweSaleKinowe.nazwa', null, array('label' => 'Sala'))
                ;
        
        
    }
}
?>