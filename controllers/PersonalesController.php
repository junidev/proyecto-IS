<?php

class PersonalesController{

     public static function index(){
         $respuesta = Personal::index();
         return $respuesta;

     }

     public static function add(){
        if (isset($_POST['agregar_personal'])) {

               $datosController = array(
                  'dni' => $_POST['dni'],
                  'nombres' => $_POST['nombres'],
                  'apellidos' => $_POST['apellidos'],
                  'telefono' => $_POST['telefono'],
                  'correo' => $_POST['correo'],
                  'categoria' => $_POST['categoria'],
                  'facultad' => $_POST['facultad'],
                  'regimen' => $_POST['regimen'],
                  'cargo' => $_POST['cargo'],
                  'dependencia' => $_POST['dependencia'],
                  'tipopersonal_id' => $_POST['tipopersonal_id'],
            );
            $respuesta = Personal::add($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:personal_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

    public static function edit(){
        if (isset($_POST['editar_personal'])) {
               $datosController = array(
                  'id' => $_POST['id'],
                  'dni' => $_POST['dni'],
                  'nombres' => $_POST['nombres'],
                  'apellidos' => $_POST['apellidos'],
                  'telefono' => $_POST['telefono'],
                  'correo' => $_POST['correo'],
                  'categoria' => $_POST['categoria'],
                  'facultad' => $_POST['facultad'],
                  'regimen' => $_POST['regimen'],
                  'cargo' => $_POST['cargo'],
                  'dependencia' => $_POST['dependencia'],
                  'tipopersonal_id' => $_POST['tipopersonal_id'],
            );
            $respuesta = Personal::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:personal_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public static function delete(){
      if (isset($_POST['eliminar_personal'])) {               
              $id = $_POST['id'];            

              $respuesta = Personal::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se eliminó correctamente </div>';
                  header('location:personal_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = Personal::view($id);
         return $respuesta;

     }

    public static function obtener_personal($id){
           $respuesta = Personal::obtener_personal($id);
           return $respuesta;

     }

    public static function dropdown_personal(){
         $respuesta = Personal::dropdown_personal();
         return $respuesta;

    }
    public static function dropdown_personal_tipo(){
         $respuesta = Personal::dropdown_personal_tipo();
         return $respuesta;

    }


    
    public static function import_docente(){
        if (isset($_POST['importar_docente'])) {    
              //echo '<pre>';
              // si eske se subio el fichero entrsmos
              if($_FILES['personal']['tmp_name']!=''){
                  include '/../plugin/PHPExcel/IOFactory.php';
                  //leemos
                  $inputFileName=$_FILES['personal']['tmp_name'];
                  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                  $lista_docente = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                  //eliminamos las cabecera
                  array_shift($lista_docente);                 

                   $respuesta = Personal::import_docente($lista_docente);
                    if ($respuesta == 'success') {              
                        $_SESSION["message"]='<div class="alert alert-success alert-block">
                            Se importó correctamente </div>';
                        header('location:personal_ok');
                     
                    } else {
                        echo '<div class="alert alert-danger alert-block">Ocurriío un error!!!! </div>'; 
                    }

            }else{
              echo '<div class="alert alert-danger alert-block">Adjunta el archivo </div>'; 
            }
        }

     }

     public static function import_administrativo(){
        if (isset($_POST['importar_administrativo'])) {    
              //echo '<pre>';
              // si eske se subio el fichero entrsmos
              if($_FILES['personal']['tmp_name']!=''){
                  include '/../plugin/PHPExcel/IOFactory.php';
                  //leemos
                  $inputFileName=$_FILES['personal']['tmp_name'];
                  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                  $lista_administrativo = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                  //eliminamos las cabecera
                  array_shift($lista_administrativo);                 

                   $respuesta = Personal::import_administrativo($lista_administrativo);
                    if ($respuesta == 'success') {              
                        $_SESSION["message"]='<div class="alert alert-success alert-block">
                            Se importó correctamente </div>';
                        header('location:personal_ok');
                     
                    } else {
                        echo '<div class="alert alert-danger alert-block">Ocurriío un error!!!! </div>'; 
                    }

            }else{
              echo '<div class="alert alert-danger alert-block">Adjunta el archivo pe pendejo!!!! </div>'; 
            }
        }

     }


}
