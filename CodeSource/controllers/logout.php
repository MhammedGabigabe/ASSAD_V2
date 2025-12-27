<?php
session_start();

require_once "../config/Connexion.php";
require_once "../models/Utilisateur.php";

$pdo = new Connexion();
$utilisateur = new Utilisateur($pdo);

$utilisateur->seDeconnecter();

?>