<?php
session_start();

require_once '../tools/multiload.php';

$conf = new Config(
	"MustShop",
	"Boutique basique et incomplete...Pour les Geeks et les autres. ",
	"index.css"
);


$nbeArt = $_SESSION["panier"]["nbeArt"] ;
$nbeArt++;
$_SESSION["panier"]["nbeArt"] = $nbeArt;
// MANQUE ICI : on doit d'abord s'assurer que c'est un INT :-(
$_SESSION["panier"][$nbeArt] = $conf->protect_montexte($_GET["idart"]); 


$m = $_SESSION["currCat"];
if($m == -1){
	header("location:../index.php?act=panier");
	exit;
}else{
	header("location:../index.php?idsscat=$m");
	exit;
}

