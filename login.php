<!DOCTYPE html>
<html>
<head>
	<title>login Cloudi</title>
</head>
<body>
	<form action="login.php" method="POST">
		<input type="text" name="usuario" id="usuario" >
		<input type="password" name="contrasena" id="contrasena" >
		<input type="submit" name="entrar" value="Entrar">
		<input type="submit" name="btn2" value="Registro">
	</form>

</body>
</html>
<?php
if(isset($_POST['btn2'])){
	header("location:registro.php");
}

if(isset($_POST['entrar'])){
	include("conexion.php");
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$sql = "select usuario,contrasena,u.rut from usuario u inner join persona p on p.rut = u.rut where usuario ='$usuario'";
		echo $sql;
		
		$consulta = $conex->query($sql);
		if(mysqli_num_rows($consulta)==0){
			echo "el usuario no existe";
		}else{
			while($resultado = mysqli_fetch_array($consulta)){
				echo $resultado['usuario'];
				echo $resultado['contrasena'];
				$rut = $resultado['rut'];
				if($contrasena == $resultado['contrasena']){
					header("location:index.php?rut=$rut");
				}
			}
		}
	include("close.php");
}

if(!empty($_REQUEST['sms'])){
	echo $_REQUEST['sms'];
}
?>