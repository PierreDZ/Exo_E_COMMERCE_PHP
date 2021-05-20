    <div id="mleft">
        <p><?php echo $sitetitle;?> - 2023(R) par Moi, <?php echo $siteslogan;?></p>
    </div>
    <div id="mright">
        <p><?php    
        if(isset($_SESSION["newdatelogin"])){
            echo "Dernière connexion :  ".$_SESSION["utilisateur"]["lastlogin"];
        }
        ?></p>        
    </div>