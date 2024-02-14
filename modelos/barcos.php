<?php

    require_once "conexion.php";


    class ModeloBarco {

         /*=============================================
	    MOSTRAR USUARIOS
	    =============================================*/

	    static public function mdlMostrarBarco($tabla, $item, $valor){
        
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

		static public function mdlMostrarBarcoyPersona($valor){
        	
	    		$stmt = Conexion::conectar()->prepare("SELECT persona.id AS idP, CONCAT(primer_nombre,' ', primer_apellido) AS dueño, nombre_barco AS barco, matricula AS matricula,  eslora eslora, manga AS manga, puntal AS puntal, comppa, uab AS uab, especies AS especies, arte_pesca FROM barco JOIN persona ON barco.id_persona = persona.id WHERE barco.id =".$valor);
            				
	    		$stmt -> execute();
            
	    		return $stmt -> fetch();
            
	    		$stmt -> close();
        
	    		$stmt = null;
        
	    }

		static public function mdlMostrarBarcos($valor){
        
	    	
			$stmt = Conexion::conectar()->prepare("SELECT barco.id AS idB, CONCAT(primer_nombre,' ', primer_apellido) AS dueño, nombre_barco AS barco, eslora eslora, manga AS manga, puntal AS puntal, comppa, uab AS uab, especies AS especies, arte_pesca FROM barco JOIN persona ON barco.id_persona = persona.id WHERE barco.id_persona =".$valor);
			$stmt -> execute();
		
			return $stmt -> fetchALL();
		
	
			$stmt -> close();
	
			$stmt = null;
	
	}

		/*=============================================
		REGISTRO DE USUARIO
		=============================================*/

		static public function mdlIngresarBarco($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_persona, nombre_barco, matricula ,eslora, manga, puntal, comppa, uab, especies, arte_pesca) VALUES (:id_persona, :nombre_barco, :matricula,:eslora, :manga, :puntal, :comppa, :uab, :especies, :arte_pesca)");
			
			$stmt->bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre_barco", $datos["nombre_barco"], PDO::PARAM_STR);
			$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
			$stmt->bindParam(":eslora", $datos["eslora"], PDO::PARAM_STR);
			$stmt->bindParam(":manga", $datos["manga"], PDO::PARAM_STR);
			$stmt->bindParam(":puntal", $datos["puntal"], PDO::PARAM_STR);
			$stmt->bindParam(":comppa", $datos["comppa"], PDO::PARAM_STR);
			$stmt->bindParam(":uab", $datos["uab"], PDO::PARAM_STR);
			$stmt->bindParam(":especies", $datos["especies"], PDO::PARAM_STR);
			$stmt->bindParam(":arte_pesca", $datos["arte_pesca"], PDO::PARAM_STR);
			

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

		static public function mdlEditarBarco($tabla, $datos){



			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_barco = :nombre_barco, matricula = :matricula, eslora = :eslora, manga = :manga, puntal = :puntal, comppa = :comppa, uab = :uab, especies = :especies, arte_pesca = :arte_pesca WHERE id = :id");
			
			$stmt->bindParam(":nombre_barco", $datos["nombre_barco"], PDO::PARAM_STR);
			$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
			$stmt->bindParam(":eslora", $datos["eslora"], PDO::PARAM_STR);
			$stmt->bindParam(":manga", $datos["manga"], PDO::PARAM_STR);
			$stmt->bindParam(":puntal", $datos["puntal"], PDO::PARAM_STR);
			$stmt->bindParam(":comppa", $datos["comppa"], PDO::PARAM_STR);
			$stmt->bindParam(":uab", $datos["uab"], PDO::PARAM_STR);
			$stmt->bindParam(":especies", $datos["especies"], PDO::PARAM_STR);
			$stmt->bindParam(":arte_pesca", $datos["arte_pesca"], PDO::PARAM_STR);
			$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

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

	static public function mdlBorrarBarco($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = ".$datos);
		

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