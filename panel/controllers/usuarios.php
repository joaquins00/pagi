<?php
//nuevo eliminar editarer
require_once("../includes/base.php");
require_once("validar.php");

$operacion = $_GET["operacion"];

if ( $operacion == "NEW" ) { 

    $email = $_POST['email'];
    $password = $_POST["password"];
    $sentencia = $conx->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?) ");
    $sentencia->bind_param("ss", $email, $password);
    $sentencia->execute();
    
} else if( $operacion == "EDIT" ) {
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST["password"];
    $sentencia = $conx->prepare("UPDATE usuarios SET email = ?, password = ? WHERE id = ? ");
    $sentencia->bind_param("ssi", $email, $password, $id);
    $sentencia->execute();

} else if( $operacion == "DELETE" ) {

    $id = $_GET["id"];
    $sentencia = $conx->prepare("DELETE FROM usuarios WHERE id = ? ");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();

}

header("Location: ../views/usuarios/listado.php");
