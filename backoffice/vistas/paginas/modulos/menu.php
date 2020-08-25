<aside class="main-sidebar sidebar-dark-primary elevation-4 negro">
  <!-- Brand Logo -->
  <a href="inicio" class="brand-link">
  <img src="vistas/img/plantilla/logo3.png" alt="Modelo de Negocio Logo">
  <span class="text-blancoLogo">Modelo</span> <span class="text-naranjaLogo">de</span> <span class="text-amarilloLogo">Negocio</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo $usuario["foto"]; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="perfil" class="d-block"><?php echo $usuario["nombre"]; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="inicio" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>

<?php  if($usuario["perfil"] == "admin"): ?>

        <li class="nav-item">
          <a href="usuarios" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuarios</p>
          </a>
        </li>

<?php  endif ?>

        <li class="nav-item">
          <a href="proyectos" class="nav-link">
            <i class="nav-icon fas fa-paper-plane"></i>
            <p>Proyectos</p>
          </a>
        </li>  

        <li class="nav-item">
          <a href="#modalCrearModelo" class="nav-link" data-toggle="modal" data-dismiss="modal">
            <i class="nav-icon fas fa-plus-circle"></i>
            <p>Crear proyecto</p>
          </a>
        </li>     
             
        <li class="nav-item">
          <a href="herramientas" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Herramientas</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="perfil" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Mi perfil</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="salir" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Cerrar sesión</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!--=====================================
VENTANA MODAL VREAR MODELO DE NEGOCIO
======================================-->
<div class="modal" id="modalCrearModelo"> 
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
            <h4 class="modal-title">CREAR MODELO DE NEGOCIO</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
       <div class="modal-body">       
        <form method="post">
          <p class="text-muted">Escriba el nombre del proyecto para generar el modelo de negocio.</p>
          <div class="input-group mb-3">            
            <div class="input-group-prepend">
                <span class="input-group-text">                 
                  <i class="fa fa-th-large"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre del Modelo de Negocio" name="nombreProyecto" required>
               <input type="hidden" value="<?php echo $usuario["id_usuario"]; ?>" name="idU">
          </div>
           <p class="text-muted">Para quién?, desarrollara este Modelo de Negocio.</p>
          <div class="input-group mb-3">            
            <div class="input-group-prepend">
                <span class="input-group-text">                 
                  <i class="fa fa-university"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Para quién?" name="paraQuien" required>
          </div>
          <p class="text-muted">Elija un sector económico.</p>
           <div class="form-group mb-3">                            
                  <select class="form-control" placeholder="Sector Económico" name="sectorEconomico" required> 
                    <option></option>              
                    <option>Agropecuario</option>
                    <option>Servicios</option>
                    <option>Industrial</option>
                    <option>Transporte</option>
                    <option>Comercio</option>
                    <option>Financiero</option>
                    <option>Construcción</option>
                    <option>Energético</option>
                    <option>Comunicaciones</option>
                    <option>Salud</option>
                    <option>Educación</option>
                    <option>Minería</option>
                    <option>Solidario</option>
                    <option>Tecnologías</option>
                    <option>Artesanías</option>
                    <option>Otro</option>
                  </select>
            </div>
          <input type="submit" class="btn btn-success btn-block" value="CREAR MODELO DE NEGOCIO">
          <?php
            $crearModelo = new ControladorMDN();
            $crearModelo -> ctrCrearMDN();
          ?>
        </form>
       </div>
      </div>
    </div>
</div>
