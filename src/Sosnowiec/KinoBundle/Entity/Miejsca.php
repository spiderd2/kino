<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Miejsca
 *
 * @ORM\Table(name="miejsca", uniqueConstraints={@ORM\UniqueConstraint(name="id_miejsca_UNIQUE", columns={"id_miejsca"})}, indexes={@ORM\Index(name="fk_miejsca_sale_kinowe1_idx", columns={"sale_kinowe_id_sale_kinowe"})})
 * @ORM\Entity
 */
class Miejsca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rzad", type="integer", nullable=false)
     */
    private $rzad;

    /**
     * @var integer
     *
     * @ORM\Column(name="miejsce", type="integer", nullable=false)
     */
    private $miejsce;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_miejsca", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMiejsca;

    /**
     * @var \Sosnowiec\KinoBundle\Entity\SaleKinowe
     *
     * @ORM\ManyToOne(targetEntity="Sosnowiec\KinoBundle\Entity\SaleKinowe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sale_kinowe_id_sale_kinowe", referencedColumnName="id_sale_kinowe")
     * })
     */
    private $saleKinoweSaleKinowe;



    /**
     * Set rzad
     *
     * @param integer $rzad
     *
     * @return Miejsca
     */
    public function setRzad($rzad)
    {
        $this->rzad = $rzad;

        return $this;
    }

    /**
     * Get rzad
     *
     * @return integer
     */
    public function getRzad()
    {
        return $this->rzad;
    }

    /**
     * Set miejsce
     *
     * @param integer $miejsce
     *
     * @return Miejsca
     */
    public function setMiejsce($miejsce)
    {
        $this->miejsce = $miejsce;

        return $this;
    }

    /**
     * Get miejsce
     *
     * @return integer
     */
    public function getMiejsce()
    {
        return $this->miejsce;
    }

    /**
     * Get idMiejsca
     *
     * @return integer
     */
    public function getIdMiejsca()
    {
        return $this->idMiejsca;
    }

    /**
     * Set saleKinoweSaleKinowe
     *
     * @param \Sosnowiec\KinoBundle\Entity\SaleKinowe $saleKinoweSaleKinowe
     *
     * @return Miejsca
     */
    public function setSaleKinoweSaleKinowe(\Sosnowiec\KinoBundle\Entity\SaleKinowe $saleKinoweSaleKinowe = null)
    {
        $this->saleKinoweSaleKinowe = $saleKinoweSaleKinowe;

        return $this;
    }

    /**
     * Get saleKinoweSaleKinowe
     *
     * @return \Sosnowiec\KinoBundle\Entity\SaleKinowe
     */
    public function getSaleKinoweSaleKinowe()
    {
        return $this->saleKinoweSaleKinowe;
    }
}
