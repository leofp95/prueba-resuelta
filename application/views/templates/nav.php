<?php 
  $this->load->helper('url'); 
  $this->load->library('session');
  
  //$this->session->tipo;
  //Tipos: 0 Admin, 1 Bombero, 2 Municipalidad
?>
<nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
      <div class="container">
        <a class="navbar-brand" tabindex="0" href="/hidrantes-test/home">Sistema de Hidrantes</a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="ion-navicon"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="probootstrap-navbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" tabindex="0" href="<?php echo base_url(); ?>#section-home">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" tabindex="0">Hidrantes</a>
              <ul class="submenu">
                <li><a contenedor="lista_inspecciones" tabindex="0" href="<?php echo base_url(); ?>hidrantes/">Lista de Hidrantes</a></li>
                <li><a contenedor="nueva_inspeccion" tabindex="0" href="<?php echo base_url(); ?>hidrantes/create">Instalación de Hidrante</a></li>
                <li><a contenedor="lista_inspecciones"tabindex="0" href="<?php echo base_url(); ?>hidrantes/search_name">Búsqueda por nombre</a></li>
                <!-- <li><a contenedor="lista_inspecciones" href="<?php echo base_url(); ?>hidrantes/search">Búsqueda por radio</a></li> -->
              </ul>
            </li>
            <?php if($this->session->tipo == 0 || $this->session->tipo == 1){  ?>
            <li class="nav-item"><a class="nav-link" tabindex="0">Inspecciones</a>
              <ul class="submenu">
                <?php if($this->session->tipo == 0){  ?>
                  <li><a contenedor="nueva_inspeccion" tabindex="0" href="<?php echo base_url(); ?>inspecciones/create">Nueva Inspección</a></li>
                <?php } ?>
                <li><a contenedor="lista_inspecciones" tabindex="0" href="<?php echo base_url(); ?>inspecciones/">Listar Inspecciones</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php if($this->session->tipo == 0 || $this->session->tipo == 2){  ?>
            <li class="nav-item"><a class="nav-link" contenedor="lista_solicitudes" tabindex="0">Solicitudes</a>
              <ul class="submenu">
                   <!-- <li><a contenedor="nueva_inspeccion" href="<?php echo base_url(); ?>solicitudes/create">Nueva Solicitud</a></li> -->
                    <li><a contenedor="lista_inspecciones" tabindex="0" href="<?php echo base_url(); ?>solicitudes/">Listar Solicitudes</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->tipo == 0){  ?>
            <li class="nav-item"><a class="nav-link" contenedor="lista_usuarios" tabindex="0">Usuarios</a>
              <ul class="submenu">
                <li><a href="<?php echo base_url(); ?>usuarios/create">Registro de Usuario</a></li>
                <li><a tabindex="0" href="<?php echo base_url(); ?>usuarios/">Listar Usuarios</a></li>
              </ul>
            </li>
            <?php } ?>
            <!--
            <li class="nav-item"><a class="nav-link" href="#section-features">Proyecto</a></li>
            -->
            <?php
              if($this->session->userdata('validated')){ 
                ?>
                <li class="nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0">
              <a class="nav-link" tabindex="0" href="<?php echo base_url(); ?>usuarios/logout">
                <span class="pb_rounded-4 px-4">Cerrar sesión</span>
              </a>
            </li>
                <?php
              }
            ?>
            
          </ul>
          
        </div>
      </div>
    </nav>
