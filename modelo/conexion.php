<?php
 class Conexion extends mysqli{
 	private $con;
 	private $servidor = "localhost";
 	private $usuario = "root";
 	private $contrasena = "10251";
 	private $base = "cloudi";

 	public function __construct(){
 		parent::__construct($this->servidor,$this->usuario,$this->contrasena,$this->base);
 		$this->connect_errno ? die("error en la conexion ".mysqli_connect_errno()) : $m = "conectado";
 		//echo $m;
	 }
}
?>