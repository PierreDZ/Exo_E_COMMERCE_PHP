<?php
session_start();

$_SESSION["connected"] = false;
unset($_SESSION["newdatelogin"]);
unset($_SESSION["utilisateur"]);
header("location:../index.php");