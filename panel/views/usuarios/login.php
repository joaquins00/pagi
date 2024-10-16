<?php 
require_once("../../includes/base.php");
@session_start();


$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
//echo "que llega". $usuario. $password;


if(!empty($email) && !empty($password)){
    $stmt = $conx->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $stmt->close();

    $usuario = $resultado->fetch_object();

    if ($usuario === NULL){
        echo "Usuario o contraseña incorrecta";
    } else {
        $_SESSION["id"] = $usuario->id;
        header("Location: /index/panel/index.php");
        exit();
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="colorformulario.css">
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
<div class="div2">
        <h1>Ingrese su Usuario:</h1>
        <a href=""></a>
    <form method="POST">
        <input class="email" type="text" name="email" placeholder="email">
        <input class="password" type="text" name="password" placeholder="password">
        <button class="aceptar">aceptar</button>

        <input type="hidden" name="envio_login" value="1">

</div>
   
   

<?php
     $envio_login = isset($_POST["envio_login"])? $_POST["envio_login"] :1 ;
    
?>
        <script src="botonAceptar.js"></script>
</body>
</html>