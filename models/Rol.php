<?php

    require_once  "models/conexion.php";
   // session_start();
    error_reporting(E_ALL ^ E_NOTICE);

class Rol{

    public $id;
    public $descripcion;

    public static function new_Rol($descripcion){
        return new self(null ,$descripcion);
    }

    public function __construct($id, $descripcion) {
      $this->id = $id;
      $this->descripcion = $descripcion;

    }

    public function getDescripcion()    {
        return $this->descripcion;
    }
    
  
    public function setDescripcion($descripcion)    {        
            $this->descripcion = $descripcion;
        
    }


	 public  static function index(){
        $sql = Conexion::conectar()->prepare("SELECT * FROM roles;");

        if ($sql->execute()) {
             return $sql->fetchAll();
        } else {
            echo "Error";
        }

        $sql->close();
    }

    public function add($datosModel){

        $Rol= new Rol();
        $Rol->descripcion=$datosModel['descripcion'];

        $sql = Conexion::conectar()->prepare("INSERT INTO roles(descripcion) 
        									VALUES(:descripcion)");
        $sql->bindParam(":descripcion", $Rol->descripcion);
 
        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function edit($datosModel){
        $sql = Conexion::conectar()->prepare("UPDATE roles SET descripcion=:descripcion 
        									WHERE id=:id");
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
        $sql = Conexion::conectar()->prepare("DELETE FROM roles WHERE id = :id");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }
        $sql->close();
    }


    public static function view($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM roles WHERE id=:id LIMIT 1;");
        $sql->bindParam(":id", $id);
        $data = $sql->execute();
      
        if ($sql->execute()) {
            $data = $sql->fetch();
            $Rol = new Rol($data['id'] , $data['descripcion']);
            return $Rol;

            // return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }
    
    public static function obtener_rol($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM roles
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
