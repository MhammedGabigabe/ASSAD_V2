<?php
require_once __DIR__ . '/../config/Connexion.php';
require_once __DIR__ . '/../models/Animal.php';

$pdo = new Connexion();
$animal = new Animal($pdo);
$liste_animaux = $animal->getAll();
$liste_pays = $animal->getAllPays();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['btn_filtrer']))
    $liste_animaux = $animal->filtrer($_POST['pays'], $_POST['habitat']);
}


?>