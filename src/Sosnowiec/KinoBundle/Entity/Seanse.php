<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seanse
 *
 * @ORM\Table(name="seanse", uniqueConstraints={@ORM\UniqueConstraint(name="idseanse_UNIQUE", columns={"id_seansu"})}, indexes={@ORM\Index(name="fk_seanse_filmy1_idx", columns={"filmy_id_filmu"}), @ORM\Index(name="fk_seanse_sale_kinowe1_idx", columns={"sale_kinowe_id_sale_kinowe"})})
 * @ORM\Entity
 */
class Seanse
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rozpoczecie", type="datetime", nullable=false)
     */
    private $rozpoczecie;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_seansu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSeansu;

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
     * @var \Sosnowiec\KinoBundle\Entity\Filmy
     *
     * @ORM\ManyToOne(targetEntity="Sosnowiec\KinoBundle\Entity\Filmy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="filmy_id_filmu", referencedColumnName="id_filmu")
     * })
     */
    private $filmyFilmu;



    /**
     * Set rozpoczecie
     *
     * @param \DateTime $rozpoczecie
     *
     * @return Seanse
     */
    public function setRozpoczecie($rozpoczecie)
    {
        $this->rozpoczecie = $rozpoczecie;

        return $this;
    }

    /**
     * Get rozpoczecie
     *
     * @return \DateTime
     */
    public function getRozpoczecie()
    {
        return $this->rozpoczecie;
    }

    /**
     * Get idSeansu
     *
     * @return integer
     */
    public function getIdSeansu()
    {
        return $this->idSeansu;
    }

    /**
     * Set saleKinoweSaleKinowe
     *
     * @param \Sosnowiec\KinoBundle\Entity\SaleKinowe $saleKinoweSaleKinowe
     *
     * @return Seanse
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

    /**
     * Set filmyFilmu
     *
     * @param \Sosnowiec\KinoBundle\Entity\Filmy $filmyFilmu
     *
     * @return Seanse
     */
    public function setFilmyFilmu(\Sosnowiec\KinoBundle\Entity\Filmy $filmyFilmu = null)
    {
        $this->filmyFilmu = $filmyFilmu;

        return $this;
    }

    /**
     * Get filmyFilmu
     *
     * @return \Sosnowiec\KinoBundle\Entity\Filmy
     */
    public function getFilmyFilmu()
    {
        return $this->filmyFilmu;
    }
}
