<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rezerwacje
 *
 * @ORM\Table(name="rezerwacje", uniqueConstraints={@ORM\UniqueConstraint(name="id_rezerwacje_UNIQUE", columns={"id_rezerwacji"})}, indexes={@ORM\Index(name="fk_rezerwacje_uzytkownicy_idx", columns={"uzytkownicy_id_uzytkownika"}), @ORM\Index(name="fk_rezerwacje_seanse1_idx", columns={"seanse_id_seansu"})})
 * @ORM\Entity
 */
class Rezerwacje
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_rezerwacji", type="datetime", nullable=false)
     */
    private $dataRezerwacji = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_rezerwacji", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRezerwacji;

    /**
     * @var \Sosnowiec\KinoBundle\Entity\Uzytkownicy
     *
     * @ORM\ManyToOne(targetEntity="Sosnowiec\KinoBundle\Entity\Uzytkownicy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uzytkownicy_id_uzytkownika", referencedColumnName="id_uzytkownika")
     * })
     */
    private $uzytkownicyUzytkownika;

    /**
     * @var \Sosnowiec\KinoBundle\Entity\Seanse
     *
     * @ORM\ManyToOne(targetEntity="Sosnowiec\KinoBundle\Entity\Seanse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="seanse_id_seansu", referencedColumnName="id_seansu")
     * })
     */
    private $seanseSeansu;



    /**
     * Set dataRezerwacji
     *
     * @param \DateTime $dataRezerwacji
     *
     * @return Rezerwacje
     */
    public function setDataRezerwacji($dataRezerwacji)
    {
        $this->dataRezerwacji = $dataRezerwacji;

        return $this;
    }

    /**
     * Get dataRezerwacji
     *
     * @return \DateTime
     */
    public function getDataRezerwacji()
    {
        return $this->dataRezerwacji;
    }

    /**
     * Get idRezerwacji
     *
     * @return integer
     */
    public function getIdRezerwacji()
    {
        return $this->idRezerwacji;
    }

    /**
     * Set uzytkownicyUzytkownika
     *
     * @param \Sosnowiec\KinoBundle\Entity\Uzytkownicy $uzytkownicyUzytkownika
     *
     * @return Rezerwacje
     */
    public function setUzytkownicyUzytkownika(\Sosnowiec\KinoBundle\Entity\Uzytkownicy $uzytkownicyUzytkownika = null)
    {
        $this->uzytkownicyUzytkownika = $uzytkownicyUzytkownika;

        return $this;
    }

    /**
     * Get uzytkownicyUzytkownika
     *
     * @return \Sosnowiec\KinoBundle\Entity\Uzytkownicy
     */
    public function getUzytkownicyUzytkownika()
    {
        return $this->uzytkownicyUzytkownika;
    }

    /**
     * Set seanseSeansu
     *
     * @param \Sosnowiec\KinoBundle\Entity\Seanse $seanseSeansu
     *
     * @return Rezerwacje
     */
    public function setSeanseSeansu(\Sosnowiec\KinoBundle\Entity\Seanse $seanseSeansu = null)
    {
        $this->seanseSeansu = $seanseSeansu;

        return $this;
    }

    /**
     * Get seanseSeansu
     *
     * @return \Sosnowiec\KinoBundle\Entity\Seanse
     */
    public function getSeanseSeansu()
    {
        return $this->seanseSeansu;
    }
}
