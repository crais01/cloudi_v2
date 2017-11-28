<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Registro Usuario</title>
</head>
<body>
	<form action="../controlador/c_usuario.php" method="POST">
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
			<input type="password" name="repcontrsena" id="repcontrsena">
			<label>Correo</label>
			<input type="text" name="correo" id="correo">
		</fieldset>
		<input type="submit" name="enviar">
	</form>
</body>
</html>