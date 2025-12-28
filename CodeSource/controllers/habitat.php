<?php
require_once __DIR__ . "/../config/Connexion.php";
require_once __DIR__ . "/../models/Habitat.php";

$pdo = new Connexion();
$habitat = new Habitat($pdo);
$liste_habitat = $habitat->getAll();

?>