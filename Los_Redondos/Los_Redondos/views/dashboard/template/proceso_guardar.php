<?php
include ("../../../model/conexion.php");

$id = $_REQUEST['id'];

$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "UPDATE imagen SET imagen='$imagen' WHERE id = '$id'";
$resultado = $conexion->query($query);

if($resultado){
  header("Location: ../../dashboard/production/perfil5.php");
}
else{
  echo "No se inserto";
}
?>