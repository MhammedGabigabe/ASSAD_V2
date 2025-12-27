<?php
class Admin extends Utilisateur{

    public function approuverGuide(){

    }

    public function activerCompte(){

    }

    public function desactiverCompte(){

    }
    public function __toString() {
        return "Admin : " . $this->nom;
    }
}
?>