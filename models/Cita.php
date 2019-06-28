<?php

    require_once  "models/conexion.php";
   // session_start();
    error_reporting(E_ALL ^ E_NOTICE);

class Cita{

	 public  static function index(){
        $sql = Conexion::conectar()->prepare("SELECT * FROM citas;");

        if ($sql->execute()) {
             return $sql->fetchAll();
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function add($datosModel){
        $sql = Conexion::conectar()->prepare("INSERT INTO citas(paciente_id,medico_id,fecha,hora,medio, situacion,observaciones) 
                                            VALUES(:paciente_id,:medico_id,:fecha,:hora,:medio, :situacion,:observaciones);");
        $sql->bindParam(":paciente_id", $datosModel['paciente_id']);
        $sql->bindParam(":medico_id", $datosModel['medico_id']);
        $sql->bindParam(":fecha", $datosModel['fecha']); 
        $sql->bindParam(":hora", $datosModel['hora']);
        $sql->bindParam(":medio", $datosModel['medio']);
        $sql->bindParam(":situacion", $datosModel['situacion']); 
        $sql->bindParam(":observaciones", $datosModel['observaciones']); 

        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function edit($datosModel){
        $sql = Conexion::conectar()->prepare("UPDATE citas SET descripcion=:descripcion 
                                            WHERE id=:id;");
        $sql->bindParam(':id', $datosModel['id']);
        $sql->bindParam(':descripcion', $datosModel['descripcion']);

         if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }

        $sql->close();
    }


    public static function delete($id){
        $sql = Conexion::conectar()->prepare("DELETE FROM citas WHERE id = :id;");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }
        $sql->close();
    }


    public static function view($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM citas WHERE id=:id LIMIT 1;");
        $sql->bindParam(":id", $id);
      
        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }
    
    public static function obtener_cita($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM citas
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
