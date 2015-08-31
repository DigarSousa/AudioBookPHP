<?php
include_once('../Class/User.php');

$obj = file_get_contents("php://input");
$json = json_decode($obj);
$name = $json->name;
$login = $json->login;
$password = $json->password;
$user = new User($name, $login, $password);

if ($user->signUp()) {
    echo 1;
} else {
    echo 0;
}

