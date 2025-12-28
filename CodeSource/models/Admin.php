<?php
class Admin extends Utilisateur{

    public function approuverGuide($email){
        $requete = "UPDATE utilisateurs SET is_approuve = 1 WHERE email = :email";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    }

    public function activerCompte($email){
        $requete = "UPDATE utilisateurs SET is_active = 1 WHERE email = :email";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

    }

    public function desactiverCompte($email){
        $requete ="UPDATE utilisateurs SET is_active = 0 WHERE email = :email";
        $stmt = $this->pdo->getConnexion()->prepare($requete);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

    }
    public function __toString() {
        return "Admin : " . $this->nom;
    }
}
?>