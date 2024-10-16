<?php

require_once("../includes/base.php");
require_once("validar.php");


$operacion = $_GET["operacion"];

if ( $operacion == "NEW" ) { 

    $nombres = $_POST['nombres'];
    $id_usuarios = $_POST["id_usuarios"];
    $sentencia = $conx->prepare("INSERT INTO categorias (nombres, id_usuarios) VALUES (?, ?) ");
    $sentencia->bind_param("si", $nombres, $id_usuarios);
    $sentencia->execute();
    
} else if( $operacion == "EDIT" ) {
    
    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $id_usuarios = $_POST["id_usuarios"];
    $sentencia = $conx->prepare("UPDATE categorias SET nombres = ?, id_usuarios = ? WHERE id = ? ");
    $sentencia->bind_param("sii", $nombres, $id_usuarios, $id);
    $sentencia->execute();

} else if( $operacion == "DELETE" ) {

    $id = $_GET["id"];
    $sentencia = $conx->prepare("DELETE FROM categorias WHERE id = ? ");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();

}


header("Location: ../views/categorias/listado.php");



