<?php
/**
@grcarvajal grcarvajal@gmail.com **Gildardo Restrepo Carvajal**
06/05/2020 gestionar modelos de negocio
 */
require_once "conexion.php";

class ModeloMDN

{

/*=============================================
	Registro de modelos de negocio
=============================================*/

static public function mdlRegistroMDN($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idUsuario, nombreProyecto, sectorEconomico, paraQuien, version) VALUES (:idUsuario, :nombreProyecto, :sectorEconomico, :paraQuien, :version)");

		$stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
		$stmt->bindParam(":nombreProyecto", $datos["nombreProyecto"], PDO::PARAM_STR);
		$stmt->bindParam(":paraQuien", $datos["paraQuien"], PDO::PARAM_STR);
		$stmt->bindParam(":sectorEconomico", $datos["sectorEconomico"], PDO::PARAM_STR);
		$stmt->bindParam(":version", $datos["version"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();
		$stmt = null;

	}

/*=========================================================
	Crear Nota en una de las 9 tablas del Modelo de Negocio
===========================================================*/

static public function mdlCrearNota($nota, $idU, $idProyecto, $color, $tabla){

$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idP, idUsu, nota, color) VALUES (:idProyecto, :idU, :nota, :color)");
		$stmt->bindParam(":idProyecto", $idProyecto, PDO::PARAM_INT);
		$stmt->bindParam(":idU", $idU, PDO::PARAM_INT);
		$stmt->bindParam(":nota", $nota, PDO::PARAM_STR);
		$stmt->bindParam(":color", $color, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt = null;
	}

/*=============================================
	Mostrar modelos de negocio
=============================================*/
static public function mdlMostrarMDN($tabla, $item, $valor){
		if($item != null && $valor != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fechaRegistro DESC");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt-> close();
		$stmt = null;
	}

/*===========================================================
	Mostrar modelos de negocio al crearlo para ir a dashboard
============================================================*/
static public function mdlMostrarDboarMDN($tabla, $item, $valor){	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idProyecto DESC LIMIT 1");
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		
		$stmt-> close();
		$stmt = null;
	}


/*=============================================
	Ver  modelos de negocio por ID
=============================================*/
	static public function mdlVerMDN($tabla, $item, $valor){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);			
			$stmt -> execute();
			return $stmt -> fetch();	
		$stmt-> close();
		$stmt = null;
	}

/*=============================================
Ver notas de tablas del modelo de negocio
=============================================*/
static public function mdlVerNotasMDN($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idP = :id ORDER BY fechaRegistro DESC");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
			return $stmt -> fetchAll();
		
		$stmt-> close();
		$stmt = null;		
	}

/*=============================================
Eliminar notas de tablas del modelo de negocio
=============================================*/
static public function mdlEliminarNotaMDN($tabla, $id, $item)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();
		$stmt = null;				
}

/*=============================================
Editar nota del modelos de negocio
=============================================*/
static public function mdlEditarNotaMDN($tabla, $color, $nota, $nombreCampoID, $valorID){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nota = :nota, color = :color WHERE $nombreCampoID = :valorID");

		$stmt -> bindParam(":nota", $nota, PDO::PARAM_STR);
		$stmt -> bindParam(":color", $color, PDO::PARAM_STR);
		$stmt -> bindParam(":valorID", $valorID, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();
		$stmt = null;		
	}
/*=============================================
Editar Version del modelos de negocio
=============================================*/
static public function mdlEditarVersionMDN($tabla, $idP){ 

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET version = version + 0.1 WHERE idProyecto = :idP");

		$stmt -> bindParam(":idP", $idP, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();
		$stmt = null;		
	}
	
/*=============================================
Eliminar modelo de negocio
=============================================*/
static public function mdlEliminarMDN($tabla, $id)
	{
		///tabla 1
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 1socios WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem1"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 1socios WHERE idItem1 = $idNota");
			$stmt -> execute();
			}
		///tabla 2
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 2actividades WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem2"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 2actividades WHERE idItem2 = $idNota");
			$stmt -> execute();
			}
		///tabla 3
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 3recursos WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem3"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 3recursos WHERE idItem3 = $idNota");
			$stmt -> execute();
			}
		///tabla 4
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 4propuestadevalor WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem4"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 4propuestadevalor WHERE idItem4 = $idNota");
			$stmt -> execute();
			}
		///tabla 5
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 5relacionconlosclientes WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem5"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 5relacionconlosclientes WHERE idItem5 = $idNota");
			$stmt -> execute();
			}
		///tabla 6
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 6canalesdedistribucion WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem6"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 6canalesdedistribucion WHERE idItem6 = $idNota");
			$stmt -> execute();
			}
		///tabla 7
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 7clientes WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem7"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 7clientes WHERE idItem7 = $idNota");
			$stmt -> execute();
			}
		///tabla 8
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 8estructuradecostos WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem8"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 8estructuradecostos WHERE idItem8 = $idNota");
			$stmt -> execute();
			}

		///tabla 9
		$stmt = Conexion::conectar()->prepare("SELECT * FROM 9fuentesdeingresos WHERE idP = $id");
		$stmt -> execute();
		$notas = $stmt -> fetchAll();
		foreach ($notas as $key => $value){
			$idNota = $value["idItem9"];
			$stmt = Conexion::conectar()->prepare("DELETE FROM 9fuentesdeingresos WHERE idItem9 = $idNota");
			$stmt -> execute();
			}

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProyecto = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();
		$stmt = null;				
	}
/*=============================================
Actualizar descargas en el modelo de negocio +1
=============================================*/
static public function mdlDesacargasMDN($tabla, $idP)
	{ 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descargas = descargas + 1 WHERE idProyecto = :idP");
		$stmt -> bindParam(":idP", $idP, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();
		$stmt = null;		
	}

/*=============================================
Actualizar el modelo de negocio +1
=============================================*/
static public function mdlEditarMDN($tabla, $nombrePro, $idPEditar, $paraQuien, $sectorEconomico)
	{ 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreProyecto = :nombrePro, sectorEconomico = :sectorEconomico, paraQuien = :paraQuien WHERE idProyecto = :idP");
		$stmt -> bindParam(":idP", $idPEditar, PDO::PARAM_INT);
		$stmt -> bindParam(":nombrePro", $nombrePro, PDO::PARAM_STR);
		$stmt -> bindParam(":paraQuien", $paraQuien, PDO::PARAM_STR);
		$stmt -> bindParam(":sectorEconomico", $sectorEconomico, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();
		$stmt = null;		
	}
	
}