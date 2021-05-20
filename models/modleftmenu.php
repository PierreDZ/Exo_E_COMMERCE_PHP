<?php
class ModLeftMenu
{
    public function buildLeftMenu()
    {
        $cat = new ModCategories();
        $qry_result = $cat->getAllcategories();

        $res = [];

        while ($row = $qry_result->fetch(PDO::FETCH_ASSOC)) {
            $res[$row['nomcategorie']] = [];
            $ssres = $cat->getSousCategories($row['idcategorie']);
            while($row_Ss = $ssres->fetch(PDO::FETCH_ASSOC)){
                array_push($res[$row['nomcategorie']], [$row_Ss['idsscategorie'],$row_Ss['nomsscategorie']]);
            }
        }
        return  $res;
    }
}
