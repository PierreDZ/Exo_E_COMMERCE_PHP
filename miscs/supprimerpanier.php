<?php
session_start();

if(!isset($_SESSION["panier"]["nbeArt"]) || empty($_SESSION["panier"]["nbeArt"])){
    $nbeArt = 0;
}else {
    $nbeArt = $_SESSION["panier"]["nbeArt"];
}

// S'assurer que suppart est un integer :-(
if(isset($_GET['supart'])){
    if(!empty($_GET['supart'])){
        $knumArt = $_GET['supart'];
        for($j=$knumArt; $j<=$nbeArt-1; $j++){
            $_SESSION["panier"][$j] = $_SESSION["panier"][$j+1];
        }
        unset($_SESSION["panier"][$nbeArt]);
        $nbeArt--;
        $_SESSION["panier"]["nbeArt"] = $nbeArt;

        header("location:../index.php?act=panier");
        exit;
    }
}
