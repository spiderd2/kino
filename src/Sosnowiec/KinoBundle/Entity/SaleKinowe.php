<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SaleKinowe
 *
 * @ORM\Table(name="sale_kinowe", uniqueConstraints={@ORM\UniqueConstraint(name="id_sale_kinowe_UNIQUE", columns={"id_sale_kinowe"})})
 * @ORM\Entity
 */
class SaleKinowe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sale_kinowe", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSaleKinowe;



    /**
     * Get idSaleKinowe
     *
     * @return integer
     */
    public function getIdSaleKinowe()
    {
        return $this->idSaleKinowe;
    }
}
