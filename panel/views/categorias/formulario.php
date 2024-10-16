<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
require_once("../../includes/base.php");
require_once("../../controllers/validar.php");


if(isset($_GET["id"]) ) 
    $id = $_GET["id"];
    //preparo la sentencia conm ->prepare()
    $sentencia = $conx->prepare("SELECT * FROM categorias WHERE id = ?"); //devuelve uno o muchos resultados
    //ahora hago un bind de los parametros establecidos 
    $sentencia->bind_param('i', $id);//paso el parametro entero de id para ejecutar
    //ahora procedo a ejecutar la sentencia con sus parametros establecidos
    $sentencia->execute(); // ->execute sirve para ejecutar todo tipo de sentencia  
    //pasamos al resultado de la sentencia 
    $resultado = $sentencia->get_result(); // -> get_result para obtener resultados de uno o varios registros
    // pasamos a trabajar con objetos
    $usuario = $resultado->fetch_object();  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="colorformulario.css" style="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar nombre</title>
</head>
<body>
<div class="div1">
        <?php if (isset($_GET["id"])){?> 
            <div class="edith1">
                 <h1>Editar nombre</h> <br>
            </div>
        <?php } else { ?>
            <div class="crearh1">
                <h1>Crear nombre</h1> <br>
            </div>
        <?php }?>

        <form action="/index/panel/controllers/categorias.php?operacion=<?php echo (isset($_GET["id"])) ? "EDIT" : "NEW" ?>"  method="POST" class="formu">
            <input type="hidden" name="id" value="<?php echo (isset($_GET["id"])) ? $usuario->id : "" ?>" />
            <div class="nombres">
                <label>nombre</label>
                <input type="text"  name="nombres" value="<?php echo (isset($_GET["id"])) ? $usuario->nombres : "" ?>" />
            </div>
            <div class="id_usuarios">
                <label>id usuarios</label>
                <input type="text"  name="id_usuarios" value="<?php echo (isset($_GET["id"])) ? $usuario->id_usuarios : "" ?>" />
            </div>
            <div class="guardar">
                <button>Guardar</button>
            </div>
            <div>
                <a href="listado.php">atras</a>
            </div>
        </form>

</div>
</body>
</html>