<?php
session_start();
if(!isset($_SESSION["connected"]) || empty($_SESSION["connected"])){
    $_SESSION["connected"] = false;
}
?>

<div id="registerrep">
    <?php

    require_once '../tools/multiload.php';

    $conf = new Config(
        "MustShop",
        "Boutique basique et incomplete...Pour les Geeks et les autres. ",
        "index.css"
    );

    $email = "";
    $password = "";

    $email_err = "";
    $password_err = "";
    $no_err = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $email_err = "L'email est obligatoire.";
            $no_err = false;
        } else {
            $email = $conf->protect_montexte($_POST["email"]);
        }

        if (empty($_POST["password"])) {
            $password_err = "Le mot de passe est obligatoire.";
            $no_err = false;
        } else {
            $password = $conf->protect_montexte($_POST["password"]);
        }
        /*
    Si pas d'erruers : chercher dans la B.D...
    */
        if ($no_err) {

            $user = new ModUser();

            $qry_result = $user->getUser($email);
            if ($qry_result->rowCount() > 0) {
                $row = $qry_result->fetch(PDO::FETCH_ASSOC);
                $passwordInDB = $row['motdepasse'];
                $password = $conf->protect_montexte($_POST["password"]);
                if (password_verify($password, $passwordInDB)) {
                    $_SESSION["connected"] = true;
                    $_SESSION["utilisateur"]["id"] = $row["iduser"];
                    $_SESSION["utilisateur"]["nom"] = $row["nomuser"];
                    $_SESSION["utilisateur"]["lastlogin"] = $row["lastlogin"];
                    $_SESSION["newdatelogin"] = date("Y-m-d H:i:s");

                    //doUpdateLastLogin($_SESSION["newdatelogin"], $_SESSION["utilisateur"]["id"]);
                    header("location:../index.php");
                    exit;
                } else {
                    $str = "<p>";
                    $str .= "<h2>1Conexion Impossible. Erreur sur  Utilisateur ET/OU mot de passe</h2>";
                    $str .= "</p>";
                    echo $str;
                }
            } else if ($qry_result->rowCount() == 0) {
                $str = "<p>";
                $str .= "<h2>2Conexion Impossible. Erreur sur  Utilisateur ET/OU mot de passe</h2>";
                $str .= "</p>";
                echo $str;
            } else {
                echo "<h2>Erreur lors de la recherche de cet utilisateur ...!</h2>";
            }
        }
    }
    ?>
    <br><a href="../index.php">Retour à l'accueil...</a><br>
</div>
<br>

<?php if ($_SESSION["connected"] == false) { ?>

    <div id="idform">
        <br>
        <p><u>Page de connexion:</u></p>
        <p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <fieldset>
                Email:<br>
                <input type="text" name="email" value="<?php echo $email; ?>">
                <span class="error">* <?php echo $email_err; ?></span>
                <br>
                Mot de passe:<br>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span class="error">* <?php echo $password_err; ?></span>
                <br>
                <br>
                <input type="reset" name="annuler" value="annuler">
                <input type="submit" name="connecter" value="connecter">
            </fieldset>
        </form>

    <?php } ?>
    </div>