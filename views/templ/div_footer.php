    <div id="mleft">
        <p><?php echo $conf->getSignature();?></p>
    </div>
    <div id="mright">
        <p><?php    
        if(isset($_SESSION["newdatelogin"])){
            echo "Dernière connexion :  ".$_SESSION["utilisateur"]["lastlogin"];
        }
        ?></p>        
    </div>