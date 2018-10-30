<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReceptRepository")
 */
class Recept
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
    * @ORM\Column(type="integer")
     */
    public $patientid;

    /**
    * @ORM\Column(type="integer")
     */
    public $medicijnid;

     /**
    * @ORM\Column(type="integer")
     */
    public $aantal;

    /**
    * @ORM\Column(type="integer")
     */
    public $hoelang;

     /**
    * @ORM\Column(type="integer")
     */
    public $herhaling;

    /**
     * @ORM\Column(type="text")
     */
    public $uitgeschreven;

    /**
    * @ORM\Column(type="integer")
     */
    public $dokterid;

    /**
     * @ORM\Column(type="text")
     */
    public $opgehaald;

    // Getters & Setters
    public function getID() {
        return $this->id;
    }

    public function getPatientid() {
        return $this->patientid;
    }

    public function setPatientid($patientid) {
        $this->patientid = $patientid;
    }

    public function getMedicijnid() {
        return $this->medicijnid;
    }

    public function setMedicijnid($medicijnid) {
        $this->medicijnid = $medicijnid;
    }

    public function getAantal() {
        return $this->aantal;
    }

    public function setAantal($aantal) {
        $this->aantal = $aantal;
    }

    public function getHoelang() {
        return $this->hoelang;
    }

    public function setHoelang($hoelang) {
        $this->hoelang = $hoelang;
    }

    public function getHerhaling() {
        return $this->herhaling;
    }

    public function setHerhaling($herhaling) {
        $this->herhaling = $herhaling;
    }

    public function getUitgeschreven() {
        return $this->uitgeschreven;
    }

    public function setUitgeschreven($uitgeschreven) {
        $this->uitgeschreven = $uitgeschreven;
    }

    public function getDokterid() {
        return $this->dokterid;
    }

    public function setDokterid($dokterid) {
        $this->dokterid = $dokterid;
    }

    public function getOpgehaald() {
        return $this->opgehaald;
    }

    public function setOpgehaald($opgehaald) {
        $this->opgehaald = $opgehaald;
    }
}
