<?php 
session_start();
require_once "../config/Connexion.php";
require_once "../models/Utilisateur.php";

$pdo = new Connexion();
$utilisateur = new Utilisateur($pdo);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $utilisateur->setEmail($_POST["email"]);
    $utilisateur->setMdpHash($_POST["password"]);
    $res = $utilisateur->seConnecter();

    if($res === "email_incorrect"){
        $_SESSION['erreur'] = " Email est inccorect !";
    }elseif($res === "mdp_incorrect"){
        $_SESSION['erreur'] = " Mot de passe est inccorect !";
    }else{
        $_SESSION['email'] = $res['email'];
        $_SESSION['role'] = $res['role'];
        
    }

}