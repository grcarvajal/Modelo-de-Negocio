<?php 
$item = "idUsuario";
$valor = $usuario["id_usuario"]; 

$pMDN = ControladorMDN::ctrMostrarMDN($item, $valor);
$cont = 0;
 foreach ($pMDN as $key => $value): 
                $cont = $cont + 1;
              endforeach; 
?>
<div class="content-wrapper" style="min-height: 1058.31px;"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">  
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          Proyectos en desarrollo
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Proyectos</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="row">
<!-- .card proyectos del usuario 12 col-->
 <div class="col-md-12">
     <!-- Box Comment -->
<div class="card card-widget widget-user-2 card-outline imagenes">
  <div class="widget-user-header">
         <div class="widget-user-image">
            <img class="img-circle elevation-2" src="<?php echo $usuario["foto"]; ?>" alt="Usuario">
          </div>
                <!-- /.widget-user-image -->
            <h3 class="widget-user-username"><?php echo $usuario["nombre"]; ?></h3>
            <h5 class="widget-user-desc"><?php echo date("d-m-yy"); ?></h5>
</div>
   <!-- /.card-header -->
    <div class="card-body">
              <!-- /.contenido -->
      <div class="row">

         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box imagenes">
              <span class="info-box-icon bg-success"><i class="fa fa-plus-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> CREAR MODELO DE NEGOCIO</span>
                <span class="info-box-number"><?php echo $cont; ?><small> modelos de negocio</small></span><br>
                <a href="#modalCrearModelo" class="btn btn-outline-success btn-sm" data-toggle="modal" data-dismiss="modal">Crear modelo de negocio</a>
              </div>           
            </div>          
        </div> 

          <?php $n = 0; foreach ($pMDN as $key => $value): $n++; ?>         
              <div class="col-md-3">
                  <!-- .contenido 2 -->
                <div class="card <?php if($value["estado"] == 0) {echo "card-warning";}else{echo "card-info";} ?> imagenes">
                      <div class="card-header">
                        <h3 class="card-title">PROYECTO N° <?php echo $n; ?></h3>
                        <div class="card-tools">
                           <?php if($value["estado"] == 0) {echo "(En revisión)";}else{echo "(Terminado)";} ?>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                       <!-- /.card-body -->
                  <div class="card-footer">                      
                      <div class="card-body">
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modalEditarMDN" onclick="carga_ajax_EditarMDN('<?php echo $value['idProyecto']; ?>', 'modalEditarMDN','vistas/paginas/modalEditarMDN.php');"><h5 class="text-naranjaLogo"><i><?php echo $value["nombreProyecto"]?> <i class="fa fa-edit"></i></i></h5></a>
                       <h6>Sector de <i><?php echo $value["sectorEconomico"] ?></i></h6>
                       <h6>Para quién?, <i><?php echo " "; echo $value["paraQuien"]?></i></h6>
                       <h6><i><?php echo $usuario["email"] ?></i></h6>
                      </div>
                       <div class="btn-group">
                         <form action="dashboardMDN" method="post">
                            <input type="hidden" value="<?php echo $value["idProyecto"]; ?>" name="idP">
                            <button type="submit" class="btn btn-outline-success btn-sm">Ver modelo de negocio</button>
                          </form>
                          <form method="post">
                            <input type="hidden" value="<?php echo $value["idProyecto"]; ?>" name="idProyecto">
                            <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>
                          </form>
                      </div>                     
                    </div>
                      <!-- /.card-footer -->
                </div>
                    <!-- /.card -->           
              </div>
          <?php endforeach ?>  
                         
      </div>                              
      </div>
       <!-- /.card-footer -->
       <div class="card-footer">
         <h6><i> <span class="float-right text-muted">Modelo de Negocio siguenos en redes sociales. 
          <?php $redesSociales = ControladorGeneral::ctrRedesSociales(); echo  $redesSociales; ?></span></i></h6> 
       </div>
       <!-- /.card-footer -->
     </div>
     <!-- /.card -->
   </div>
</div>
</section>
  <!-- /.content -->
</div>
 <?php
      $eliminarMDN = new ControladorMDN();
      $eliminarMDN -> ctrEliminarMDN();

      $editarMDN = new ControladorMDN();
      $editarMDN -> ctrEditarMDN();
        
 ?>

<!--=====================================
VENTANA MODAL Editar Medelo de Negocio //modalEditarMDN.php
======================================-->
<div class="modal fade" id="modalEditarMDN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modelo de negocio</h4>
      </div>
      <div class="modal-body">
        <h1>Modelo de negocio</h1>
      </div>
      <div class="modal-footer">
            <h4>Modelo de negocio</h4>
      </div>
    </div>
  </div>
</div>
<!--/modal-->


