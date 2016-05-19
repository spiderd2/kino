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
            ->getQuery();

        return $query->getResult();
    }
}