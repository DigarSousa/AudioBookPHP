<?php
include_once("../Class/UtilityGrid.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
/**
 * Created by IntelliJ IDEA.
 * User: edgar
 * Date: 22/08/15
 * Time: 14:32
 */

//UtilityGrid::insertCategory("Bosta", "../bosta1.png");
$imagem = file_get_contents('../bosta1.png');
echo $imagem;
echo base64_encode($imagem);
/*$rows = UtilityGrid::getCategories();

$results = array();
$resultsSet = array();
foreach ($rows as $row) {
    $results ['id'] = $row["ID_CATEGORY"];
    $results ['name'] = $row["NAME_CATEGORY"];
    $results['image'] = base64_encode($row["IMAGE_64"]);

    $resultsSet[] = $results;
}

$json = json_encode($resultsSet);
echo $json;

function encodeToBase($image)
{
    $base64 = base64_encode($image);
    return ('data:' . 'image/png' . ';base64,' . $base64);
}

*/
