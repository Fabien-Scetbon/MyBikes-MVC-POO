<?php

require_once("model/DbConnect.php");

class LoginManager extends Connect

{
    public function emailVerify($email)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
        $requete->execute(array($email));
        return $requete->fetch();
    }

    public function passwordVerify($email)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $requete->execute(array($email));
        return $requete;
    }

    public function addUser($username, $email, $password)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('INSERT INTO users(username, email, password, created_date, admin) VALUES(?, ?, ?,NOW(),0)');
        $requete->execute(array($username, $email, $password));
        return $requete;
    }
}