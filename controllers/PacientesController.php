<?php
class PacientesController{

    public static function index(){
         $respuesta = Paciente::index();
         return $respuesta;

     }

     public static function combo_pacientes(){
         $respuesta = Paciente::combo_pacientes();
         return $respuesta;

     }

     public static function add(){
        if (isset($_POST['agregar_paciente'])) {

               $datosController = array(
                  'historia_clinica' => $_POST['historia_clinica'],
                  'donacion_organo' => $_POST['donacion_organo'],
                  'persona_id' => $_POST['persona_id']
            );
            $respuesta = Paciente::add($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:paciente_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

    public static function edit(){
        if (isset($_POST['editar_paciente'])) {
               $datosController = array(
                  'id' => $_POST['id'],
                  'descripcion' => $_POST['descripcion']
            );
            $respuesta = Paciente::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:paciente_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public function delete(){
      if (isset($_POST['eliminar_paciente'])) {               
              $id = $_POST['id'];            
              $respuesta = Paciente::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se elimino correctamente </div>';
                  header('location:paciente_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = Paciente::view($id);
         return $respuesta;

     }

    public static function obtener_paciente($id){
           $respuesta = Paciente::obtener_paciente($id);
           return $respuesta;

     }
     

}
