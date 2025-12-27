<?php
class Animal {

    private $idAnimal;
    private $nomAnimal;
    private $espece;
    private $alimentation;
    private $image;
    private $paysOrigine;
    private $descripCourte;
    private $idHabitat;


    public function getIdAnimal() { 
        return $this->idAnimal; 
    }
    public function setIdAnimal($id) { 
        $this->idAnimal = $id; 
    }

    public function getNomAnimal() { 
        return $this->nomAnimal; 
    }
    public function setNomAnimal($nom) { 
        $this->nomAnimal = $nom; 
    }

    public function getEspece() { 
        return $this->espece; 
    }
    public function setEspece($espece) { 
        $this->espece = $espece; 
    }

    public function getAlimentation() { 
        return $this->alimentation; 
    }
    public function setAlimentation($alimentation) { 
        $this->alimentation = $alimentation; 
    }

    public function getIdHabitat() { 
        return $this->idHabitat; 
    }
    public function setIdHabitat($idHa) { 
        $this->idHabitat = $idHa; }

    public function ajouter() {}
    public function modifier() {}
    public function supprimer() {}
    public function getAll() {}
    public function getById($id) {}

    public function __toString() {
        return $this->nomAnimal . " (" . $this->espece . ")";
    }
}

?>