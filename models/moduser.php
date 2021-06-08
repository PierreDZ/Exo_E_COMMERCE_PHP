<?php
class ModUser implements Conn_db
{
    private $conn;
    public function __construct()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=" . self::C_dbname;
            $this->conn = new PDO($dsn, self::C_dbuser, self::C_dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $p) {
            die('Erreur de connexion. Err : ' . $p->getMessage());
        }
    }

    function doRegister($firstname, $lastname, $email, $password)
    {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO utilisateurs (nomuser, prenomuser, emailuser, motdepasse,lastlogin) ";
        $query .= "VALUES (:first, :last, :email, :mdp,'" . date("Y-m-d H:i:s") . "' )";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':first', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':last', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':mdp', $passwordHash, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $p) {
            return false;
        }
        return $stmt;
    }


    function getUser($email)
    {

        $query = "select * from utilisateurs where emailuser=:email";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $p) {
            return false;
        }
        return $stmt;
    }

    function getUserInfo()
    {
        $idUser = $_SESSION["utilisateur"]["id"];
        $query = "select * from utilisateurs where iduser=:iduser";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':iduser', $idUser, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $p) {
            return false;
        }

        return $stmt;
    }

    function doUpdateUserInfo($firstname, $lastname, $adresse, $cpostal, $ville, $telephone, $idUser)
    {
        try {
            $query = "UPDATE utilisateurs SET ";
            $query .= "nomuser = :nom, ";
            $query .= "prenomuser = :prenom, ";
            $query .= "adresse = :adresse, ";
            $query .= "cpostal = :cp, ";
            $query .= "ville = :ville, ";
            $query .= "telephone = :tel ";
            $query .= "WHERE iduser = :iduser";


            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $stmt->bindParam(':cp', $cpostal, PDO::PARAM_STR);
            $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $telephone, PDO::PARAM_STR);
            $stmt->bindParam(':iduser', $idUser, PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $p) {
            return false;
        }
        return $stmt;
    }

    function doUpdateLastLogin($logindate, $iduser){

        try {
            $query = "UPDATE utilisateurs SET lastlogin = :logindate WHERE iduser=:id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':logindate', $logindate, PDO::PARAM_STR);
            $stmt->bindParam(':id', $iduser, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $p) {
            return false;
        }
    }

}
