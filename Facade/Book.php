<?php

include_once("../Class/UtilityGrid.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
/**
 * Created by IntelliJ IDEA.
 * User: edgar
 * Date: 29/08/15
 * Time: 10:37
 */


$rows = UtilityGrid::getBookList(0);

$results = array();
$resultsSet = array();

foreach ($rows as $row) {
    $results ['id'] = $row["ID_BOOK"];
    $results ['name'] = $row["NAME"];
    $results['image'] = $row["IMAGE_64"];
    $results['idCategory'] = $row["ID_CATEGORY"];
    $results['author'] = $row["AUTHOR"];
    $results['description'] = $row["DESCRIPTION"];

    $resultsSet[] = $results;
}
$json = json_encode($resultsSet);
echo $json;

