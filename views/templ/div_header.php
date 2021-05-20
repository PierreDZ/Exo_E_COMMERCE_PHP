        <div id="menuhorizontalR">  
            <?php
                $txtSearch = "";
                if (isset($_POST["txtSearch"])) {
                    $txtSearch = protect_montexte($_POST['txtSearch']);
                    unset($_POST["txtSearch"]);
                } 
            ?>
            <form method="post" action="#"> 
                <input type="text" value="<?php echo $txtSearch;?>" name ="txtSearch" />
                <button type="submit" value="search">Search</button>
            </form>
        </div>          
        <div id="menuhorizontalL">            
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?all=all">Produits</a></li>                
                <?php 
                if($_SESSION["connected"] == false) { ?>
                    <li><a href="register.php" target="_self">S'enregistrer</a></li>
                    <li><a href="login.php" target="_self">Se connecter</a></li>
                <?php
                } else { 
                ?>
                    <li><a href="compte.php" target="_self">Mon compte</a></li>
                    <li><a href="deconnexion.php" target="_self">[<?php echo $_SESSION["utilisateur"]["nom"];?>] Deconnexion</a></li>
                <?php 
                }
                ?>
                <li><a href="index.php?act=panier" target="_self">Panier</a></li>
            </ul>              
        </div>