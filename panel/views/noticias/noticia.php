<?php
require_once("../../includes/base.php");
require_once("../../controllers/validar.php");

if (isset($_GET["noticia"])){
    $noticia = $_GET["noticia"];
    $sentencia = $conx->prepare("SELECT N.*, C.*, C.id AS categoria_id, U.*, U.id AS usuario_id FROM noticias N LEFT JOIN categorias C ON N.id_categorias = C.id LEFT JOIN usuarios U ON N.id_usuarios = U.id WHERE N.id = ?");
    $sentencia->bind_param("s", $noticia);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
}