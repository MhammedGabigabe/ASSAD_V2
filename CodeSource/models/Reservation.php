<?php

class Reservation {

    private $idReservation;
    private $nbPersonnes;
    private $dateReservation;

    public function getIdReservation() {
        return $this->idReservation;
    }

    public function getNbPersonnes() {
        return $this->nbPersonnes;
    }

    public function getDateReservation() {
        return $this->dateReservation;
    }

    public function setIdReservation($idReservation) {
        $this->idReservation = $idReservation;
    }

    public function setNbPersonnes($nbPersonnes) {
        $this->nbPersonnes = $nbPersonnes;
    }

    public function setDateReservation($dateReservation) {
        $this->dateReservation = $dateReservation;
    }

    public function reserver() {}
    public function annuler() {}

    public function __toString() {
        return "Réservation (" . $this->nbPersonnes . " personnes)";
    }
}
?>