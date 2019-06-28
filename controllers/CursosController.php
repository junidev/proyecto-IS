<?php
class CursosController{

    public static function index(){
         $respuesta = Curso::index();
         return $respuesta;

     }

     public static function add(){
        if (isset($_POST['agregar_curso'])) {

               $datosController = array(
                  'descripcion' => $_POST['descripcion'],
            );
            $respuesta = Curso::add($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:curso_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

    public static function edit(){
        if (isset($_POST['editar_curso'])) {
               $datosController = array(
                  'id' => $_POST['id'],
                  'descripcion' => $_POST['descripcion']
            );
            $respuesta = Curso::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:curso_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public function delete(){
      if (isset($_POST['eliminar_curso'])) {               
              $id = $_POST['id'];            
              $respuesta = Curso::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se elimino correctamente </div>';
                  header('location:curso_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = Curso::view($id);
         return $respuesta;

     }

    public static function obtener_curso($id){
           $respuesta = Curso::obtener_curso($id);
           return $respuesta;

     }
     

}
