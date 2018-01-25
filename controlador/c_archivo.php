<?php 
include"../modelo/m_archivo.php";

$archivo =  Archivo::ningunDato();

$tamanoArch = $_FILES['archivo']['size'];
$nombreArch = $_FILES['archivo']['name'];
$tipoArch = $_FILES['archivo']['type'];
$tmpArch = $_FILES['archivo']['tmp_name'];
$fechaSubida = date("d-m-Y");
$usuario = "crais";
$idArch = $archivo->generarId();
$ruta = str_replace("\\","/",dirname(__DIR__)."/archivos/".$usuario."/".$nombreArch);

echo $ruta;
echo "<br>".$fechaSubida;
echo "<br>".$tmpArch;
echo "<br>".$tamanoArch;
echo "<br>".$_FILES['archivo']['size'];

if(file_exists($ruta)){
	echo "el archivo ya existe en el servidor";
	die;
}
/* 83886080 bytes = 10 megas*/
if($tamanoArch <= 83886080){
echo "<br>".$tmpArch;
$archivo2 = new Archivo($idArch,$tmpArch,$nombreArch,$tamanoArch,$fechaSubida,$usuario,$ruta,$tipoArch);

$archivo2->subirArchivo();
$archivo->guardarArchivo($tmpArch,$ruta);
}else{
	echo "<br>excede el tamaño del archivo";
}

?>