<?php
class Habitat {

    private $idHabitat;
    private $nomHabitat;
    private $typeClimat;
    private $description;
    private $zoneZoo;

    public function getIdHabitat() { 
        return $this->idHabitat; 
    }
    public function setIdHabitat($idHabi) { 
        $this->idHabitat = $idHabi; }

    public function getNomHabitat() { 
        return $this->nomHabitat; 
    }
    public function setNomHabitat($nom) { 
        $this->nomHabitat = $nom; 
    }

    public function ajouter() {}
    public function modifier() {}
    public function supprimer() {}
    public function getAll() {}
    public function getById($id) {}

    public function __toString() {
        return $this->nomHabitat;
    }
}

?>