<?php
require_once("../../includes/base.php");
require_once("../../controllers/validar.php");

//echo 'esto anda  ';
$stmt = $conx->prepare("SELECT * FROM noticias");
$stmt->execute();
$resultado = $stmt->get_result();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylolistado.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Usuarios</title>
</head>
<body>
<div class="listado">
    <div class="list">
        <div class="h1">
            <h1>lista noticias </h1>
        </div>
        <div class="hr">
             <a href="formulario.php">Registrar noticias</a>
        </div>
        <div class="form">
            <form action="/index/panel/index.php" method="POST">
                <button name="logout" type="submit">atras</button>
            </form> 
        </div>
    </div>    
        <div class="tabla">
            <table class="table">
                <thead>
                    <tr div="th">
                        <th>Id</th>
                        <th>Titulos</th>
                        <th>Descripcion</th>
                        <th>Textos</th>
                        <th>Id Categorias</th>
                        <th>Id Usuarios</th>
                        <th>imagenes</th>
                        <th>Fechas</th>
                    </tr>
                </thead>
                <?php while ($fila = $resultado->fetch_object()) {?> 
                    <tr>
                        <div class="td">
                            <td><?php echo $fila->id ?></td>
                            <td><?php echo $fila->titulos ?></td>
                            <td><?php echo $fila->descripcion ?></td>
                            <td><?php echo $fila->textos ?></td>
                            <td><?php echo $fila->id_categorias ?></td>
                            <td><?php echo $fila->id_usuarios ?></td>
                            <td><img width="100" src="../upload/upload/ <?php echo $fila->imagenes ?>"></td>
                            <td><?php echo $fila->Fechas ?></td>
                            <td><a href="/index/panel/views/upload/upload.php?id=<?php echo $fila->id ?>"> imagen </a></a></td>
                            <td><a href="/index/panel/views/noticias/formulario.php?id=<?php echo $fila->id ?>"> Editar </a></td>
                            <td><a href="/index/panel/controllers/noticias.php?operaciones=DELETE&id=<?php echo $fila->id ?>"> Eliminar </a></td>
                        </div>
                    </tr>
                <?php } ?>
            </table>
    	</form>
        </div>
</div>
</body>
</html>