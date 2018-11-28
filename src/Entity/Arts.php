<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtsRepository")
 */
class Arts implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $password;

    /**
     * @ORM\Column(type="text", length=100)
     */
    public $voornaam;

    /**
     * @ORM\Column(type="text")
     */
    public $tussenvoegsel;

     /**
     * @ORM\Column(type="text")
     */
    public $achternaam;

    /**
     * @ORM\Column(type="text")
     */
    public $specialiteit;

    /**
     * @ORM\Column(type="text")
     */
    public $adres;

    /**
     * @ORM\Column(type="text")
     */
    public $postcode;

    /**
     * @ORM\Column(type="text")
     */
    public $stad;

    /**
     * @ORM\Column(type="text")
     */
    public $email;

    /**
     * @ORM\Column(type="text")
     */
    public $telefoonnummer;

    // Getters & Setters
    public function getID() {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

    public function getTussenvoegsel() {
        return $this->tussenvoegsel;
    }

    public function setTussenvoegsel($tussenvoegsel) {
        $this->tussenvoegsel = $tussenvoegsel;
    }

    public function getAchternaam() {
        return $this->achternaam;
    }

    public function setAchternaam($achternaam) {
        $this->achternaam = $achternaam;
    }

    public function getSpecialiteit() {
        return $this->specialiteit;
    }

    public function setSpecialiteit($specialiteit) {
        $this->specialiteit = $specialiteit;
    }

    public function getAdres() {
        return $this->adres;
    }

    public function setAdres($adres) {
        $this->adres = $adres;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function getStad() {
        return $this->stad;
    }

    public function setStad($stad) {
        $this->stad = $stad;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefoonnummer() {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer($telefoonnummer) {
        $this->telefoonnummer = $telefoonnummer;
    }

    public function getRoles()
    {
        return [
            'ROLE_ARTS'
        ];
    }

    public function getSalt() {}

    public function eraseCredentials() {}

    public function serialize() 
    {
        return serialize([
            $this->id,
            $this->username,
            $this->email,
            $this->password
        ]);
    }

    public function unserialize($string)
    {
        list (
            $this->id,
            $this->username,
            $this->email,
            $this->password
        ) = unserialize($string, ['allowed_classes' => false]);
    }

}


