<?php 

require_once "../config/Connexion.php";
require_once "../models/Utilisateur.php";

$pdo = new Connexion();
$utulisateur = new Utilisateur($pdo);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $utulisateur->setNom($_POST["fullname"]);
    $utulisateur->setEmail($_POST["email"]);
    $utulisateur->setMdpHash($_POST["password"]);
    $utulisateur->setRole($_POST["role"]);
    
    $res = $utulisateur->inscrire();
    if($res === false){
        $_SESSION['erreur'] = "Cet email existe déjà !";
        header("Location: ../views/register.php");
        exit;
    }
    if($res === true){
        unset($_SESSION['erreur']);
        header("Location: ../views/login.php");
        exit;
    }

}




?>