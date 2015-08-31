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


$imagem = file_get_contents('../livro.png');
$base = base64_encode($imagem);


//UtilityGrid::insertCategory("Romance", $base);


UtilityGrid::insertIntoBook("Rapunzel", $base, 2);

//todo: interface com usuário pra cadastro e manutençãp e as putarias necessárias