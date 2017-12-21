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

$usuario = new Usuarios($rut,$nombre,$apellido,$fechaNac,$usuario,$contrasena,$correo);
$usuario->insertar();
?>