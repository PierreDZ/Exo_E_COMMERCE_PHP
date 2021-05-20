<?php
class ModCategories implements Conn_db
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

    public function getAllcategories()
    {
        $query = "SELECT * FROM categories";
        $res = $this->conn->query($query);
        return $res;
    }

    public function getSousCategories($id)
    {

        $query = "SELECT * FROM sous_categories where idcategorieparent = :idcat";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idcat', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
}
