<?php

/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    $con = new PDO("mysql:host=localhost; dbname=register", "root", "");
    return $con;
}

?>