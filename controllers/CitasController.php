<?php
class CitasController{

    public static function index(){
         $respuesta = Cita::index();
         return $respuesta;

     }

     public static function add(){
        if (isset($_POST['agregar_cita'])) {

               $datosController = array(
                  'paciente_id' => $_POST['paciente_id'],
                  'medico_id' => $_POST['medico_id'],
                  'fecha' => $_POST['fecha'],
                  'hora' => $_POST['hora'],
                  'situacion' => $_POST['situacion'],
                  'medio' => $_POST['medio'],
                  'observaciones' => $_POST['observaciones']
            );
            $respuesta = Cita::add($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:cita_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

    public static function edit(){
        if (isset($_POST['editar_cita'])) {
               $datosController = array(
                'id' => $_POST['id'],
                  
            );
            $respuesta = Cita::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:cita_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public function delete(){
      if (isset($_POST['eliminar_cita'])) {               
              $id = $_POST['id'];            
              $respuesta = Cita::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se elimino correctamente </div>';
                  header('location:cita_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = Cita::view($id);
         return $respuesta;

     }

    public static function obtener_cita($id){
           $respuesta = Cita::obtener_cita($id);
           return $respuesta;

     }
     

}
