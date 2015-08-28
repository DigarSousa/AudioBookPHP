<?php
include_once('../Class/User.php');
/**
 * Json application/json : Receive a json object with login and password mapped:
 * json->login
 * json->password
 *
 * @return 1 if logged or 0 for denied access
 *
 */
$obj = file_get_contents("php://input");
$json = json_decode($obj);

$login = $json->login;
$password = $json->password;
$user = new User(null, $login, $password);

if ($user->login()) {
    echo '1';
} else {
    echo '0';
}
