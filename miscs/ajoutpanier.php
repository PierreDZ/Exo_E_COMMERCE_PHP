<?php
session_start();
require_once ("../tools/config.php");

$nbeArt = $_SESSION["panier"]["nbeArt"] ;
$nbeArt++;
$_SESSION["panier"]["nbeArt"] = $nbeArt;
// MANQUE ICI : on doit d'abord s'assurer que c'est un INT :-(
$_SESSION["panier"][$nbeArt] = protect_montexte($_GET["idart"]); 


$m = $_SESSION["currCat"];
if($m == -1){
	header("location:../index.php?act=panier");
	exit;
}else{
	header("location:../index.php?idsscat=$m");
	exit;
}

