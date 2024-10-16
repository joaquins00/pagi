<?php 
//archivo listado 
require_once("../../includes/base.php");
require_once("../../controllers/validar.php");

//echo 'esto anda  ';
$stmt = $conx->prepare("SELECT * FROM usuarios");
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
            <h1>lista usuarios </h1>
        </div>
        <div class="hr">
             <a href="formulario.php">Registrar Usuario</a>
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
                        <th>Password</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <?php while ($fila = $resultado->fetch_object()) {?> 
                    <tr>
                        <div class="td">
                            <td><?php echo $fila->id ?></td>
                            <td><?php echo $fila->email ?></td>
                            <td><?php echo $fila->password ?></td>
                            <td><a href="/index/panel/views/usuarios/formulario.php?id=<?php echo $fila->id ?>"> Editar </a></td>
                            <td><a href="/index/panel/controllers/usuarios.php?operacion=DELETE&id=<?php echo $fila->id ?>"> Eliminar </a></td>
                        </div>
                    </tr>
                <?php } ?>
            </table>
        </div>
</div>
</body>
</html>