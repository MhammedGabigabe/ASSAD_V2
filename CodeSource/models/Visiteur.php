<?php
class Visiteur extends Utilisateur {

    private $isActive;

    public function getIsActive(){
        $this->isActive;
    }

    public function setIsActive($isAct){
        $this->isActive = $isAct ;
    }

    public function reserverVisite($idVisite, $nbPersonnes) {}
    public function commenterVisite($commentaire) {}

    public function __toString() {
        return "Visiteur : " . $this->nom;
    }
}


?>