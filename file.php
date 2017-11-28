<?php	
include("conexion.php");

	$ruta = "imagenes/".basename(str_replace(" ","%20", $_FILES['archivo']['name']));
	$nombre = $_FILES['archivo']['name'];
	$tipo = $_FILES['archivo']['type'];
	$peso = $_FILES['archivo']['size'];
	$fecha = date("Y.m.d");
	$usuario = $_POST['usuario'];

	//echo str_replace(" ","%20", $_FILES['archivo']['name']);
	//die;
	$query = "insert into archivo(nombre,tipo,peso,fecha_subida,ruta)";
	$query .= "values('$nombre','$tipo','$peso','$fecha','$ruta')";
	

	
	if($_FILES['archivo']['size'] > 1000000){
		$aux = base64_encode("excedido");
	}else{
		$conex->query($query);
		move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta);
		$aux = base64_encode("subido"); 
	}
	
	include("close.php");

	header("location:index.php?aux=$aux");
?>