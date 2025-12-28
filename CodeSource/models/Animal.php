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

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    public function getIdAnimal() { 
        return $this->idAnimal; 
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
        $this->idHabitat = $idHa; 
    }

        public function getImage() { 
        return $this->image; 
    }
    public function setImage($image) { 
        $this->image = $image; 
    }

        public function getPaysOrigine() { 
        return $this->paysOrigine; 
    }
    public function setPaysOrigine($paysOrigine) { 
        $this->paysOrigine = $paysOrigine; 
    }

        public function getDescripCourte() { 
        return $this->descripCourte; 
    }
    public function setDescripCourte($descripCourte) { 
        $this->descripCourte = $descripCourte; 
    }


    public function getAll() {
        $requete = "SELECT * FROM animaux;";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPays() {
        $requete = "SELECT DISTINCT`pays_origine` FROM `animaux`";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtrer($pays, $idHabitat){
        $requete = "SELECT * FROM animaux WHERE 1=1 ";
        if($idHabitat    != ''){
            $requete.= " AND id_habitat = '$idHabitat'";
        }
        if($pays != ''){
            $requete.= " AND pays_origine = '$pays'";
        }
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __toString() {
        return $this->nomAnimal . " (" . $this->espece . ")";
    }

    
    public function ajouter() {}
    public function modifier() {}
    public function supprimer() {}

}

?>