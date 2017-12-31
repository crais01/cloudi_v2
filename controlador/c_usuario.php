<?php 
include"../modelo/m_usuarios.php";

$rut = $_POST['rut']."-".$_POST['dv'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fechaNac = $_POST['fecha_nac'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['repcontrasena'];
$correo = $_POST['correo'];
$insertar = "si";

if(empty($rut)){
	echo "campo rut no puede ir vacio";
	$insertar = "no";
}
if(empty($nombre)){
	echo "campo nombre no puede ir vacio";
	$insertar = "no";
}
if(empty($apellido)){
	echo "campo apellido no puede ir vacio";
	$insertar = "no";
}
if(empty($fechaNac)){
	echo "campo fecha de nacimiento no puede ir vacio";
	$insertar = "no";
}
if(empty($usuario)){
	echo "campo usuario no puede ir vacio";
	$insertar = "no";
}
if(empty($contrasena)){
	echo "campo rut no puede ir vacio";
	$insertar = "no";
}elseif ($contrasena != $contrasena2) {
	echo "las contraseñas no coinciden";
	$insertar = "no";
}
if(empty($correo)){
	echo "campo correo no puede ir vacio";
	$insertar = "no";
}

if($insertar != "no"){
	$usuario = new Usuarios($rut,$nombre,$apellido,$fechaNac,$correo,$usuario,$contrasena);
	
	$usuario->insertar();
}else{
	echo "algo paso";
}
?>