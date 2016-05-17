<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bilety
 *
 * @ORM\Table(name="bilety", uniqueConstraints={@ORM\UniqueConstraint(name="id_biletu_UNIQUE", columns={"id_biletu"})}, indexes={@ORM\Index(name="fk_bilety_rezerwacje1_idx", columns={"rezerwacje_id_rezerwacji"}), @ORM\Index(name="fk_bilety_miejsca1_idx", columns={"miejsca_id_miejsca"}), @ORM\Index(name="fk_bilety_ceny1_idx", columns={"ceny_idceny"})})
 * @ORM\Entity
 */
class Bilety
{
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
     * @var \Sosnowiec\KinoBundle\Entity\Ceny
     *
     * @ORM\ManyToOne(targetEntity="Sosnowiec\KinoBundle\Entity\Ceny")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ceny_idceny", referencedColumnName="idceny")
     * })
     */
    private $cenyceny;



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

    /**
     * Set cenyceny
     *
     * @param \Sosnowiec\KinoBundle\Entity\Ceny $cenyceny
     *
     * @return Bilety
     */
    public function setCenyceny(\Sosnowiec\KinoBundle\Entity\Ceny $cenyceny = null)
    {
        $this->cenyceny = $cenyceny;

        return $this;
    }

    /**
     * Get cenyceny
     *
     * @return \Sosnowiec\KinoBundle\Entity\Ceny
     */
    public function getCenyceny()
    {
        return $this->cenyceny;
    }
}
