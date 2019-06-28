<?php

class TipoPersonalesController{

    public static function index(){
         $respuesta = TipoPersonal::index();
         return $respuesta;

     }

     public static function add(){
        if (isset($_POST['agregar_tipopersonal'])) {

               $datosController = array(
                  'descripcion' => $_POST['descripcion'],
            );
            $respuesta = TipoPersonal::add($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:tipopersonal_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

    public static function edit(){
        if (isset($_POST['editar_tipopersonal'])) {
               $datosController = array(
                  'id' => $_POST['id'],
                  'descripcion' => $_POST['descripcion']
            );
            $respuesta = TipoPersonal::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:tipopersonal_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public function delete(){
      if (isset($_POST['eliminar_tipopersonal'])) {               
              $id = $_POST['id'];            
              $respuesta = TipoPersonal::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se elimino correctamente </div>';
                  header('location:tipopersonal_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = TipoPersonal::view($id);
         return $respuesta;

     }

    public static function obtener_tipopersonal($id){
           $respuesta = TipoPersonal::obtener_tipopersonal($id);
           return $respuesta;

     }



}
