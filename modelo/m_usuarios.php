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
		$sql = "insert into persona(rut,nombre,apellidos,fecha_nac,correo) values('$this->rut','$this->nombre','$this->apellido','$this->fecha_nac','$this->correo')";
		$db->query($sql);
		$sql = "insert into usuario(usuario,contrasena,rut) values('$this->usuario','$this->contrasena','$this->rut')";
		$db->query($sql) ? $m = "insertado" : $m = "error";

		echo $m;
	}
	function buscarUsuarios(){
		$db = new Conexion();
		$sql = "select * from usuario";
		$resultado = $db->query($sql);
		return $resultado;
	}
}
?>