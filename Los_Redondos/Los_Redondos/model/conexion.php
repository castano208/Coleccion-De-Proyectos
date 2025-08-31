<?php

//Datos requeridos para la conexión a la BD
$usuario = "root"; //El usuario con el que se accede a la BD
$clave = ""; //Contraseña definida por defecto
$servidor = "localhost"; //Servidor //127.0.1 //El PC donde está la BD
$baseDatos = "losredondos"; //El nombre de la BD del proyecto


//creando la conexión
// $conexion = mysqli_connect($servidor, $usuario, $clave) or die ("No fue posible conectarse.");
$conexion = new mysqli($servidor, $usuario, $clave, $baseDatos) or die ("No fue posible conectarse.");

// if ($conexion->connect_error) {
//     die("Conexión fallida: " . $conexion->connect_error);
// }
// // echo "Conexión exitosa!";

//seleccionar la bd
//$bd = mysqli_select_db($conexion, $baseDatos) or die("No se ha podido conectar a la Base de Datos: $baseDatos.");

/*
try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $clave);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>alert('Conexión exitosa!')</script>";
  } catch(PDOException $error) {
    echo "Conexión fallida:" .$error->getMessage();
}
*/
?>