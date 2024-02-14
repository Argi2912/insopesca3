<?php

    require_once "conexion.php";


    class ModeloPermisos {

         /*=============================================
	    MOSTRAR USUARIOS
	    =============================================*/

	    static public function mdlMostrarPermiso($tabla, $item, $valor){
        
	    	if($item != null){

				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				
	    		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				
	    		$stmt -> execute();
            
	    		return $stmt -> fetch();
            
	    	}else{
            
	    		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            
	    		$stmt -> execute();
            
	    		return $stmt -> fetchAll();
            
	    	}
        
        
	    	$stmt -> close();
        
	    	$stmt = null;
        
	    }

		/*=============================================
		REGISTRO DE USUARIO
		=============================================*/

		static public function mdlIngresarPermiso($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nacionalidad, ci, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, sexo, estado_civil, telefono, estado, municipio, parroquia, correo) VALUES (:nacionalidad, :ci, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :fecha_nacimiento, :sexo, :estado_civil, :telefono, :estado, :municipio, :parroquia, :correo)");
			
			$stmt->bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
			$stmt->bindParam(":ci", $datos["ci"], PDO::PARAM_INT);
			$stmt->bindParam(":primer_nombre", $datos["primer_nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":segundo_nombre", $datos["segundo_nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_INT);
			$stmt->bindParam(":estado_civil", $datos["estado_civil"], PDO::PARAM_INT);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
			$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
			$stmt->bindParam(":municipio", $datos["municipio"], PDO::PARAM_STR);
			$stmt->bindParam(":parroquia", $datos["parroquia"], PDO::PARAM_STR);
			$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";	

			}else{

				return "error";
			
			}

			$stmt->close();

			$stmt = null;

		}

		/*=============================================
		EDITAR  USUARIO
		=============================================*/

		static public function mdlEditarPersona($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nacionalidad = :nacionalidad , ci = :ci , primer_nombre = :primer_nombre , segundo_nombre = :segundo_nombre , primer_apellido = :primer_apellido , segundo_apellido = :segundo_apellido , fecha_nacimiento = :fecha_nacimiento , sexo = :sexo , estado_civil = :estado_civil , telefono = :telefono , estado = :estado , municipio = :municipio , parroquia = :parroquia , correo = :correo WHERE id = :id");
			
			$stmt->bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
			$stmt->bindParam(":ci", $datos["ci"], PDO::PARAM_INT);
			$stmt->bindParam(":primer_nombre", $datos["primer_nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":segundo_nombre", $datos["segundo_nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_INT);
			$stmt->bindParam(":estado_civil", $datos["estado_civil"], PDO::PARAM_INT);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
			$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
			$stmt->bindParam(":municipio", $datos["municipio"], PDO::PARAM_STR);
			$stmt->bindParam(":parroquia", $datos["parroquia"], PDO::PARAM_STR);
			$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
			$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);


			if($stmt->execute()){

				return "ok";	

			}else{

				return "error";
			
			}

			$stmt->close();

			$stmt = null;

		}

		/*=============================================
		BORRAR USUARIO
		=============================================*/

	static public function mdlBorrarPersona($tabla, $datos){

		

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

    }

?>