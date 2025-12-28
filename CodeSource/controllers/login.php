<?php 
session_start();
require_once "../config/Connexion.php";
require_once "../models/Utilisateur.php";

$pdo = new Connexion();
$utilisateur = new Utilisateur($pdo);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $utilisateur->setEmail($_POST["email"]);
    $utilisateur->setMdpHash($_POST["password"]);
    $res = $utilisateur->connecter();

    if($res === "email_incorrect"){
        $_SESSION['erreur'] = " Email est inccorect !";
        header("Location: ../views/login.php");
        exit;
    }elseif($res === "mdp_incorrect"){
        $_SESSION['erreur'] = " Mot de passe est inccorect !";
        header("Location: ../views/login.php");
        exit;
    }else{
        unset($_SESSION['erreur']);
        $_SESSION['email'] = $res['email'];
        $_SESSION['role'] = $res['role'];
        $_SESSION['statut'] = $res['is_active'];
        switch($res['role']){
            case 'Admin': 
                header("Location: ../views/dashboardAdmin.php");
                break;

            case 'Guide': 
                if($res['is_approuve']){
                    header("Location: ../views/dashboardGuide.php");
                    break;
                }else{
                    header("Location: ../views/guideAttente.php");
                    break;
                }

            default : 
                header("Location: ../../index.php");
                break;
        }
    }

}