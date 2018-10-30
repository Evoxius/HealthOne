<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedicijnRepository")
 */
class Medicijn
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
    public $naam;

    /**
     * @ORM\Column(type="text")
     */
    public $voordelen;

     /**
     * @ORM\Column(type="text")
     */
    public $nadelen;

    // Getters & Setters
    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function getVoordelen() {
        return $this->voordelen;
    }

    public function setVoordelen($voordelen) {
        $this->voordelen = $voordelen;
    }

    public function getNadelen() {
        return $this->nadelen;
    }

    public function setNadelen($nadelen) {
        $this->nadelen = $nadelen;
    }
}
