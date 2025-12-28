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
        $requete = "SELECT a.*,ha.nom AS habitat FROM animaux a INNER JOIN habitats ha ON a.id_habitat = ha.id_habitat;";
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

    public function ajouter($nom, $espece, $alimentation, $image, $pays_origine, $description_courte, $id_habitat) {
        $requete = "INSERT INTO animaux( nom, espece, alimentation, image, pays_origine, description_courte, id_habitat) 
                    VALUES (:nom,:espece,:alimentation,:image,:pays_origine,:description_courte,:id_habitat)";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":espece", $espece);
        $stmt->bindParam(":alimentation", $alimentation);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":pays_origine", $pays_origine);
        $stmt->bindParam(":description_courte", $description_courte);
        $stmt->bindParam(":id_habitat", $id_habitat);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getById($id){
        $requete = "SELECT * FROM animaux WHERE id_animal = :id;";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else return false;
    }

    public function modifier($nom, $esp, $ali, $img, $pays, $desc, $idH, $idA) {
        $requete = "UPDATE animaux 
                    SET nom = :n,espece = :e,alimentation = :a,image= :i,pays_origine= :p,description_courte = :d,id_habitat = :idH 
                    WHERE id_animal= :idA;";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->bindParam(":n", $nom);
        $stmt->bindParam(":e", $esp);
        $stmt->bindParam(":a", $ali);
        $stmt->bindParam(":i", $img);
        $stmt->bindParam(":p", $pays);
        $stmt->bindParam(":d", $desc);
        $stmt->bindParam(":idH", $idH);
        $stmt->bindParam(":idA", $idA);
        if($stmt->execute()){
            return true;
        }else return false;

    }

    public function supprimer($id) {
        $requete = "DELETE FROM animaux WHERE id_animal = :id;";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

}

?>