<?php

    require_once  "models/conexion.php";
   // session_start();
    error_reporting(E_ALL ^ E_NOTICE);

class Curso{

	 public  static function index(){
        $sql = Conexion::conectar()->prepare("SELECT * FROM cursos;");

        if ($sql->execute()) {
             return $sql->fetchAll();
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function add($datosModel){
        $sql = Conexion::conectar()->prepare("INSERT INTO cursos(descripcion) 
                                            VALUES(:descripcion);");
        $sql->bindParam(":descripcion", $datosModel['descripcion']);
 
        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function edit($datosModel){
        $sql = Conexion::conectar()->prepare("UPDATE cursos SET descripcion=:descripcion 
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
        $sql = Conexion::conectar()->prepare("DELETE FROM cursos WHERE id = :id;");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }
        $sql->close();
    }


    public static function view($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM cursos WHERE id=:id LIMIT 1;");
        $sql->bindParam(":id", $id);
      
        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }
    
    public static function obtener_curso($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM cursos
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
