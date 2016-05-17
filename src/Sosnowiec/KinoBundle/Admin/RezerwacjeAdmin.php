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
                ->add('dataRezerwacji', 'doctrine_orm_datetime');
            //->add('dataRezerwacji')sonata_type_filter_date
                ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('idRezerwacji')
                ->add('dataRezerwacji')
                ->add('uzytkownicyUzytkownika.login')
                ->add('uzytkownicyUzytkownika.imie')
                ->add('uzytkownicyUzytkownika.nazwisko')
                ->add('seanseSeansu.filmyFilmu.tytul')
                ->add('seanseSeansu.rozpoczecie')
                ->add('seanseSeansu.saleKinoweSaleKinowe.idSaleKinowe')
                ;
        
        
    }
}
?>