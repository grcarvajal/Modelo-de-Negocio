<?php 
$rutaPng = ControladorGeneral::ctrRutaInicio();
if(isset($_POST["idP"]))
    {
      $item = "idProyecto";
      $valor = $_POST["idP"]; 
      $verMDN = ControladorMDN::ctrVerMDN($item, $valor);
    }else{
     $item = "idProyecto";
     $valor = $_SESSION["idPro"];
     $verMDN = ControladorMDN::ctrVerMDN($item, $valor);
    }

?>
<div class="content-wrapper" style="min-height: 1058.31px;"> 
  <!-- Content Header (Page header) -->
<section class="content-header">  
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           Dashboard 
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
    <!-- Default box -->
  <div class="row">
    <!-- .card proyectos del usuario 12 col-->
       <div class="col-md-12">
          <div class="card card-outline <?php if($verMDN["estado"] == 0) {echo "card-warning";}else{echo "card-info";} ?> imagenes">
            <div class="card-header">  
             <div class="row"> 
                  <div class="col-md-6">       
                    <form action="<?php echo $rutaPng.'png/modelo-de-negocio-png.php'; ?>" method="post" target="_blank">
                      <input type="hidden" value="<?php echo $verMDN['idProyecto']; ?>" name="idPDescargas">
                      <input type="hidden" value="<?php echo $verMDN['idProyecto']; ?>" name="idP">
                      <button type="submit" class="btn btn-success btn-block">VISTA PREVIA Y DESCARGAR</button>
                    </form>
                  </div> 
                  <div class="col-md-6">        
                    <form method="post">
                      <input type="hidden" value="<?php echo $verMDN['idProyecto']; ?>" name="idPVersion">
                      <button type="submit" class="btn btn-success btn-block">GUARDAR VERSIÓN</button>
                    </form>
                  </div>  
              </div>            
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->                       
    <div class="card-body">
    <div class="row">
        <div class="col-md-12"> 
         <div class="row">
             <div class="col-lg-3">
                 <p><h5><?php echo $verMDN["nombreProyecto"]; ?></h5></p>
              </div>
              <div class="col-lg-3 bordosSuperiorMDN">
                <p><h6><?php echo "Diseñado por: "; echo $usuario["nombre"]; ?></h6></p>
              </div>
              <div class="col-lg-3 bordosSuperiorMDN">
                 <p><h6><?php echo "Diseñado para: "; echo $verMDN["paraQuien"]; ?></h6></p>
              </div>
              <div class="col-lg-3">
                <div class="row">
                  <div class="col-lg-12 bordosSuperiorMDN">
                    <h6><?php echo "Fecha: "; echo $verMDN["fechaRegistro"]; ?></h6>
                  </div>
                  <div class="col-lg-12 bordosSuperiorMDN">
                    <h6><?php echo "Versió: "; echo $verMDN["version"];; ?></h6>
                  </div>
                </div>
                
              </div>
           </div>                                                                              
        </div>                            
      </div>
     

  <!-- Main cuadro modelo de negocio -->
<br>
<div class="row">
      <!-- 1. Socios -->
  <div class="col-lg-2 bordosp"><h5 class="titulocanvas"><img src="vistas/img/inicio/1socios.png" alt="Socios" width="48" height="48"> Socios</h5>
     <form method="post" id="nota"> 
        <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('1socios', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
      </form><p>
      <?php
          $tabla = "1socios";
          $idPn = $verMDN["idProyecto"]; 
          $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
           if($socios == "vacio"){
            echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
            }else{
        foreach ($socios as $key => $value):
            ?> 
            <div class="quote-container">
             <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                  else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                  <p>
                  <?php echo $value["nota"]?>
                  </p>
                <div class="btn-group">
               <form method="post"> 
                   <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('1socios', 'idItem1', '<?php echo $value["idItem1"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                </form>  
                <form method="post">
                  <input type="hidden" value="1socios" name="tabla">
                  <input type="hidden" value="idItem1" name="itemN">
                  <input type="hidden" value="<?php echo $value["idItem1"]; ?>" name="idItem">
                  <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                  <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                </form>   
                </div>             
             </blockquote>
            </div>          
    <?php endforeach; } ?>     
  </div>
       <!-- Fin 1. Socios -->
      <div class="col-lg-3 bordosp5">
           <div class="row">
            <!-- 2. Actividades -->
             <div class="col-lg-12 bordosp2"><h5 class="titulocanvas"><img src="vistas/img/inicio/2actividades.png" alt="Actividades" width="48" height="48"> Actividades</h5> 
                <form method="post" id="nota"> 
                  <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('2actividades', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
                </form><p>
                    <?php
                      $tabla = "2actividades";
                      $idPn = $verMDN["idProyecto"]; 
                      $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
                      if($socios == "vacio"){
                         echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
                      }else{
                    foreach ($socios as $key => $value):
                        ?> 
                        <div class="quote-container">
                          <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                             else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                               <p>
                              <?php echo $value["nota"]?>
                              </p>
                            <div class="btn-group">
                               <form method="post"> 
                                 <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('2actividades', 'idItem2', '<?php echo $value["idItem2"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                                </form>  
                              <form method="post">
                                <input type="hidden" value="2actividades" name="tabla">
                                <input type="hidden" value="idItem2" name="itemN">
                                <input type="hidden" value="<?php echo $value["idItem2"]; ?>" name="idItem">
                                <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                                <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                              </form>    
                            </div>  
                         </blockquote>
                        </div>          
                <?php endforeach; } ?>     
                    
               </div>
               <!-- Fin 2. Actividades -->
               <!--     3. Recursos -->
       <div class="col-lg-12 bordosp36"><h5 class="titulocanvas"><img src="vistas/img/inicio/3recursos.png" alt="Recursos" width="48" height="48">  Recursos</h5>
               <form method="post" id="nota"> 
                  <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('3recursos', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
                </form><p>
                     <?php
                      $tabla = "3recursos";
                      $idPn = $verMDN["idProyecto"]; 
                      $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
                      if($socios == "vacio"){
                         echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
                      }else{
              foreach ($socios as $key => $value):
                        ?> 
                    <div class="quote-container">
                      <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                        else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                        <p>
                              <?php echo $value["nota"]?>
                              </p>
                    <div class="btn-group">
                      <form method="post"> 
                        <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('3recursos', 'idItem3', '<?php echo $value["idItem3"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                      </form>  
                      <form method="post">
                        <input type="hidden" value="3recursos" name="tabla">
                        <input type="hidden" value="idItem3" name="itemN">
                        <input type="hidden" value="<?php echo $value["idItem3"]; ?>" name="idItem">
                        <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                        <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                      </form>    
                    </div>  
                 </blockquote>
                </div>          
            <?php endforeach; } ?>  
               </div>
                <!-- Fin 3. Recursos Clave -->
             </div>
      </div>
       <!--  4. Propuesta de Valor -->
      <div class="col-lg-2 bordosp"><h6 class="titulocanvas"><img src="vistas/img/inicio/4propuesta-de-valor.png" alt="Propuesta de Valor" width="48" height="48">Propuesta de Valor</h6>
         <form method="post" id="nota"> 
          <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('4propuestadevalor', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
        </form><p>
          <?php
              $tabla = "4propuestadevalor";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                 echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
                <div class="quote-container">
                 <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                        else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                        <p>
                      <?php echo $value["nota"]?>
                      </p>
                   <div class="btn-group">
                      <form method="post"> 
                        <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('4propuestadevalor', 'idItem4', '<?php echo $value["idItem4"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                      </form> 
                      <form method="post">
                        <input type="hidden" value="4propuestadevalor" name="tabla">
                        <input type="hidden" value="idItem4" name="itemN">
                        <input type="hidden" value="<?php echo $value["idItem4"]; ?>" name="idItem">
                        <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                        <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                      </form>    
                    </div> 
                 </blockquote>
                </div>          
        <?php endforeach; } ?>  
      </div>
      <!-- Fin 4. Propuesta de Valor -->
      
  <div class="col-lg-3 bordosp5">
    <div class="row">
      <!--     5. Relación con los Clientes -->
      <div class="col-lg-12 bordosp2"><h5 class="titulocanvas"><img src="vistas/img/inicio/5relacion-con-clientes.png" alt="Relacion con los Clientes" width="48" height="48"> Relación con los Clientes</h5>
          <form method="post" id="nota"> 
            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('5relacionconlosclientes', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
          </form><p>
          <?php
              $tabla = "5relacionconlosclientes";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                 echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
                <div class="quote-container">
                 <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                        else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                        <p>
                      <?php echo $value["nota"]?>
                      </p>
                    <div class="btn-group">
                      <form method="post"> 
                        <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('5relacionconlosclientes', 'idItem5', '<?php echo $value["idItem5"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                      </form>   
                      <form method="post">
                        <input type="hidden" value="5relacionconlosclientes" name="tabla">
                        <input type="hidden" value="idItem5" name="itemN">
                        <input type="hidden" value="<?php echo $value["idItem5"]; ?>" name="idItem">
                        <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                        <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                      </form>    
                    </div> 
                 </blockquote>
                </div>          
        <?php endforeach; } ?>  
      </div>
        <!--  Fin 5. Relación con los Clientes -->
        <!--      6. Canales de Distribución -->
    <div class="col-lg-12 bordosp36"><h5 class="titulocanvas"><img src="vistas/img/inicio/6canales.png" alt="Canales de Distribucón" width="48" height="48"> Canales de Distribución</h5>
          <form method="post" id="nota"> 
            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('6canalesdedistribucion', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
          </form><p>
            <?php
              $tabla = "6canalesdedistribucion";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                 echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
                <div class="quote-container">
                 <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                        else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                        <p>
                      <?php echo $value["nota"]?>
                      </p>
                     <div class="btn-group">
                     <form method="post"> 
                        <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('6canalesdedistribucion', 'idItem6', '<?php echo $value["idItem6"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                      </form>   
                      <form method="post">
                        <input type="hidden" value="6canalesdedistribucion" name="tabla">
                        <input type="hidden" value="idItem6" name="itemN">
                        <input type="hidden" value="<?php echo $value["idItem6"]; ?>" name="idItem">
                        <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                        <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                      </form>    
                    </div> 
                 </blockquote>
                </div>          
        <?php endforeach; } ?>  
        </div>
         <!--   Fin 6. Canales de Distribución -->
       </div>
    </div>
   <!--      7. Clientes -->
  <div class="col-lg-2 bordosp"><h5 class="titulocanvas"><img src="vistas/img/inicio/7clientes.png" alt="Los Clientes" width="48" height="48"> Clientes</h5>
       <form method="post" id="nota"> 
            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('7clientes', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
        </form><p>
       <?php
              $tabla = "7clientes";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
                <div class="quote-container">
                 <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                        else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                        <p>
                      <?php echo $value["nota"]?>
                      </p>
                    <div class="btn-group">
                      <form method="post"> 
                          <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('7clientes', 'idItem7', '<?php echo $value["idItem7"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                      </form> 
                      <form method="post">
                        <input type="hidden" value="7clientes" name="tabla">
                        <input type="hidden" value="idItem7" name="itemN">
                        <input type="hidden" value="<?php echo $value["idItem7"]; ?>" name="idItem">
                        <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                        <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                      </form>    
                    </div> 
                 </blockquote>
                </div>          
        <?php endforeach; } ?>  
  </div>
  <!--   Fin 7. Clientes -->
      
  <div class="w-100 d-none d-md-block"></div>
  <!--       8. Estructura de Costos -->
      <div class="col-lg-6 bordosp3"><h5 class="titulocanvas"><img src="vistas/img/inicio/8costos.png" alt="Estructura de Costos" width="48" height="48"> Estructura de Costos</h5>
          <form method="post" id="nota"> 
            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('8estructuradecostos', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
          </form><p>
        <div class="row">
         <?php
              $tabla = "8estructuradecostos";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                 echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
              <div class="col-lg-4">
                  <div class="quote-container">
                   <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                        else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                        <p>
                        <?php echo $value["nota"]?>
                        </p>
                      <div class="btn-group">
                       <form method="post"> 
                            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('8estructuradecostos', 'idItem8', '<?php echo $value["idItem8"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                          </form> 
                      <form method="post">
                        <input type="hidden" value="8estructuradecostos" name="tabla">
                        <input type="hidden" value="idItem8" name="itemN">
                        <input type="hidden" value="<?php echo $value["idItem8"]; ?>" name="idItem">
                        <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                        <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                      </form>    
                    </div> 
                   </blockquote>
                  </div> 
              </div>         
        <?php endforeach; } ?> 
      </div> 
    </div>
      <!--  Fin 8. Segmento de Clientes -->
      <!--      9. Fuentes de Ingresos -->
    <div class="col-lg-6 bordosp4"><h5 class="titulocanvas"><img src="vistas/img/inicio/9fuente-de-ingresos.png" alt="Fuentes de Ingresos" width="48" height="48"> Fuentes de Ingresos</h5>
        <form method="post"> 
            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal" onclick="carga_ajax('9fuentesdeingresos', '<?php echo $verMDN['idProyecto']; ?>', 'modal','vistas/paginas/modalNota.php');"><i class="fa fa-plus-square"></i> Nueva Nota</a>
          </form><p>
      <div class="row">
        <?php
          $tabla = "9fuentesdeingresos";
          $idPn = $verMDN["idProyecto"]; 
          $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
          if($socios == "vacio"){
            echo '<p><img src="vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
          }else{
        foreach ($socios as $key => $value):
            ?>      
              <div class="col-lg-4">
                  <div class="quote-container">
                   <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                        else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                        <p>
                        <?php echo $value["nota"]; ?>
                        </p>
                      <div class="btn-group">
                        <form method="post"> 
                            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="carga_ajaxEditar('9fuentesdeingresos', 'idItem9', '<?php echo $value["idItem9"]; ?>', 'modalEditar','vistas/paginas/modalNotaEditar.php');">Editar</a>
                          </form>
                      <form method="post">
                        <input type="hidden" value="9fuentesdeingresos" name="tabla">
                        <input type="hidden" value="idItem9" name="itemN">
                        <input type="hidden" value="<?php echo $value["idItem9"]; ?>" name="idItem">
                        <input type="hidden" value="<?php echo $verMDN["idProyecto"]; ?>" name="idP">
                        <button type="submit" class="btn btn-outline-success btn-sm">Eliminar</button>    
                      </form>    
                    </div> 
                   </blockquote>
                  </div>
                </div>         
    <?php endforeach; } ?> 
  </div>  
</div> 
   <!--    Fin  9. Fuentes de Ingresos -->   
</div>
<!-- fin cuadro modelo de negocio --> 
 
            </div>
            <!-- /.card-body -->
              <!-- /.card-footer -->
             <div class="card-footer">
                 <?php $redesSociales = ControladorGeneral::ctrRedesSociales(); echo  $redesSociales; ?> 
             </div>
             <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
  <!-- /.content -->
</div>

 <?php
      $eliminarNota = new ControladorMDN();
      $eliminarNota -> ctrEliminarNotaMDN();

      $crearNota = new ControladorMDN();
      $crearNota -> ctrCrearNota();

      $editarNota = new ControladorMDN();
      $editarNota -> ctrEditarNotaMDN();

      $actualizarVersion = new ControladorMDN();
      $actualizarVersion -> ctrEditarVersionMDN();
        
 ?>


<!--=====================================
VENTANA MODAL CREAR NOTA, //modalNota.php
======================================-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
<!--=====================================
VENTANA MODAL Editar Nota //modalNotaEditar.php
======================================-->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

