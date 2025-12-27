<?php

class Connexion {
    private $host = "localhost";
    private $dbname = "zoo_assad";
    private $username = "root";
    private $password = "";

    public function getConnexion() {
        try {

            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};",
                $this->username,
                $this->password
            );  

            return $pdo;

        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion !! " . $e->getMessage());
        }
    }
}

?>