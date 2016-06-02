<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmy
 *
 * @ORM\Table(name="filmy", uniqueConstraints={@ORM\UniqueConstraint(name="idfilmy_UNIQUE", columns={"id_filmu"}), @ORM\UniqueConstraint(name="filmweb_id_UNIQUE", columns={"filmweb_id"})})
 * @ORM\Entity
 */
class Filmy
{
    /**
     * @var string
     *
     * @ORM\Column(name="tytul", type="string", length=45, nullable=false)
     */
    private $tytul;

    /**
     * @var string
     *
     * @ORM\Column(name="gatunek", type="string", length=45, nullable=false)
     */
    private $gatunek;

    /**
     * @var string
     *
     * @ORM\Column(name="dlugosc", type="integer", nullable=false)
     */
    private $dlugosc;



    /**
     * @var string
     *
     * @ORM\Column(name="rokProdukcji", type="string", length=45, nullable=false)
     */
    private $rokProdukcji;


    /**
     * @var string
     *
     * @ORM\Column(name="trailer", type="string", length=150, nullable=false)
     */
    private $trailer;



    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", nullable=false, unique=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="plakat", type="string", nullable=false, unique=true)
     */
    private $plakat;


    /**
     * @var integer
     *
     * @ORM\Column(name="filmweb_id", type="integer", nullable=false)
     */
    private $filmwebId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_filmu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFilmu;



    /**
     * Set tytul
     *
     * @param string $tytul
     *
     * @return Filmy
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;

        return $this;
    }

    /**
     * Get tytul
     *
     * @return string
     */
    public function getTytul()
    {
        return $this->tytul;
    }

    /**
     * Set filmwebId
     *
     * @param integer $filmwebId
     *
     * @return Filmy
     */
    public function setFilmwebId($filmwebId)
    {
        $this->filmwebId = $filmwebId;

        return $this;
    }

    /**
     * Get filmwebId
     *
     * @return integer
     */
    public function getFilmwebId()
    {
        return $this->filmwebId;
    }

    /**
     * Get idFilmu
     *
     * @return integer
     */
    public function getIdFilmu()
    {
        return $this->idFilmu;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getGatunek()
    {
        return $this->gatunek;
    }

    /**
     * @param string $gatunek
     */
    public function setGatunek($gatunek)
    {
        $this->gatunek = $gatunek;
    }

    /**
     * @return string
     */
    public function getRokProdukcji()
    {
        return $this->rokProdukcji;
    }

    /**
     * @param string $rokProdukcji
     */
    public function setRokProdukcji($rokProdukcji)
    {
        $this->rokProdukcji = $rokProdukcji;
    }

    /**
     * @return string
     */
    public function getDlugosc()
    {
        return $this->dlugosc;
    }

    /**
     * @param string $dlugosc
     */
    public function setDlugosc($dlugosc)
    {
        $this->dlugosc = $dlugosc;
    }

    /**
     * @return string
     */
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * @param string $trailer
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;
    }

    /**
     * @return string
     */
    public function getPlakat()
    {
        return $this->plakat;
    }

    /**
     * @param string $plakat
     */
    public function setPlakat($plakat)
    {
        $this->plakat = $plakat;
    }
}
