<?php
$_SESSION["currCat"] = -1;
$return_string='';
if($allArticles->rowCount() > 0 ){
    while($row = $allArticles->fetch(PDO::FETCH_ASSOC)) {            
        $return_string .= '<hr><p class="ajoutpanier">Ajouter<br>('.$row['prixArticle'].' €)<br>';
        $return_string .= '<a href="miscs/ajoutpanier.php?idart='.$row['idArticle'].'"><img src="assets/img/panier.jpg" width=36 height=36></a>';
        $return_string .= '<br></p>'."\n";
        $return_string .= '<p class="titrearticle">'.utf8_encode($row['nomArticle']).'</p>'  .  "\n";
        $return_string .= '<p><img src="'.$row['photoArticle'].'" alt="'. $row['nomArticle'] .'" width=360 height=360></p>'."\n";
        $return_string .= '<p>'.utf8_encode($row['descArticle']).'</p>';
    }
}else {
    $return_string .= '<h1>Article introuvable ...</h1>';
}

echo $return_string;