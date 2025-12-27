<?php

class Commentaire {

    private $idCommentaire;
    private $note;
    private $texte;
    private $dateCommentaire;

    public function getIdCommentaire() {
        return $this->idCommentaire;
    }

    public function getNote() {
        return $this->note;
    }

    public function getTexte() {
        return $this->texte;
    }

    public function getDateCommentaire() {
        return $this->dateCommentaire;
    }

    public function setIdCommentaire($idCommentaire) {
        $this->idCommentaire = $idCommentaire;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function setTexte($texte) {
        $this->texte = $texte;
    }

    public function setDateCommentaire($dateCommentaire) {
        $this->dateCommentaire = $dateCommentaire;
    }

    public function ajouter() {}
    public function supprimer() {}
    public function commenter() {}

    public function __toString() {
        return "Note : " . $this->note . "/5";
    }
}
?>