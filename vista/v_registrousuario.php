<?php
include "header.php";
include dirname(__DIR__)."/modelo/m_usuarios.php";
?>

<form id="formularioRegistro" method="post">
	<fieldset>
		<legend>Datos Personles</legend>
		<label>Rut</label>
		<input type="text" name="rut" id="rut">-
		<input type="text" name="dv" id="dv">
		<label>Nombre</label>
		<input type="text" name="nombre" id="nombre">
		<label>Apellido</label>
		<input type="text" name="apellido" id="apellido">
		<label>Fecha de Nacimiento</label>
		<input type="date" name="fecha_nac" id ="fecha_nac">
	</fieldset>
	<fieldset>
		<legend>Datos de Usuario</legend>
		<label>Usuario</label>
		<input type="text" name="usuario" id="usuario">
		<label>Contraseña</label>
		<input type="password" name="contrasena" id="contrasena">
		<label>Repetir Contraseña</label>
		<input type="password" name="repcontrasena" id="repcontrasena">
		<label>Correo</label>
		<input type="text" name="correo" id="correo">
	</fieldset>
	<input type="button" onclick="realizaProceso();return false;" value="Registro"/>

</form>
<div id="resp" ></div>
<?php
include('footer.php');
// $usuario = Usuarios::ningunDatos();
// $datos = $usuario->buscarUsuarios();

// while($row = $datos->fetch_array()) {
// 	echo $row['rut'];
// }
?>