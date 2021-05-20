<?php
session_start();
if(!isset($_SESSION["connected"]) || empty($_SESSION["connected"])){
    $_SESSION["connected"] = false;
}

$conf = new Config(
    "MustShop",
    "Boutique basique et incomplete...Pour les Geeks et les autres. ",
    "index.css"
);

$id_ssCat=0;
$id_Art=0;

if (isset($_GET['idsscat'])) { // affichier tous les articles selon la sous categorie choisie
    if(!empty($_GET["idsscat"])){
        $id_ssCat = $conf->protect_montexte($_GET["idsscat"]);
    }
    if( $id_ssCat <> 0){
        $modArticles = new ModArticles();
        $articles = $modArticles->getArticlesofSsCat($id_ssCat);
        $str_inc = "views/view_detailsCategorie.php";
    }
} else if (isset($_GET['idart'])) { // afficher la page d'un article
    if(!empty($_GET["idart"])){
        $id_Art = $conf->protect_montexte($_GET["idart"]);
    }
    if( $id_Art <> 0){
        $modArticles = new ModArticles();
        $article = $modArticles->getArticle($id_Art);
        $str_inc ="views/view_article.php";
    }
} else if (isset($_GET["txtSearch"]) && !empty(isset($_GET["txtSearch"]))){ // recherche par le formulaire 
    $txtSearch = $conf->protect_montexte($_GET['txtSearch']);
    unset($_GET["txtSearch"]);
    $modArticles = new ModArticles();
    $allArticles = $modArticles->getAllArticles($txtSearch);
    $str_inc ="views/view_afficherall.php";
} else if(isset($_GET['all'])){ // menu Catalogue : on affiche tout !!! 
    $modArticles = new ModArticles();
    $allArticles = $modArticles->getAllArticles();
    $str_inc ="views/view_afficherall.php";
} else if(isset($_GET['act'])){ // afficher le panier
    $str_inc ="views/view_afficherpanier.php";
}else if(isset($_GET['register'])) {
    if(!empty($_GET["register"])){
        $reg = $conf->protect_montexte($_GET["register"]);
    }
    if(strtolower($reg) === "register"){
        //$str_inc = "views/register.php";
        header('location:views/user_register.php');
    }
}else if(isset($_GET['login'])) {
    if(!empty($_GET["login"])){
        $login = $conf->protect_montexte($_GET["login"]);
    }
    if(strtolower($login) === "login"){
        //$str_inc = "views/view_login.php";
        header('location:views/user_login.php');
    }   
}else { // page accueil
    $str_inc ="views/view_bienvenue.html";
}


require_once ("views/view_index.php");
