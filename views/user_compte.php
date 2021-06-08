<?php
session_start();
if (!isset($_SESSION["connected"]) || empty($_SESSION["connected"])) {
    $_SESSION["connected"] = false;
}
require_once '../tools/multiload.php';
$conf = new Config(
    "MustShop",
    "Boutique basique et incomplete...Pour les Geeks et les autres. ",
    "index.css"
);
require_once 'templ/user_header.php';
?>

<div id="registerrep">
    <?php
    if ($_SESSION["connected"] == false) {
        header("location:index.php");
        exit;
    }


    

    $conf = new Config(
        "MustShop",
        "Boutique basique et incomplete...Pour les Geeks et les autres. ",
        "index.css"
    );

    $user = new ModUser();
    $qry_result = $user->getUserInfo();
    if ($qry_result->rowCount() > 0) {
        $row = $qry_result->fetch(PDO::FETCH_ASSOC);
    }
    $firstname = '';
    $lastname = '';
    $adresse = '';
    $cpostal = '';
    $ville = '';
    $telephone = '';

    $firstname_err = '';
    $lastname_err = '';
    $adresse_err = '';
    $cpostal_err = '';
    $ville_err = '';
    $telephone_err = '';

    $no_err = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["firstname"])) {
            $firstname_err = 'Le nom est obligatoire.';
            $no_err = false;
        } else {
            $firstname = $conf->protect_montexte($_POST["firstname"]);
        }
        if (empty($_POST["lastname"])) {
            $lastname_err = 'Le prenom est obligatoire.';
            $no_err = false;
        } else {
            $lastname = $conf->protect_montexte($_POST["lastname"]);
        }
        if (empty($_POST["adresse"])) {
            $adresse_err = 'L adresse est obligatoire.';
            $no_err = false;
        } else {
            $adresse = $conf->protect_montexte($_POST["adresse"]);
        }
        if (empty($_POST["cpostal"])) {
            $cpostal_err = 'Le code postal est obligatoire.';
            $no_err = false;
        } else {
            $cpostal = $conf->protect_montexte($_POST["cpostal"]);
        }
        if (empty($_POST["ville"])) {
            $ville_err = 'La ville est obligatoire.';
            $no_err = false;
        } else {
            $ville = $conf->protect_montexte($_POST["ville"]);
        }
        if (empty($_POST["telephone"])) {
            $telephone_err = 'Le telephone est obligatoire.';
            $no_err = false;
        } else {
            $telephone = $conf->protect_montexte($_POST["telephone"]);
        }

        /*
    Si pas d'erreurs : enregistrer les modifications dans la B.D...
     */
        if ($no_err) {
            $do_query = $user->doUpdateUserInfo($firstname, $lastname, $adresse, $cpostal, $ville, $telephone, $_SESSION["utilisateur"]["id"]);

            if ($do_query) {
                $str = '<p>';
                $str .= '<h1>Modifié avec succes</h1>';
                $str .= '</p>';
                echo $str;
                $_SESSION["utilisateur"]["nom"] = $firstname;
            } else {
                echo '<br><h1>Erreur de la modification...</h1>'; // A DEVELOPPER...
            }
        }
    } else {
        $firstname = $row["nomuser"];
        $lastname = $row["prenomuser"];
        $adresse = $row["adresse"];
        $cpostal = $row["cpostal"];
        $ville = $row["ville"];
        $telephone = $row["telephone"];
    }

    ?>

    <br><a href="../index.php">Retour à l'accueil...</a><br>
</div>
<br>
<div id="idform">
    <br>
    <p><u>Compte :</u></p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table width="95%">
            <tr>
                <th width="65%"></th>
                <th width="30%"></th>
            </tr>
            <tr>
                <td>
                    Nom:<br>
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>" size="47" maxlength="47">
                    <br><span class="error">* <?php echo $firstname_err; ?></span>
                </td>
                <td>
                    Prenom:<br>
                    <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                    <br><span class="error">* <?php echo $lastname_err; ?></span>
                </td>
            </tr>
            <tr>
                <td> Adresse:<br>
                    <input type="text" name="adresse" value="<?php echo $adresse; ?>" size="47" maxlength="127">
                    <br><span class="error">* <?php echo $adresse_err; ?></span>
                </td>
                <td> Code postal:<br>
                    <input type="text" name="cpostal" value="<?php echo $cpostal; ?>">
                    <br><span class="error">* <?php echo $cpostal_err; ?></span>
                </td>
            </tr>
            <tr>
                <td> Ville:<br>
                    <input type="text" name="ville" value="<?php echo $ville; ?>" size="35" maxlength="35">
                    <br><span class="error">* <?php echo $ville_err; ?></span>
                </td>
                <td> Téléphone:<br>
                    <input type="text" name="telephone" value="<?php echo $telephone; ?>">
                    <br><span class="error">* <?php echo $telephone_err; ?></span>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <input type="reset" name="annuler" value="annuler">
        <input type="submit" name="enregistrer" value="enregistrer">
    </form>
    <p><span class="error">* champs obligatoires.</span></p>
</div>

<?php

require_once 'templ/user_footer.php';