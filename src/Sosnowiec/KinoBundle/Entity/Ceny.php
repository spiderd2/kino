<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ceny
 *
 * @ORM\Table(name="ceny", uniqueConstraints={@ORM\UniqueConstraint(name="idceny_UNIQUE", columns={"idceny"})})
 * @ORM\Entity
 */
class Ceny
{
    /**
     * @var string
     *
     * @ORM\Column(name="rodzaj", type="string", length=45, nullable=false)
     */
    private $rodzaj;

    /**
     * @var string
     *
     * @ORM\Column(name="cena", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cena;

    /**
     * @var string
     *
     * @ORM\Column(name="cena_weekend", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cenaWeekend;

    /**
     * @var integer
     *
     * @ORM\Column(name="idceny", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idceny;



    /**
     * Set rodzaj
     *
     * @param string $rodzaj
     *
     * @return Ceny
     */
    public function setRodzaj($rodzaj)
    {
        $this->rodzaj = $rodzaj;

        return $this;
    }

    /**
     * Get rodzaj
     *
     * @return string
     */
    public function getRodzaj()
    {
        return $this->rodzaj;
    }

    /**
     * Set cena
     *
     * @param string $cena
     *
     * @return Ceny
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return string
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Set cenaWeekend
     *
     * @param string $cenaWeekend
     *
     * @return Ceny
     */
    public function setCenaWeekend($cenaWeekend)
    {
        $this->cenaWeekend = $cenaWeekend;

        return $this;
    }

    /**
     * Get cenaWeekend
     *
     * @return string
     */
    public function getCenaWeekend()
    {
        return $this->cenaWeekend;
    }

    /**
     * Get idceny
     *
     * @return integer
     */
    public function getIdceny()
    {
        return $this->idceny;
    }
}
