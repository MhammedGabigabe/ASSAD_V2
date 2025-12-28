<?php
class Habitat {

    private $idHabitat;
    private $nomHabitat;
    private $typeClimat;
    private $description;
    private $zoneZoo;

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getIdHabitat() { 
        return $this->idHabitat; 
    }

    public function getNomHabitat() { 
        return $this->nomHabitat; 
    }
    public function setNomHabitat($nom) { 
        $this->nomHabitat = $nom; 
    }

        public function getTypeClimat() { 
        return $this->typeClimat; 
    }
    public function setTypeClimat($typeClimat) { 
        $this->typeClimat = $typeClimat; 
    }

        public function getDescription() { 
        return $this->description; 
    }
    public function setDescription($description) { 
        $this->description = $description; 
    }

        public function getZoneZoo() { 
        return $this->zoneZoo; 
    }
    public function setZoneZoo($zoneZoo) { 
        $this->zoneZoo = $zoneZoo; 
    }

    public function ajouter() {}
    public function modifier() {}
    public function supprimer() {}

    public function getAll() {
        $requete = "SELECT * FROM habitats";
        $stmt = $this->pdo->getconnexion()->prepare($requete);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {}

    public function __toString() {
        return $this->nomHabitat;
    }
}

?>