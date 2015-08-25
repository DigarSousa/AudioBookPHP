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

//UtilityGrid::insertCategory("Medicina", "../med.png");

$rows = UtilityGrid::getCategories();

$results = array();
foreach ($rows as $row) {
    $results ['id'] = $row["ID_CATEGORY"];
    $results ['name'] = $row["NAME_CATEGORY"];
    $results['image'] = base64_encode($row["IMAGE"]);

}

$json = json_encode($results);
echo $json;

function encodeToBase($image)
{
    $base64 = base64_encode($image);
    return ('data:' . 'image/png' . ';base64,' . $base64);
}


