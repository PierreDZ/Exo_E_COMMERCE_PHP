<?php
if (!isset($_SESSION["panier"]["nbeArt"]) || empty($_SESSION["panier"]["nbeArt"])) {
  $nbeArt = 0;
} else {
  $nbeArt = $_SESSION["panier"]["nbeArt"];
}
?>
<div id="sectionpanier">
  <?php
  if ($nbeArt == 0) {
  ?>
    <p>
      Panier vide :-(<br><br>
      <img src="assets/img/paniervide.jpg" alt="panier vide" width="" height="" />
    </p>
  <?php
  } else {
  ?>
    <table style="width:95%">
      <tr>
        <th width="70%">Article</th>
        <th width="10%">Prix</th>
        <th width="20%">&nbsp;</th>
      </tr>
      <?php
      $modArticles = new ModArticles();
      $totPanier = 0;
      for ($i = 1; $i <= $nbeArt; $i++) {
        $m = $_SESSION["panier"][$i];

        $qry_result  = $modArticles->getArticle($m);
        if ($qry_result->rowCount() > 0) {
          while ($row = $qry_result->fetch(PDO::FETCH_ASSOC)) {
            $rep = '';
            $rep .= '<tr>';
            $rep .= '<td><img src="' . $row['photoArticle'] . '" alt="' . $row['nomArticle'] . '"  width=60 height=60>&nbsp;';
            $rep .= utf8_encode($row['nomArticle']) . '</td>';
            $rep .= '<td>' . $row["prixArticle"] . '</td>';
            $rep .= '<td><a href="miscs/supprimerpanier.php?supart=' . $i . '" >Supprimer</a></td>';
            $rep .= '</tr>';
            echo $rep;
            $totPanier +=  $row['prixArticle'];
          }
        }
      }
      ?>
      <tr>
        <td></td>
        <td><?php echo "$totPanier"; ?></td>
        <td>Total</td>
      </tr>

    </table>
    <div id="commander">
      <p><a href="commander.php">Commander</a></p>
    </div>

  <?php
  }

  // echo '<pre>';print_r($_SESSION);echo '</pre>';
  ?>
</div>