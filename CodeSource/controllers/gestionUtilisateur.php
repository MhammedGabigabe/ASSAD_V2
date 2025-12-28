<?php
require_once __DIR__ . "/../models/Utilisateur.php";
require_once __DIR__ . "/../config/Connexion.php";
require_once __DIR__ . "/../models/Admin.php";

$pdo = new Connexion();
$utilisateur = new Utilisateur($pdo);
$utilisateurs = $utilisateur->getAll();
$admin = new Admin($pdo);

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    
    if(isset($_POST['approuver'])){
        $admin->approuverGuide($_POST['approuver']);
        header("Location: ../views/userAdmin.php");
        exit;
    }

    if(isset($_POST['activer'])){
        $admin->activerCompte($_POST['activer']);
        header("Location: ../views/userAdmin.php");
        exit;
    }

    if(isset($_POST['desactiver'])){
        $admin->desactiverCompte($_POST['desactiver']);
        header("Location: ../views/userAdmin.php");
        exit;
    }
}
?>