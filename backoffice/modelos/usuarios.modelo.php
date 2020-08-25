<?php
/**
@grcarvajal grcarvajal@gmail.com **Gildardo Restrepo Carvajal**
28/04/2020 ventas suscripcion
 */
require_once "conexion.php";

class ModeloUsuarios

{

/*=============================================
	Registro de usuarios  
	=============================================*/

	static public function mdlRegistroUsuario($tabla, $datos){
		$foto = "vistas/img/usuarios/default/default.png";
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(perfil, nombre, email, password, suscripcion, verificacion, email_encriptado, foto, patrocinador) VALUES (:perfil, :nombre, :email, :password, :suscripcion, :verificacion, :email_encriptado, :foto, :patrocinador)");

		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":suscripcion", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_STR);
		$stmt->bindParam(":email_encriptado", $datos["email_encriptado"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $foto, PDO::PARAM_STR);
		$stmt->bindParam(":patrocinador", $datos["patrocinador"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();
		$stmt = null;

	}

/*=============================================
	Mostrar Usuarios
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Actualizar usuario
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $id, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id_usuario = :id_usuario");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();

		$stmt = null;
		
	}

/*=============================================
Actualizar usuario completar datos perfil
=============================================*/

static public function mdlActualizarPerfilUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, pais = :pais, telefono_movil = :telefono, ciudad = :ciudad WHERE id_usuario = :idUsuario");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":pais", $datos["pais"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":idUsuario", $datos["id"], PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();
		$stmt = null;		
	}

}