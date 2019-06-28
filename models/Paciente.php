<?php

    require_once  "models/conexion.php";
   // session_start();
    error_reporting(E_ALL ^ E_NOTICE);

class Paciente{

	 public  static function index(){
        $sql = Conexion::conectar()->prepare("SELECT * FROM pacientes;");

        if ($sql->execute()) {
             return $sql->fetchAll();
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public  static function combo_pacientes(){
        $sql = Conexion::conectar()->prepare("SELECT pa.id , p.nombres as nombres, p.apellido_paterno as apellido_paterno
                                              FROM pacientes AS pa
                                              INNER JOIN personas p ON pa.persona_id=p.id;");

        if ($sql->execute()) {
             return $sql->fetchAll();
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function add($datosModel){
        $sql = Conexion::conectar()->prepare("INSERT INTO pacientes(especialidad,colegiatura,rne,persona_id) 
                                            VALUES(:especialidad,:colegiatura,:rne,:persona_id);");
        $sql->bindParam(":especialidad", $datosModel['especialidad']);
        $sql->bindParam(":colegiatura", $datosModel['colegiatura']);
        $sql->bindParam(":rne", $datosModel['rne']);
        $sql->bindParam(":persona_id", $datosModel['persona_id']);
 
        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function edit($datosModel){
        $sql = Conexion::conectar()->prepare("UPDATE pacientes SET rne=:rne 
                                            WHERE id=:id;");
        $sql->bindParam(':id', $datosModel['id']);
        $sql->bindParam(':rne', $datosModel['rne']);

         if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }

        $sql->close();
    }


    public static function delete($id){
        $sql = Conexion::conectar()->prepare("DELETE FROM pacientes WHERE id = :id;");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }
        $sql->close();
    }


    public static function view($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM pacientes WHERE id=:id LIMIT 1;");
        $sql->bindParam(":id", $id);
      
        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }
    
    public static function obtener_paciente($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM pacientes
                                              WHERE id=:id
                                              LIMIT 1;");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }

}
