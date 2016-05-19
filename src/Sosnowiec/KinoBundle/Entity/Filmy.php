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
     * @ORM\Column(name="url", type="string", nullable=false, unique=true)
     */
    private $url;


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
}
