<?php
date_default_timezone_set('America/Lima');
#EL INDEX: En él mostraremos la salida de las vistas al usuario y también a traves de él enviaremos las distintas acciones que el usuario envíe al controlador.

#require() establece que el código del archivo invocado es requerido, es decir, obligatorio para el funcionamiento del programa. Por ello, si el archivo especificado en la función require() no se encuentra saltará un error “PHP Fatal error” y el programa PHP se detendrá.

#La versión require_once() funcionan de la misma forma que sus respectivo, salvo que, al utilizar la versión _once, se impide la carga de un mismo archivo más de una vez.

#Si requerimos el mismo código más de una vez corremos el riesgo de redeclaraciones de variables, funciones o clases.

// controlladores
require_once "controllers/EnlacesController.php";
require_once "controllers/UsuariosController.php";
require_once "controllers/RolesController.php";
require_once "controllers/PersonalesController.php";
require_once "controllers/TipoPersonalesController.php";
require_once "controllers/CursosController.php";

require_once "controllers/PersonasController.php";
require_once "controllers/PacientesController.php";
require_once "controllers/MedicosController.php";
require_once "controllers/CitasController.php";

// modelos
require_once "models/Enlace.php";
require_once "models/Usuario.php";
require_once "models/Rol.php";
require_once "models/Personal.php";
require_once "models/TipoPersonal.php";
require_once "models/Curso.php";

require_once "models/Persona.php";
require_once "models/Paciente.php";
require_once "models/Medico.php";
require_once "models/Cita.php";

$mvc = new EnlacesController();
$mvc->plantilla();
