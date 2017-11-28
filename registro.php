<!DOCTYPE html>
<html>
<head>
	<title>Registro Usuario</title>
</head>
<body>
	<form action="registro.php" method="POST">		
		<label for="usuario">Usuarios</label>
		<input type="text" name="usuario" id="usuario">
		<label for="contrasena">Contraseña</label>
		<input type="password" name="contrasena" id="contrasena">
		<label for="rep_contrasena">Repetir Contraseña</label>
		<input type="password" name="contrasena2" id="contrasena2">
		<label for="rut">Rut</label>
		<input type="text" name="rut" id="rut">-
		<input type="text" name="dv" id="dv">
		<label for="nombres">Nombres</label>
		<input type="text" name="nombre" id="nombre">
		<label for="apellido">Apellidos</label>
		<input type="text" name="apellido" id="apellido">
		<label for="fecha_nac">Fecha de Nacimiento</label>
		<input type="date" name="fecha_nac" id="fecha_nac">
		<label for="correo">Correo</label>
		<input type="text" name="correo" id="correo">
		<input type="submit" name="registrar" value="Registrar">
	</form>
</body>
</html>
<?php
include("conexion.php");


$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];
$rut = $_POST['rut']."-".$_POST['dv'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nac = $_POST['fecha_nac'];
$correo = $_POST['correo'];
if(!empty($usuario)){
	if(!empty($rut)){
		if(validaRut($rut)==true){
	        echo "El rut ".$rut." es v&aacute;lido";
	    }else{
	         echo "El rut ".$rut." no es incorrecto";
	         exit;
	    }
	}
	$sql = "insert into persona(rut,nombres,apellidos,fecha_nac,correo)";
	$sql .= "values ('$rut','$nombre','$apellido','$fecha_nac','$correo')";

	//echo "query 1 :".$sql;

	$conex->query($sql);

	$sql = "insert into usuario(usuario,contrasena,rut)";
	$sql .="values('$usuario','$contrasena','$rut')";

	//echo "<br>query 2 :".$sql;

	$conex->query($sql);

	$sql = "select rut from persona where rut='$rut'";
	echo $sql;
	$consulta = $conex->query($sql);
	if(mysqli_num_rows($consulta)!=0){
		mkdir($usuario);
		$sms = "usuario creado correctamente";
		header("location:login.php?sms = $sms");
	}
}


include("close.php");
