<!--sidebar-menu-->
<div id="sidebar"><a href="dashboard" class="visible-phone"><i class="icon icon-home"></i> ADMINISTRACION</a>
  <ul>
    <li class="dashboard"><a href="dashboard"><i class="icon icon-home"></i> <span>Administracion</span></a> </li>

    <?php if($_SESSION['rol']==1) { ?>
    <li class="submenu usuarios"> <a href="#"><i class="icon icon-th-list"></i> <span>Usuarios</span></a>
      <ul>
        <li><a href="agregar_usuario">Agregar</a></li>
        <li><a href="listar_usuarios">Ver Todos</a></li>
        <li><a href="cambiar_clave">Cambiar Clave</a></li>
      </ul>
    </li>
    <li class="submenu roles"> <a href="#"><i class="icon icon-th-list"></i> <span>Roles</span></a>
      <ul>
        <li><a href="agregar_rol">Agregar</a></li>
        <li><a href="listar_roles">Ver Todos</a></li>
      </ul>
    </li>
    <li class="submenu personas"> <a href="#"><i class="icon icon-th-list"></i> <span>Personas</span></a>
      <ul>
        <li><a href="agregar_persona">Agregar</a></li>
        <li><a href="listar_personas">Ver Todos</a></li>
      </ul>
    </li>
    <li class="submenu medicos"> <a href="#"><i class="icon icon-th-list"></i> <span>Medicos</span></a>
      <ul>
        <li><a href="agregar_medico">Agregar</a></li>
        <li><a href="listar_medicos">Ver Todos</a></li>
      </ul>
    </li>
    <li class="submenu pacientes"> <a href="#"><i class="icon icon-th-list"></i> <span>Pacientes</span></a>
      <ul>
        <li><a href="agregar_paciente">Agregar</a></li>
        <li><a href="listar_pacientes">Ver Todos</a></li>
      </ul>
    </li>
    <li class="submenu citas"> <a href="#"><i class="icon icon-th-list"></i> <span>Citas</span></a>
      <ul>
        <li><a href="agregar_cita">Agregar</a></li>
        <li><a href="listar_citas">Ver Todos</a></li>
      </ul>
    </li>
    <?php } ?>
   
 

    <!--<li class="submenu personales"> <a href="#"><i class="icon icon-th-list"></i> <span>Personal</span></a>
      <ul>
        <li><a href="agregar_personal">Agregar</a></li>
        <li><a href="listar_personales">Ver Todos</a></li>
        <li><a href="importar_docente">Importar Docente</a></li>
        <li><a href="importar_administrativo">Importar Administrativos</a></li>
      </ul>
    </li>
    <?php if($_SESSION['rol']==1) { ?>
    <li class="submenu tipopersonales"> <a href="#"><i class="icon icon-th-list"></i> <span>Tipo Personal</span></a>
      <ul>
        <li><a href="agregar_tipopersonal">Agregar</a></li>
        <li><a href="listar_tipopersonales">Ver Todos</a></li>
      </ul>
    </li>-->

    <?php } ?>   
     <?php if($_SESSION['rol']==1) { ?> 
 

   <!-- <li class="submenu cursos"> <a href="#"><i class="icon icon-th-list"></i> <span>Cursos</span></a>
      <ul>
        <li><a href="agregar_curso">Agregar</a></li>
        <li><a href="listar_cursos">Ver todos</a></li>
      </ul>
    </li>-->
     <?php } ?>
    
  </ul>
</div>
<!--sidebar-menu-->
