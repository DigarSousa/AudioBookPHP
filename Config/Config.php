<?php
//Methods
//==================================================================================================================
function openCon()
{
    $username = 'root';
    $password = 'ed77526';

    $conn = new PDO("mysql:host=localhost;dbname=AUDIOBOOKS", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}
//==================================================================================================================