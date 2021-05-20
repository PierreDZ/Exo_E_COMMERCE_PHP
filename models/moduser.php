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
}
