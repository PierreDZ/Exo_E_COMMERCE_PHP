<?php
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

    $firstname = "";
    $lastname = "";
    $email = "";
    $password = "";

    $firstname_err = "";
    $lastname_err = "";
    $email_err = "";
    $password_err = "";
    $no_err = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["firstname"])) {
            $firstname_err = 'Le nom est obligatoire.';
            $no_err = false;
        } else {
            $firstname =$conf->protect_montexte($_POST["firstname"]);
        }
        if (empty($_POST["lastname"])) {
            $lastname_err = 'Le prenom est obligatoire.';
            $no_err = false;
        } else {
            $lastname =$conf->protect_montexte($_POST["lastname"]);
        }
        if (empty($_POST["email"])) {
            $email_err = 'L email est obligatoire.';
            $no_err = false;
        } else {
            $email =$conf->protect_montexte($_POST["email"]);
        }

        if (empty($_POST["password"])) {
            $password_err = 'Le mot de passe est obligatoire.';
            $no_err = false;
        } else {
            $password =$conf->protect_montexte($_POST["password"]);
        }
        /*
        Si pas d'erruers : enregistrer dans la B.D...
        */
        if ($no_err) {
            $user = new ModUser();
            $do_query = $user->doRegister($firstname, $lastname, $email, $password);
            if ($do_query) {
                $str = '<p>';
                $str .= '<h2>Enregistré avec succes</h2>';
                $str .= '</p>';
                echo $str;
            } else {
                echo "<h2>Erreur lors de l'enregistrement...</h2>";
            }
        }
    }
    ?>
    <br><a href="../index.php">Retour à l'accueil...</a><br>
</div>
<br>
<div id="idform">
    <br>
    <p><u>Page d'enregistrement :</u></p>
    <p>
        Merci de vous enregistrer pour pourvoir :<br><br>
        - faire vos achats,<br>
        - bénéficier d'offres promotionnelles en avant première,<br>
        - de recevoir vos points de fedilité,<br>
        - et bien dautres surprises..<br>

    </p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
            Nom:<br>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>">
            <span class="error">* <?php echo $firstname_err; ?></span>
            <br>
            Prenom:<br>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
            <span class="error">* <?php echo $lastname_err; ?></span>
            <br>
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
            <input type="submit" name="enregistrer" value="enregistrer">
        </fieldset>
    </form>
    <p><span class="error">* champs obligatoires.</span></p>

</div>
<?php
    require_once 'templ/user_footer.php';