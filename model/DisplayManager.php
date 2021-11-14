<?php

require_once("model/DbConnect.php");

class DisplayManager extends Connect

{
    public function getBikesPage($page)
    {
        $offset = ($page - 1) * 7;
        
        $bdd = $this->dbConnect();

        $requete = $bdd->prepare("SELECT  bikes.id, name, price, image, description, category_name 
                                  FROM bikes 
                                  INNER JOIN category 
                                  ON bikes.category_id = category.id
                                  ORDER BY bikes.id ASC
                                  LIMIT 7 OFFSET $offset
                                  ");
        // retourne les $limit premiers resultats sans les $offset premiers resultats

        $requete->execute(array());
        
        return $requete;
    }

    public function countBikes()
    {

        $bdd = $this->dbConnect();

        $requete = $bdd->query('SELECT COUNT(*) AS numberBikes FROM bikes');
        $result = $requete->fetch();

        $nbBikes = $result['numberBikes'];
        return $nbBikes;
    }

    public function getNbPage()
    {
        $nbBikes = $this->countBikes();
       
        $nbPages = ceil( $nbBikes / 7);
        
        return $nbPages;
    }

    public function getBikesSearch($search) {

        $bdd = $this->dbConnect();

        $search = '%' . $search . '%';

        $requete = $bdd->prepare("SELECT  bikes.id, name, price, image, description, category_name 
                                  FROM bikes 
                                  INNER JOIN category 
                                  ON bikes.category_id = category.id
                                  WHERE name LIKE ?
                                  ORDER BY bikes.id
                                  ");
        // retourne les $limit premiers resultats sans les $offset premiers resultats

        $requete->execute(array($search));

        // avec query $search ne fonctionne pas ? il faut mettre les quotes '" . $search . "'
        return $requete;
    }

    public function getBikesCategory($search)
    {

        $bdd = $this->dbConnect();

        $requete = $bdd->prepare("SELECT  bikes.id, name, price, image, description, category_name 
                                  FROM bikes 
                                  INNER JOIN category 
                                  ON bikes.category_id = category.id
                                  WHERE category_name LIKE ?
                                  ORDER BY bikes.id
                                  ");
        // retourne les $limit premiers resultats sans les $offset premiers resultats

        $requete->execute(array($search));

        // avec query $search ne fonctionne pas ? il faut mettre les quotes '" . $search . "'
        return $requete;
    }
}
