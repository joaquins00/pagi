<?php
//require_once("base.php");
@session_start();

if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
   header("Location: login.php"); //validado
   exit();
} 
//esto es archivo unico y no se pone en db 
