<?php
include "conexion.php";
class Archivo{
	public $idArchivo;
	public $tmpArchivo;
	public $nombreArchivo;
	public $tamanoArchivo;
	public $fechaSubida;
	public $usuario;
	public $rutaArchivo;
	public $tipoArchivo;

	function __construct($idDoc,$tmpDoc,$nomAr,$tamAr,$fecha,$usu,$ruta,$tipo){

		$this->idArchivo = $idDoc;
		$this->tmpArchivo = $tmpDoc;
		$this->nombreArchivo = $nomAr;
		$this->tamanoArchivo = $tamAr;
		$this->fechaSubida = $fecha;
		$this->usuario = $usu;
		$this->rutaArchivo = $ruta;
		$this->tipoArchivo = $tipo;
	}

	static function ningunDato(){
		return new self("","","","","","","","");
	}

	function subirArchivo(){
		echo "<br> funcion subir archivo";
		echo "<br> fecha : " . $this->fechaSubida;
	die;
		$db = new Conexion();
		$sql = "insert into archivo(id_doc,nombre,tipo,peso,fecha_subida,ruta)values('$this->idArchivo','$this->nombreArchivo','$this->tamanoArchivo','$this->fechaSubida','$this->usuario','$this->rutaArchivo')";
		$db->query($sql) ? $m = "archivo subido" : $m = "problema subir archivo";
		echo $m;
		$sql = "insert into usuario_archivo(usuario,id_doc)values('$this->usuario','$this->idArchivo')";
		$db->query($sql) ? $m="<br>insertado" : $m = "<br>no insertado";
		echo $m;

	}

	function guardarArchivo($ar,$rt){
		echo "<br>ar : " . $ar;
		echo "<br>rt: " . $rt;
		move_uploaded_file($ar, $rt);
	}

	function formatBytes($au, $precision = 2)
	{
    	$base = log($au, 1024);
    	$suffixes = array('B', 'K', 'M', 'G', 'T');   

    	return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
	}

	function generarId() {
    $chr = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ|!#&?';
    $id="";
    $chrLng = strlen($chr);
    for ($i = 0; $i < 50; $i++) {
        $id .= $chr[rand(0, $chrLng - 1)];
    }
    return $id;
}
}
?>