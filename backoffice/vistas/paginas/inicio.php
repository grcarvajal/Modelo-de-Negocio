<div class="content-wrapper">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
   
   <?php 
      if($usuario["perfil"] == "admin")
        {
         include "modulos/inicio/infoAdmin.php";
           }

      include "modulos/inicio/recuadros-superiores.php"; 

    ?>   

    </div>

  </section>
  <!-- /.content -->

</div>