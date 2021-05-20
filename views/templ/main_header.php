<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $sitetitle; ?></title>
    <meta name="description" content="Ma petite boutique">
    <meta name="keywords" content="php , afpa, e-commerce, mustapha ">
    <meta name="author" content="Mustapha A.">
    <link rel="stylesheet" href="assets/css/<?php echo $siteCSS; ?>">     
</head>
<body>
    <div id="mainsite">
        <!-- header block -->
        <div id="headerblock">  
            <?php
            include_once("views/templ/div_header.php");
            ?>
            <div class="spacer"></div>  
        </div>
        <!-- central block -->
        <div id="centralblock">
            <!-- leftmenu block -->
            <div id="leftmenu">
            <?php
            $leftMenu = new ModLeftMenu();
            $resLeftMenu = $leftMenu->buildLeftMenu();
            include_once("views/view_left_menu.php");
            ?>
            </div>
            <!-- content block -->