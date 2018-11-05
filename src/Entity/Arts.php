<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtsRepository")
 */
class Arts
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

}


