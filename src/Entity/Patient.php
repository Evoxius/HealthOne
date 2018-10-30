<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
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
    public $klantnummer;

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

    /**
     * @ORM\Column(type="integer")
     */
    public $dokterid;

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

    public function getKlantnummer() {
        return $this->klantnummer;
    }

    public function setKlantnummer($klantnummer) {
        $this->klantnummer = $klantnummer;
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

    public function getDokterid() {
        return $this->dokterid;
    }

    public function setDokterid($dokterid) {
        $this->dokterid = $dokterid;
    }
}
