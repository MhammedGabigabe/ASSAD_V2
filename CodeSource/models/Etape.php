<?php

class Etape {

    private $idEtape;
    private $titreEtape;
    private $descriptionEtape;
    private $ordreEtape;

    public function getIdEtape() {
        return $this->idEtape;
    }

    public function getTitreEtape() {
        return $this->titreEtape;
    }

    public function getDescriptionEtape() {
        return $this->descriptionEtape;
    }

    public function getOrdreEtape() {
        return $this->ordreEtape;
    }

    public function setIdEtape($idEtape) {
        $this->idEtape = $idEtape;
    }

    public function setTitreEtape($titreEtape) {
        $this->titreEtape = $titreEtape;
    }

    public function setDescriptionEtape($descriptionEtape) {
        $this->descriptionEtape = $descriptionEtape;
    }

    public function setOrdreEtape($ordreEtape) {
        $this->ordreEtape = $ordreEtape;
    }

    public function ajouter() {}
    public function modifier() {}
    public function supprimer() {}

    public function __toString() {
        return $this->ordreEtape . " - " . $this->titreEtape;
    }
}

?>