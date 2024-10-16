<?php
// este orden se tiene que respetar para todo ser user pss db
$servidor = "test-mysql";
$user = "root";
$password = "password";
$database = "base";


$conx = new mysqli($servidor, $user, $password, $database);// objeto para conexion de base de datos 

if ($conx->connect_error) {
    echo "error: ".$conx->connect_error;
}
$conx->set_charset("utf8mb4");