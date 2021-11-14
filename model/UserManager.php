<?php

require_once("DbConnect.php");

class UsersManager extends Connect
{

    public function getAllUsers()

    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("SELECT * FROM users");
        $requete->execute(array());
        return $requete;
    }

    public function getOneUser($id)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("SELECT * FROM users WHERE id = $id");
        $requete->execute(array());
        return $requete;
    }

    public function createOneUser($username, $email, $password,$admin)
    {
        $password = sha1($password . "d7f") . "r9h";

        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('INSERT INTO users(username, email, password, created_date, admin) VALUES(?, ?, ?,NOW(),?)');
        $requete->execute(array($username, $email, $password , $admin));
        return $requete;
    }

    public function updateOneUser($id, $username, $email , $password, $admin)
    {
        $password = sha1($password . "d7f") . "r9h";
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("UPDATE users 
                                  SET username = ? , email = ? , password = ? , admin = ? 
                                  WHERE id = ?");
        $requete->execute(array($username, $email, $password , $admin, $id));
    }

    public function deleteOneUser($id)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("DELETE FROM users WHERE id = $id");
        $requete->execute(array());
    }

    public function getEmail($id)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("SELECT email FROM users WHERE id = $id");
        $requete->execute(array());
        return $requete->fetch();  // renvoie array [ [email] => email , [0] => email ]
    }
}
