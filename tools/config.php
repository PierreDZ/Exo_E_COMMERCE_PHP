<?php

class Config {
    protected $sitetitle;
    protected $siteslogan;
    protected $siteCSS;

    function __construct($title, $slogan, $style){
        $this->sitetitle = $title;
        $this->siteslogan = $slogan;
        $this->siteCSS = $style;

    }
    function getTitle(){
        return $this->sitetitle;
    }
    function getStyle(){
        return $this->siteCSS;
    }
    function getSignature(){
        return $this->siteslogan . " 2038(R) par Moi.";
    }
    function protect_montexte($montexte) {
        $montexte = trim($montexte);
        $montexte = stripslashes($montexte);
        $montexte = htmlspecialchars($montexte);
        return $montexte;
    }
}