<?php
session_start();
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

if(isset($_POST['ajouter'])){
    $nom = $_POST['nom'];
    $espece = $_POST['espece']; 
    $alimentation = $_POST['alimentation']; 
    $image = $_POST['image']; 
    $pays_origine = $_POST['pays']; 
    $description_courte = $_POST['description']; 
    $id_habitat = $_POST['id_habitat'];

    $succes = $animal->ajouter($nom, $espece, $alimentation, $image, $pays_origine, $description_courte, $id_habitat);
    if($succes){
        $_SESSION['msg'] = "Insertion effectue avec succés ";
        header("Location: ../views/animal.php");
        exit;
    }else{
        $_SESSION['msg'] = "erreur lors de l'insertion !!";
        header("Location: ../views/animal.php");
        exit;
    }
}

if(isset($_POST['supprimer'])){
    $id = $_POST['supprimer'];
    $succes = $animal->supprimer($id);
    if($succes){
        $_SESSION['msg'] = "Suppression effectue avec succés ";
        header("Location: ../views/animal.php");
        exit;
    }else{
        $_SESSION['msg'] = "erreur lors de la suppression !!";
        header("Location: ../views/animal.php");
        exit;
    }
}

$animal_a_modifier = null;
if(isset($_POST['open_modalModifier'])){
    $id = $_POST['open_modalModifier'];
    $animal_a_modifier = $animal->getById($id);
}

if(isset($_POST['btn_modifier'])){
    $idA = $_POST['btn_modifier'];
    $nom = $_POST['nom'];
    $espece = $_POST['espece']; 
    $alimentation = $_POST['alimentation']; 
    $image = $_POST['image']; 
    $pays_origine = $_POST['pays']; 
    $description_courte = $_POST['description']; 
    $id_habitat = $_POST['id_habitat'];

    $succes = $animal->modifier($nom, $espece, $alimentation, $image, $pays_origine, $description_courte, $id_habitat, $idA);
    if($succes){
        $_SESSION['msg'] = "Modification effectue avec succés ";
        header("Location: ../views/animal.php");
        exit;
    }else{
        $_SESSION['msg'] = "erreur lors de la modification !!";
        header("Location: ../views/animal.php");
        exit;
    }
}
?>