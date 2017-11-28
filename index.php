<?php
include("conexion.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>subida de archivos</title>
</head>
<body>
<?php
$rut = $_REQUEST['rut'];
$sql = "select usuario from usuario where rut='$rut'";
$consultausuario = $conex->query($sql);
while($resultado = mysqli_fetch_array($consultausuario)){
	$usuario = $resultado['usuario'];
}
echo "Bienvenido ".$usuario;
?>	
	<form action="file.php" method="POST" enctype="multipart/form-data">
		<label for="archivo">Selecciona un archivo</label>
		<input type="file" name="archivo" id="archivo" required="required" />
		<input type="submit" value="subir archivo" />
		<input type="hidden" name="usuario" value="<?=$usuario?>">
	</form>
</body>
</html>
<?php
$aux = 0; 
if(empty($_REQUEST['aux'])){
	$aux = 0;
}else{
	$aux = $_REQUEST['aux'];
}

if(base64_decode($aux) === "subido"){
	echo "<b>archivo subido correctamente</b><br>";
}

if(base64_decode($aux) === "excedido"){
	echo "<b>el archivo excede el limite de subida</b><br>";
}

if(base64_decode($aux) === "eliminado" ){
	echo "<b>el archivo fue eliminado correctamente</b><br>";
} 

$sql = "select * from archivo";
$res = $conex->query($sql);

if(mysqli_num_rows($res)==0){
	echo "<b>Aun no posee archivos en su repocitorio</b>";
}else{
?>

<table border="1">
	<tr>
		<td>N°</td>
		<td>ID DOC</td>
		<td>NOMBRE</td>
		<td>PESO</td>
		<td>TIPO</td>
		<td>FECHA SUBIDA</td>
		<td>ALMACENAMIENTO</td>
	</tr>

<?php
	$i =1;
	while($consulta = mysqli_fetch_array($res)){
		
		echo "<tr>";
		echo "<td>".$i++."</td>";
		echo "<td>".$consulta['id']."</td>";
		echo "<td>".$consulta['nombre']."</td>";
		echo "<td>".$consulta['peso']."</td>";
		echo "<td>".$consulta['tipo']."</td>";
		echo "<td>".$consulta['fecha_subida']."</td>";
		echo "<td>".$consulta['ruta']."</td>";
		echo "<td><a href='eliminar.php?id=".$consulta['id']."&nombre=".$consulta['nombre']."'>eliminar</a></td>";
		echo "<td><a href=".$consulta['ruta']." target='_new'>descargar</a></td>";
		echo "</tr>";
	}
}


?>
</table>
<?php
include("close.php");
?>

