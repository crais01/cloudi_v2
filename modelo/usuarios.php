<?php

include "conexion.php"
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
}
?>