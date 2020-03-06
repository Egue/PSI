<?php
require_once 'modelConnections.php';


class modelApplication{
	private $id;
	private $nombreApplication;
	private $descripcionApplication;
	const TABLA = "applications";




	public function __construct($nombreApplication, $descripcionApplication, $id=null){
		$this->nombreApplication = $nombreApplication;
		$this->descripcionApplication = $descripcionApplication;
		$this->id = $id;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_nombreApplication(){
		return $this->nombreApplication;
	}

	public function set_nombreApplication($nombreApplication){
		$this->nombreApplication = $nombreApplication;
	}

	public function get_descripcionApplication(){
		return $this->descripcionApplication;

	}

	public function set_descripcionApplication($descripcionApplication){
		$this->descripcionApplication = $descripcionApplication;
	}

	public function guardar(){
		$conexion = new  modelConnections();
		if($this->id){
			//Actualizar
			$stmt = $conexion->prepare("UPDATE ".self::TABLA." SET descripcion = :descripcion , nombreApplication = :nombreApplication WHERE idApplication = :idApplication ");
			$stmt->bindParam(":descripcion" , $this->descripcionApplication);
			$stmt->bindParam(":nombreApplication" , $this->nombreApplication);
			$stmt->bindParam(":id" , $id);
			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";
			}
		}else{
			//insertar
			$stmt = $conexion->prepare("INSERT INTO ".self::TABLA."(nombreApplication, descripcion) VALUES(:nombreApplication, :descripcion)");
			$stmt->bindParam(":nombreApplication" , $nombreApplication);
			$stmt->bindParam(":descripcion" , $descripcionApplication);
			if ($stm->execute()) {
				return "success";
			}else{
				return "error";
			}
		}
	}
}



?>
