<?php

spl_autoload_register(function ($className) {
    $dirs = ['models','tools','../models','../tools'];
    try {
        $err = true;
        foreach ($dirs as $dir) {
            $f = "$dir/$className.php";
            if (file_exists($f)) {
                require_once ($f);
                $err = false;
                break;
            }
        }
        if ($err) {
            throw new Exception("Class introuvable $className !! <br>");
        }
    } catch (Exception $e) {
        echo "erreur : " . $e->getMessage();
        die();
    }
});
