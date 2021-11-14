<?php

require_once("model/DbConnect.php");

class BikesManager extends Connect
{

    public function getAllBikes()
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('SELECT  bikes.id, name, price, image, description, category_name 
                                  FROM bikes 
                                  INNER JOIN category 
                                  ON bikes.category_id = category.id
                                  ORDER BY bikes.id ASC');
        $requete->execute(array());
        return $requete;
    }

    public function getOneBike($id)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("SELECT  bikes.id, name, price, image, description, category_name 
                                  FROM bikes 
                                  INNER JOIN category 
                                  ON bikes.category_id = category.id
                                  WHERE bikes.id = $id");
        $requete->execute(array());
        return $requete;
    }

    public function createOneBike($name, $price, $image, $description, $category_id)
    {

        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("INSERT INTO bikes (name, price, image, description, category_id) VALUES  (?,?,?,?,?)");
        $requete->execute(array($name, $price, $image, $description, $category_id));
        return $requete;
    }

    public function updateOneBike($id, $name, $price, $image, $description, $category_id)
    {
            $bdd = $this->dbConnect();
            $requete = $bdd->prepare("UPDATE bikes SET name = ? , price = ? , image = ? , description = ? , category_id = ?
                                      WHERE id = ?");
            $requete->execute(array($name, $price, $image, $description, $category_id ,$id));
    }

    public function deleteOneBike($id)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("DELETE FROM bikes WHERE id = $id");
        $requete->execute();
    }

    public function getAllCategories()
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('SELECT * FROM category ORDER BY id ASC');
        $requete->execute(array());
        return $requete;
    }

    public function getIdCategory($category_name)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("SELECT id FROM category where category_name = ?");
        $requete->execute(array($category_name));
        return $requete->fetch();  // renvoie array [ [id] => id , [0] => id ]
    }

    public function createOneCategory($category_name)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("INSERT INTO category (category_name)
                                    VALUES  (?)");
        $requete->execute(array($category_name));

        return $requete;
    }

    public function deleteOneCategory($id)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("DELETE FROM category WHERE id = $id");
        $requete->execute();
    }
}
