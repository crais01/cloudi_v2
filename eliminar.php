<?php
include("conexion.php");

$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];

$sql = "delete from archivo where id=$id and nombre = '$nombre'";

if($conex->query($sql)){
	$aux = base64_encode("eliminado");
	header("location:index.php?aux=$aux");
}else{
	echo "no eliminado";
}


include("close.php");

?>