<?php 

require_once("../../includes/base.php");
require_once("../../controllers/validar.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Indicamos la carpeta
$carpetaASubir = "upload/";
// Indicamos el nombre del archivo
$rutaFinal = $carpetaASubir . $_FILES["upload"]["name"];

//$tamañoImagen = get_image_size($_FILES["upload"]["tmp_name"]);

$mimeType = mime_content_type($_FILES['upload']["tmp_name"]);
if ($mimeType !== "image/jpeg") {
	echo "Tu archivo no es valido";
	exit();
}

// Validamos el tamaño
if ($_FILES["upload"]["size"] > (1024 * 1024) * 5) {
	echo "Tu imagen se excede de tamaño";
	exit();

}

if (move_uploaded_file($_FILES["upload"]["tmp_name"], $rutaFinal)) {
	$sql = "UPDATE noticias SET imagenes = ? WHERE id = 1";
	$stmt = $conx->prepare($sql);
	$stmt->bind_param("s", $rutaFinal);
	$stmt->execute();
	$stmt->close();
	
} else {
	echo "Error al subir el archivo";
}


header("Location: ../noticias/listado.php");