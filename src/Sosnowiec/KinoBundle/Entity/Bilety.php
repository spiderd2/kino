<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bilety
 *
 * @ORM\Table(name="bilety", uniqueConstraints={@ORM\UniqueConstraint(name="id_biletu_UNIQUE", columns={"id_biletu"})}, indexes={@ORM\Index(name="fk_bilety_rezerwacje1_idx", columns={"rezerwacje_id_rezerwacji"}), @ORM\Index(name="fk_bilety_miejsca1_idx", columns={"miejsca_id_miejsca"})})
 * @ORM\Entity
 */
class Bilety
{
    /**
     * @var string
     *
     * @ORM\Column(name="rodzaj", type="string", length=45, nullable=false)
     */
    private $rodzaj;

    /**
     * @var integer
     *
     * @ORM\Column(name="ceny_biletow_id_ceny_biletow", type="integer", nullable=false)
     */
    private $cenyBiletowIdCenyBiletow;

    /**
     * @var string
     *
     * @ORM\Column(name="cena", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cena;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_biletu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBiletu;

    /**
     * @var \Sosnowiec\KinoBundle\Entity\Rezerwacje
     *
     * @ORM\ManyToOne(targetEntity="Sosnowiec\KinoBundle\Entity\Rezerwacje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rezerwacje_id_rezerwacji", referencedColumnName="id_rezerwacji")
     * })
     */
    private $rezerwacjeRezerwacji;

    /**
     * @var \Sosnowiec\KinoBundle\Entity\Miejsca
     *
     * @ORM\ManyToOne(targetEntity="Sosnowiec\KinoBundle\Entity\Miejsca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="miejsca_id_miejsca", referencedColumnName="id_miejsca")
     * })
     */
    private $miejscaMiejsca;



    /**
     * Set rodzaj
     *
     * @param string $rodzaj
     *
     * @return Bilety
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
     * Set cenyBiletowIdCenyBiletow
     *
     * @param integer $cenyBiletowIdCenyBiletow
     *
     * @return Bilety
     */
    public function setCenyBiletowIdCenyBiletow($cenyBiletowIdCenyBiletow)
    {
        $this->cenyBiletowIdCenyBiletow = $cenyBiletowIdCenyBiletow;

        return $this;
    }

    /**
     * Get cenyBiletowIdCenyBiletow
     *
     * @return integer
     */
    public function getCenyBiletowIdCenyBiletow()
    {
        return $this->cenyBiletowIdCenyBiletow;
    }

    /**
     * Set cena
     *
     * @param string $cena
     *
     * @return Bilety
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
     * Get idBiletu
     *
     * @return integer
     */
    public function getIdBiletu()
    {
        return $this->idBiletu;
    }

    /**
     * Set rezerwacjeRezerwacji
     *
     * @param \Sosnowiec\KinoBundle\Entity\Rezerwacje $rezerwacjeRezerwacji
     *
     * @return Bilety
     */
    public function setRezerwacjeRezerwacji(\Sosnowiec\KinoBundle\Entity\Rezerwacje $rezerwacjeRezerwacji = null)
    {
        $this->rezerwacjeRezerwacji = $rezerwacjeRezerwacji;

        return $this;
    }

    /**
     * Get rezerwacjeRezerwacji
     *
     * @return \Sosnowiec\KinoBundle\Entity\Rezerwacje
     */
    public function getRezerwacjeRezerwacji()
    {
        return $this->rezerwacjeRezerwacji;
    }

    /**
     * Set miejscaMiejsca
     *
     * @param \Sosnowiec\KinoBundle\Entity\Miejsca $miejscaMiejsca
     *
     * @return Bilety
     */
    public function setMiejscaMiejsca(\Sosnowiec\KinoBundle\Entity\Miejsca $miejscaMiejsca = null)
    {
        $this->miejscaMiejsca = $miejscaMiejsca;

        return $this;
    }

    /**
     * Get miejscaMiejsca
     *
     * @return \Sosnowiec\KinoBundle\Entity\Miejsca
     */
    public function getMiejscaMiejsca()
    {
        return $this->miejscaMiejsca;
    }
}
