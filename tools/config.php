<?php
$sitetitle = "BOUTIQUE BASIQUE ET INCOMPLETE...";
$siteslogan = "Pour les Geeks et les autres...";
$siteCSS = "index.css";

function protect_montexte($montexte) {
    $montexte = trim($montexte);
    $montexte = stripslashes($montexte);
    $montexte = htmlspecialchars($montexte);
    return $montexte;
}