<?php
/**
 * Created by PhpStorm.
 * User: Dzik
 * Date: 2016-05-19
 * Time: 20:50
 */

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class SeanseRepository extends EntityRepository
{
    public function findAllShows()
    {
        $query = $this->createQueryBuilder('s')
            ->join('s.filmyFilmu', 'f')
            ->groupBy('f.tytul')
            ->where('s.rozpoczecie <= :date')
            ->andWhere('s.rozpoczecie >= :now')
            ->setParameter('date', new \DateTime('+7 days'))
            ->setParameter('now', new \DateTime('now'))
            ->getQuery();
        
        return $query->getResult();
    }

    public function findShowByTitle($arg)
    {
        $query = $this->createQueryBuilder('s')
            ->join('s.filmyFilmu', 'f')
            ->where('s.rozpoczecie <= :date')
            ->andWhere('s.rozpoczecie >= :now')
            ->andWhere('f.tytul = :tytul')
            ->setParameter('date', new \DateTime('+7 days'))
            ->setParameter('now', new \DateTime('now'))
            ->setParameter('tytul', $arg)
            ->getQuery();

        return $query->getResult();

    }


    public function findOneByTitle($arg)
    {
        $query = $this->createQueryBuilder('s')
            ->join('s.filmyFilmu', 'f')
            ->andWhere('f.tytul = :tytul')
            ->setParameter('tytul', $arg)
            ->getQuery();

        return $query->getResult();

    }
}