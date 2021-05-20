<div classe="MyNavBar" id="menuhorizontalL">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">MustShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?all=all">Catalogue</a>
                </li>
                <?php if ($_SESSION["connected"] == false) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?register=register">S'enregistrer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?login=login">Se Connecter</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="compte.php">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="views/user_deconnexion.php">
                            [<?php echo $_SESSION["utilisateur"]["nom"]; ?>]Déconnexion
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=panier">Panier</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0" method="get" action="#">
                <input class="form-control mr-sm-2" type="text" name="txtSearch" value="">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit" value="search">Chercher</button>
            </form>
        </div>
    </nav>
</div>