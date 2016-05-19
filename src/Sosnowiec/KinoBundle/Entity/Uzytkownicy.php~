<?php

namespace Sosnowiec\KinoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * Uzytkownicy
 *
 * @ORM\Table(name="uzytkownicy", uniqueConstraints={@ORM\UniqueConstraint(name="id_uzytkownika_UNIQUE", columns={"id_uzytkownika"}), @ORM\UniqueConstraint(name="login_UNIQUE", columns={"login"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})})
 * @ORM\Entity
 */
class Uzytkownicy implements UserInterface, \Serializable
{
    /**
     * @var string
     * 
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 20
     * )
     * 
     * @ORM\Column(name="login", type="string", length=20, nullable=false)
     */
    private $login;

    /**
     * @var string
     * 
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 32
     * )
     * 
     * @ORM\Column(name="haslo", type="string", length=32, nullable=false)
     */
    private $haslo;

    /**
     * @var string
     * 
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 254
     * )
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     * @ORM\Column(name="email", type="string", length=254, nullable=false)
     */
    private $email;

    /**
     * @var string
    
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 30
     * )
     * 
     * @ORM\Column(name="imie", type="string", length=30, nullable=true)
     */
    private $imie;

    /**
     * @var string
     * 
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 30
     * )
     * 
     * @ORM\Column(name="nazwisko", type="string", length=30, nullable=true)
     */
    private $nazwisko;

    /**
     * @var string
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 20
     * )
     * 
     * @ORM\Column(name="telefon", type="string", length=20, nullable=true)
     */
    private $telefon;

    /**
     * @var integer
     * 
     * 
     * @ORM\Column(name="id_uzytkownika", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUzytkownika;



    /**
     * Set login
     *
     * @param string $login
     *
     * @return Uzytkownicy
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set haslo
     *
     * @param string $haslo
     *
     * @return Uzytkownicy
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;

        return $this;
    }

    /**
     * Get haslo
     *
     * @return string
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Uzytkownicy
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set imie
     *
     * @param string $imie
     *
     * @return Uzytkownicy
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     *
     * @return Uzytkownicy
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     *
     * @return Uzytkownicy
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Get idUzytkownika
     *
     * @return integer
     */
    public function getIdUzytkownika()
    {
        return $this->idUzytkownika;
    }

    public function eraseCredentials() {
        
    }

    public function getPassword() {
         return $this->haslo;
    }

    public function getRoles() {
        return array('ROLE_USER');
    }

    public function getSalt() {
        return null;
    }

    public function getUsername() {
         return $this->login;
    }
    
    public function serialize()
    {
        return serialize(array(
            $this->idUzytkownika,
            $this->login,
            $this->haslo,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->idUzytkownika,
            $this->login,
            $this->haslo,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

}
