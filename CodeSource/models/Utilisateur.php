<?php

class Utilisateur{
    protected $id_Utilisateur;
    protected $nom;
    protected $email;
    protected $role;
    protected $mdpHash;

    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getIdUtilisateur() {
        return $this->id_Utilisateur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setMdpHash($mdp) {
        $this->mdpHash = $mdp;
    }

    public function getByEmail($email){
        $requete = "SELECT * FROM utilisateurs WHERE email = :email;";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->bindParam(":email",$email);
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
        
    }

    public function sInscrire(){
        $result = $this->getByEmail($this->email);
        if($result === false){
            $requete = "INSERT INTO `utilisateurs`( `nom`, `email`, `role`, `mdp_hash`)
                        VALUES (:nom, :email, :role, :mdp)";

            $md = password_hash($this->mdpHash,PASSWORD_DEFAULT);

            $stmt = $this->pdo->getConnexion()->prepare($requete);
            $stmt->bindParam(":nom",$this->nom);
            $stmt->bindParam(":email",$this->email);
            $stmt->bindParam(":role",$this->role);
            $stmt->bindParam(":mdp",$md);
            $stmt->execute();
            return true;
        }else{
            return false;
        }
    }

    public function seConnecter(){

        $result = $this->getByEmail($this->email);
        if($result === false){
            return "email_incorrect";
        }

        if(!password_verify($this->mdpHash,$result["mdp_hash"])){
            return "mdp_incorrect";
        }

        return $result;
            
    }

    public function seDeconnecter(){
        // session_unset();
        // session_destroy();
        // header("Location: ../views/login.php");
        // exit;

    }

    public function getAll(){
        $requete = "SELECT * FROM utilisateurs WHERE role != 'admin';";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>