<?php

include "conexion.php";
class Usuarios{
	public $rut; 
	public $nombre; 
	public $apellido;
	public $fecha_nac;
	public $correo;
	public $usuario; 
	public $constrasena;

	function __construct($rut,$nom,$ape,$fecha,$corr,$usu,$cont){

		$this->rut = $rut;
		$this->nombre = $nom;
		$this->apellido = $ape;
		$this->fecha_nac = $fecha;
		$this->correo = $corr;
		$this->usuario = $usu;
		$this->contrasena = $cont;
	}
	static function ningunDatos(){
		return new self("","","","","","","");
	}
	function insertar(){
		$db = new Conexion();

		$existe = $this->existeUsuario($this->rut);

		if($existe == 1){
		 	echo "encontro usuario";
		}else{
		 $sql = "insert into persona(rut,nombres,apellidos,fecha_nac,correo) values('$this->rut','$this->nombre','$this->apellido','$this->fecha_nac','$this->correo')";
		 $db->query($sql) ? $m = "insertado" : $m = "error persona";
		// echo "<br>".$sql."-".$m;
		 $sql = "insert into usuario(usuario,contrasena,rut) values('$this->usuario','$this->contrasena','$this->rut')";
		 $db->query($sql) ? $m = "insertado" : $m = "error usuario";
		 $this->crearCarpeta($this->usuario);

		 echo $m;
		}
	}
	function buscarUsuarios(){
		$db = new Conexion();
		$sql = "select * from usuario";
		$res = $db->query($sql);
		return $res;
	}
	function existeUsuario($r){
		$db = new Conexion();
		$sql = "select * from usuario where rut ='".$r."'";
		$res = $db->query($sql);
		if(mysqli_num_rows($res) > 0){
			return 1;
		}else{
			return 0;
		}

	}
	function crearCarpeta($u){
		$ruta = dirname(__DIR__)."/archivos/".$u;
		//echo $ruta;
		mkdir($ruta);
	}
}
?>