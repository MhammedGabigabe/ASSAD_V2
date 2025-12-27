<?php

class VisiteGuidee {
    private $idVisite;
    private $titre;
    private $description;
    private $dateHeure;
    private $langue;
    private $capaciteMax;
    private $duree;
    private $prix;
    private $statut;
    private $idGuide;

    public function getIdVisite() {
        return $this->idVisite;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDateHeure() {
        return $this->dateHeure;
    }

    public function getLangue() {
        return $this->langue;
    }

    public function getCapaciteMax() {
        return $this->capaciteMax;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getIdGuide() {
        return $this->idGuide;
    }

    public function setIdVisite($idVisite) {
        $this->idVisite = $idVisite;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDateHeure($dateHeure) {
        $this->dateHeure = $dateHeure;
    }

    public function setLangue($langue) {
        $this->langue = $langue;
    }

    public function setCapaciteMax($capaciteMax) {
        $this->capaciteMax = $capaciteMax;
    }

    public function setDuree($duree) {
        $this->duree = $duree;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function setIdGuide($idGuide) {
        $this->idGuide = $idGuide;
    }

    public function ajouter() {}
    public function modifier() {}
    public function supprimer() {}
    public function getVisiteDispo() {}

    public function __toString() {
        return $this->titre . " - " . $this->prix . " DH";
    }
}

?>