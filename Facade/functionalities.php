<?php

include_once("../Class/UtilityGrid.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

/**
 * Created by IntelliJ IDEA.
 * User: edgar
 * Date: 29/08/15
 * Time: 10:46
 */


$imagem = file_get_contents('../Romance.png');
$base = base64_encode($imagem);


//UtilityGrid::insertCategory("Medicina", $base);


UtilityGrid::insertIntoBook("Branca de Neve", "Biscate", "Esse livro é só pra viadinhos =D", $base, 4);

//todo: interface com usuário pra cadastro e manutençãp e as putarias necessárias