<?php
require_once("../includes/base.php");
require_once("validar.php");

$operacion = $_GET["operaciones"];

if ( $operacion == "NEW" ) { 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $usuarios = "1";
    $titulos = isset($_POST["titulos"]) ? $_POST["titulos"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $textos = isset($_POST["textos"]) ? $_POST["textos"] : "";
    $id_categorias = isset($_POST["id_categorias"]) ? $_POST["id_categorias"] : "";
    $id_usuarios = isset($_POST["id_usuarios"]) ? $_POST["id_usuarios"] : "";
    $rutaFinal = "imagen";
    $sql = "INSERT INTO noticias (titulos, descripcion, textos, id_categorias, id_usuarios, imagenes, fecha) VALUES (?, ?, ?, ?, ?, ?, now())";
    $stmt = $conx->prepare($sql);
    $stmt->bind_param("sssiis", $titulos, $descripcion, $textos, $id_categorias, $id_usuarios, $rutaFinal);
    $stmt->execute();
    $stmt->close();
/*
if (move_uploaded_file($_FILES["upload"]["tmp_name"], $rutaFinal)){
    $sql = "INSERT INTO noticias (id titulo, descripcion, textos, id_categorias, id_usuarios, imagenes, fecha) VALUES (NULL, ?, ?, ?, ?, ?, ?, now())";
    $stmt = $conx->prepare($sql);
    $stmt->bind_param("sssiis", $titulos, $descripcion, $textos, $id_categorias, $id_usuarios, $rutaFinal);
    $stmt->execute();
    $stmt->close();*/

    //header("Location: ../views/noticias/listado.php");

      


} else if( $operacion == "DELETE" ) {

    $id = $_GET["id"];
    $sentencia = $conx->prepare("DELETE FROM noticias WHERE id = ? ");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();

}


header("Location: ../views/noticias/listado.php");


