<?php
$_SESSION["currCat"] = $id_ssCat;

$return_string = '';
if($articles->rowCount() > 0 ){
    while($row = $articles->fetch(PDO::FETCH_ASSOC)) {    
        $return_string .= '<hr><p><img class="img-fluid" src="'.$row['photoArticle'].'" alt="'. $row['nomArticle'] .'"  width=120 height=120></p>'."\n";
        $return_string .= '<p><a class ="lienarticle" href="index.php?idart='.$row['idArticle'].'">'.utf8_encode($row['nomArticle']).' </a>&nbsp;('.$row['prixArticle'].'€)</p>' . "\n";
    }
}else {
    $return_string .= "<h1>Pas d'article encore ...</h1>";
}

echo $return_string;