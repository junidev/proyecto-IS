<?php

    require_once  "models/conexion.php";
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);

class Personal{

    public $id;
    public $dni;
    public $nombres;
    public $apellidos;
    public $telefono;
    public $correo;
    public $categoria;


    public static function index(){
        $sql = Conexion::conectar()->prepare("SELECT p.*,tp.descripcion FROM personal AS p INNER JOIN tipo_personal AS tp
                                              ON p.tipopersonal_id = tp.id;");

        if ($sql->execute()) {
            return $sql->fetchAll();
        } else {
            echo "Error";
        }
        
        $sql->close();
    }


    public function add($datosModel){
        $sql = Conexion::conectar()->prepare("INSERT INTO personal(dni,nombres,apellidos,telefono,correo,categoria,facultad,
                                            regimen,cargo,dependencia,tipopersonal_id)
                                            VALUES(:dni,:nombres,:apellidos,:telefono,:correo,:categoria,:facultad,
                                            :regimen,:cargo,:dependencia,:tipopersonal_id)");

        $sql->bindParam(":dni", $datosModel['dni']);
        $sql->bindParam(":nombres", $datosModel['nombres']);
        $sql->bindParam(":apellidos", $datosModel['apellidos']);
        $sql->bindParam(":facultad", $datosModel['facultad']);
        $sql->bindParam(":telefono", $datosModel['telefono']);
        $sql->bindParam(":correo", $datosModel['correo']);
        $sql->bindParam(":categoria", $datosModel['categoria']);
        $sql->bindParam(":regimen", $datosModel['regimen']);
        $sql->bindParam(":cargo", $datosModel['cargo']);
        $sql->bindParam(":dependencia", $datosModel['dependencia']);
        $sql->bindParam(":tipopersonal_id", $datosModel['tipopersonal_id']);

        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function edit($datosModel){
        $sql = Conexion::conectar()->prepare("UPDATE personal SET dni=:dni,nombres=:nombres,apellidos=:apellidos,telefono=:telefono,
                                            correo=:correo,categoria=:categoria,facultad=:facultad,regimen=:regimen,cargo=:cargo,
                                            dependencia=:dependencia,tipopersonal_id=:tipopersonal_id
                                            WHERE id=:id");

        $sql->bindParam(':id', $datosModel['id']);
        $sql->bindParam(":dni", $datosModel['dni']);
        $sql->bindParam(":nombres", $datosModel['nombres']);
        $sql->bindParam(":apellidos", $datosModel['apellidos']);
        $sql->bindParam(":facultad", $datosModel['facultad']);
        $sql->bindParam(":telefono", $datosModel['telefono']);
        $sql->bindParam(":correo", $datosModel['correo']);
        $sql->bindParam(":categoria", $datosModel['categoria']);
        $sql->bindParam(":regimen", $datosModel['regimen']);
        $sql->bindParam(":cargo", $datosModel['cargo']);
        $sql->bindParam(":dependencia", $datosModel['dependencia']);
        $sql->bindParam(":tipopersonal_id", $datosModel['tipopersonal_id']);

         if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }

        $sql->close();
    }


    public static function delete($id){
        $sql = Conexion::conectar()->prepare("DELETE FROM personal WHERE id = :id");
        $sql->bindParam(":id", $id);
          // print_r($sql); die; 

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }
        $sql->close();
    }


    public static function view($id){
        $sql = Conexion::conectar()->prepare("SELECT p.*, tp.descripcion FROM personal AS p INNER JOIN tipo_personal AS tp
                                              ON p.tipopersonal_id = tp.id
                                              WHERE p.id=:id
                                              LIMIT 1;");
        $sql->bindParam(":id", $id);
      
        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }

    public static function obtener_personal($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM personal
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


    public static function dropdown_personal(){
        $sql = Conexion::conectar()->prepare("SELECT id,nombres,apellidos FROM personal");

        if ($sql->execute()) {
            return $sql->fetchAll();
        } else {
            echo "Error";
        }
        
        $sql->close();
    }

    public static function import_docente($datosModel){       
        //print_r($datosModel);  
        $query = 'INSERT INTO personal(dni,apellidos,nombres,facultad,telefono,correo,categoria,
                                     regimen,cargo,tipopersonal_id)
                                     VALUES';
        foreach ($datosModel as $key => $value) {
            $query .= '('.  '"'.$value["A"].'",'.'"'.$value["B"].'",'.'"'.$value["C"].'",'.'"'.$value["D"].'",'.'"'.$value["E"].'",'.'"'.$value["F"].'",'.'"'.$value["G"].'",'.'"'.$value["H"].'",'.'"'.$value["I"].'",'."2".  '),';
        }
        $query_final=substr ($query, 0, strlen($query) - 1).';';

     
        
         
        $sql = Conexion::conectar()->prepare($query_final);
       // echo '<pre>'; 
       // print_r($sql); die;

        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }

    public static function import_administrativo($datosModel){       
        //print_r($datosModel);  
        $query = 'INSERT INTO personal(dni,apellidos,nombres,dependencia,telefono,correo,categoria,
                                     cargo,tipopersonal_id)
                                     VALUES';
        foreach ($datosModel as $key => $value) {
            $query .= '('.  '"'.$value["A"].'",'.'"'.$value["B"].'",'.'"'.$value["C"].'",'.'"'.$value["D"].'",'.'"'.$value["E"].'",'.'"'.$value["F"].'",'.'"'.$value["G"].'",'.'"'.$value["H"].'",'.'1'.  '),';
        }
        $query_final=substr ($query, 0, strlen($query) - 1).';';

           
        $sql = Conexion::conectar()->prepare($query_final);

        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


     public static function dropdown_personal_tipo(){
        $sql = Conexion::conectar()->prepare("SELECT p.id,p.nombres,p.apellidos,t.descripcion, t.id as id_tipo
                                              FROM personal as p 
                                              INNER JOIN tipo_personal as t ON p.tipopersonal_id=t.id");

        if ($sql->execute()) {
            return $sql->fetchAll();
        } else {
            echo "Error";
        }
        
        $sql->close();
    }

}
