<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="description" content="Ma petite boutique">
    <meta name="keywords" content="php , afpa, e-commerce, MustShop ">
    <meta name="author" content="MustShop Inc">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $conf->getTitle(); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/<?php echo $conf->getStyle(); ?>">     
</head>
<body>
    <div id="mainsite" class="container">
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
            include_once("views/view_left_menu.php");
            ?>
            </div>
            <!-- content block -->