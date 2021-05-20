<?php
class ModArticles implements Conn_db
{
    private $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=".self::C_dbname;
            $this->conn = new PDO($dsn, self::C_dbuser, self::C_dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $p) {
            die('Erreur de connexion. Err : ' . $p->getMessage());
        }
    }


    function getAllArticles(){
        $query = "SELECT * FROM produits";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function getArticlesofSsCat($idssCat){
        $query = "SELECT * FROM produits where idSscategorie = :idssCat";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idssCat', $idssCat, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function getArticle($idArt){
        $query = "SELECT * FROM produits where idarticle = :idart";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idart', $idArt, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
}