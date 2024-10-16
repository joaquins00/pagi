<?php 

require_once("../../includes/base.php");
require_once("../../controllers/validar.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" action="formulario.php" enctype="multipart/form-data">
		<input type="file" name="upload" accept=".jpg">>
		<input type="submit">
        <a href="../noticias/listado.php">atras</a>
	</form>

</body>
</html>