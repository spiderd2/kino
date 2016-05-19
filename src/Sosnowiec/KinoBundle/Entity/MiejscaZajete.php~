<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MiejscaZajete
 *
 * @ORM\Table(name="miejsca_zajete", uniqueConstraints={@ORM\UniqueConstraint(name="idmiejsca_zajete_UNIQUE", columns={"idmiejsca_zajete"})}, indexes={@ORM\Index(name="fk_miejsca_zajete_seanse1_idx", columns={"seanse_id_seansu"}), @ORM\Index(name="fk_miejsca_zajete_miejsca1_idx", columns={"miejsca_id_miejsca"})})
 * @ORM\Entity
 */
class MiejscaZajete
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="zajete", type="boolean", nullable=true)
     */
    private $zajete;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmiejsca_zajete", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmiejscaZajete;

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
     * @var \Sosnowiec\KinoBundle\Entity\Miejsca
     *
     * @ORM\ManyToOne(targetEntity="Sosnowiec\KinoBundle\Entity\Miejsca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="miejsca_id_miejsca", referencedColumnName="id_miejsca")
     * })
     */
    private $miejscaMiejsca;



    /**
     * Set zajete
     *
     * @param boolean $zajete
     *
     * @return MiejscaZajete
     */
    public function setZajete($zajete)
    {
        $this->zajete = $zajete;

        return $this;
    }

    /**
     * Get zajete
     *
     * @return boolean
     */
    public function getZajete()
    {
        return $this->zajete;
    }

    /**
     * Get idmiejscaZajete
     *
     * @return integer
     */
    public function getIdmiejscaZajete()
    {
        return $this->idmiejscaZajete;
    }

    /**
     * Set seanseSeansu
     *
     * @param \Sosnowiec\KinoBundle\Entity\Seanse $seanseSeansu
     *
     * @return MiejscaZajete
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

    /**
     * Set miejscaMiejsca
     *
     * @param \Sosnowiec\KinoBundle\Entity\Miejsca $miejscaMiejsca
     *
     * @return MiejscaZajete
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
