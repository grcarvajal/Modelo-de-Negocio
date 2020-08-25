<?php
session_start();
if(!isset($_SESSION["validarSesion"]))
	{
    require_once "../backoffice/controladores/general.controlador.php";
    $rutaInicio = ControladorGeneral::ctrRutaInicio();
		echo '<script>
				window.location = "'.$rutaInicio.'ingreso";
		 	 </script>';	 	
	 return;	 	 	
	}
	require_once "../backoffice/controladores/mdn.controlador.php";
	require_once "../backoffice/modelos/mdn.modelo.php";
	require_once "../backoffice/controladores/usuarios.controlador.php";
	require_once "../backoffice/controladores/general.controlador.php";
	require_once "../backoffice/modelos/usuarios.modelo.php"; 

	$item = "id_usuario";
	$valor = $_SESSION["id"];
	$usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Modelo de Negocio</title>
	<link rel="icon" href="../backoffice/vistas/img/plantilla/icono.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--=====================================
Vínculos CSS
======================================-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../backoffice/vistas/css/fontawesome/css/all.css">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Theme style -->

<!-- DataTables -->
<link rel="stylesheet" href="../backoffice/vistas/css/plugins/dataTables.bootstrap4.min.css">	
<link rel="stylesheet" href="../backoffice/vistas/css/plugins/responsive.bootstrap.min.css">
<!-- estilo personalizado -->
<link rel="stylesheet" href="../backoffice/vistas/css/style.css">
<!--=====================================
Vínculos JS
======================================-->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->

<!-- html canvas generar imagen -->	
<script src="../backoffice/vistas/js/html2canvas.js"></script>

<script type="text/javascript">

  $(function() {
      function downloadCanvas(canvasId, filename) {
          // Obteniendo la etiqueta la cual se desea convertir en imagen/// {scale: 3, dpi: 144, width: 1247, height: 595}
          var domElement = document.getElementById(canvasId);

          html2canvas(domElement, {scale: 2, dpi: 300})
          .then(domElementCanvas => {                     
          // Creando enlace para descargar la imagen generada
          var link = document.createElement('a');
          link.href = domElementCanvas.toDataURL("img/png");
          link.download = filename;        
          // Simulando clic para descargar
          link.click();         
          // Haciendo la conversión y descarga de la imagen al presionar el botón
            });
        }
          $('#boton-descarga').click(function() {
              downloadCanvas('imagen', 'Modelo-de-Negocio.png');
          });
    });
  </script>
</head>
<body>
<?php 
      $descargarMDN = new ControladorMDN();
      $descargarMDN -> ctrDescargasMDN(); 
          
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
 $ruta = ControladorGeneral::ctrRuta();
?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
<section class="content-header">  
      <div class="container-fluid negro">
        <div class="row mb-2">
          <div class="col-sm-6">
              <a href="<?php echo $ruta.'inicio'; ?>" class="brand-link">
              <img src="../vistas/img/logo-medelo-de-negocio.png" alt="Modelo de Negocio Logo">
              </a>
          </div>
          <div class="col-sm-6">  
            <br>
              <span class="float-right text-muted">
                  <a href="<?php echo $ruta.'salir'; ?>" class="btn btn-outline-success">Salir</a>
              </span> 
               <span class="float-right text-muted">
                  <form action=" <?php echo $ruta.'dashboardMDN'; ?>" method="post">
                  <input type="hidden" value="<?php echo $verMDN['idProyecto']; ?>" name="idP">
                  <button type="submit" class="btn btn-outline-success">Volver a Edición</button>
                  </form>
              </span>                 
              <span class="float-right text-muted">          
          	     <button type="submit" class="btn btn-outline-success" id="boton-descarga">Descargar Modelo de Negocio</button>
             </span>                                                          
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    <!-- Default box -->
  <div class="row" id="imagen">
    <!-- .card proyectos del usuario 12 col-->
       <div class="col-md-12">
          <div class="card card-outline <?php if($verMDN["estado"] == 0) {echo "card-warning";}else{echo "card-info";} ?> imagenes">
           
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

<br>
<div class="row">

      <!-- 1. Socios  -->
  <div class="col-lg-2 bordosp"><h5 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/1socios.png" alt="Socios" width="48" height="48">  Socios</h5>
      <?php
          $tabla = "1socios";
          $idPn = $verMDN["idProyecto"]; 
          $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
           if($socios == "vacio"){
            echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
            }else{
        foreach ($socios as $key => $value):
            ?> 
            <div class="quote-container">
            <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; }
                  else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                  <p>
                  <?php echo $value["nota"]?>         
             </blockquote>
            </div>          
    <?php endforeach; } ?>     
  </div>
       <!-- Fin 1. Socios -->
      <div class="col-lg-3 bordosp5">
           <div class="row">
            <!-- 2. Actividades -->
             <div class="col-lg-12 bordosp2"><h5 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/2actividades.png" alt="Actividades" width="48" height="48">  Actividades</h5> 
                    <?php
                      $tabla = "2actividades";
                      $idPn = $verMDN["idProyecto"]; 
                      $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
                      if($socios == "vacio"){
                         echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
                      }else{
                    foreach ($socios as $key => $value):
                        ?> 
                        <div class="quote-container">
                      <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; } else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                          <p>
                              <?php echo $value["nota"]?>
                              </p>
                         </blockquote>
                        </div>          
                <?php endforeach; } ?>     
                    
               </div>
               <!-- Fin 2. Actividades -->
               <!--     3. Recursos -->
       <div class="col-lg-12 bordosp36"><h5 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/3recursos.png" alt="Recursos" width="48" height="48"> Recursos</h5>
                     <?php
                      $tabla = "3recursos";
                      $idPn = $verMDN["idProyecto"]; 
                      $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
                      if($socios == "vacio"){
                         echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
                      }else{
                    foreach ($socios as $key => $value):
                        ?> 
                        <div class="quote-container">
                         <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; }else{ if($value["color"] == 2) {echo "verde";
                              }else{ if($value["color"] == 3) {echo "azul"; } } } ?>">
                              <p>
                              <?php echo $value["nota"]?>
                              </p>
                         </blockquote>
                        </div>          
                <?php endforeach; } ?>  
               </div>
                <!-- Fin 3. Recursos Clave -->
             </div>
      </div>
       <!--  4. Propuesta de Valor -->
      <div class="col-lg-2 bordosp"><h5 class="titulocanvas"><h6 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/4propuesta-de-valor.png" alt="Propuesta de Valor" width="48" height="48">Propuesta de Valor</h6>
          <?php
              $tabla = "4propuestadevalor";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                 echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
                <div class="quote-container">
                 <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; } else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                          <p>
                      <?php echo $value["nota"]?>
                      </p>
                 </blockquote>
                </div>          
        <?php endforeach; } ?>  
      </div>
      <!-- Fin 4. Propuesta de Valor -->
      
  <div class="col-lg-3 bordosp5">
    <div class="row">
      <!--     5. Relación con los Clientes -->
      <div class="col-lg-12 bordosp2"><h5 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/5relacion-con-clientes.png" alt="Relacion con los Clientes" width="48" height="48"> Relación con los Clientes</h5>
          <?php
              $tabla = "5relacionconlosclientes";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                 echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
                <div class="quote-container">
                <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; } else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                          <p>
                      <?php echo $value["nota"]?>
                      </p>
                 </blockquote>
                </div>          
        <?php endforeach; } ?>  
      </div>
        <!--  Fin 5. Relación con los Clientes -->
        <!--      6. Canales de Distribución -->
    <div class="col-lg-12 bordosp36"><h5 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/6canales.png" alt="Canales de Distribucón" width="48" height="48"> Canales de Distribución</h5>
            <?php
              $tabla = "6canalesdedistribucion";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                 echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
                <div class="quote-container">
                 <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; } else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                          <p>
                      <?php echo $value["nota"]?>
                      </p>
                 </blockquote>
                </div>          
        <?php endforeach; } ?>  
        </div>
         <!--   Fin 6. Canales de Distribución -->
       </div>
    </div>
   <!--      7. Clientes -->
  <div class="col-lg-2 bordosp"><h5 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/7clientes.png" alt="Los Clientes" width="48" height="48"> Clientes</h5>
       <?php
              $tabla = "7clientes";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
                <div class="quote-container">
                 <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; } else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                          <p>
                      <?php echo $value["nota"]?>
                      </p>
                 </blockquote>
                </div>          
        <?php endforeach; } ?>  
  </div>
  <!--   Fin 7. Clientes -->
      
  <div class="w-100 d-none d-md-block"></div>
  <!--       8. Estructura de Costos -->
      <div class="col-lg-6 bordosp3"><h5 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/8costos.png" alt="Estructura de Costos" width="48" height="48"> Estructura de Costos</h5>
        <div class="row">
         <?php
              $tabla = "8estructuradecostos";
              $idPn = $verMDN["idProyecto"]; 
              $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
              if($socios == "vacio"){
                 echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
              }else{
            foreach ($socios as $key => $value):
                ?> 
              <div class="col-lg-4">
                  <div class="quote-container">
                  <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; } else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                          <p>
                        <?php echo $value["nota"]?>
                        </p>
                   </blockquote>
                  </div> 
              </div>         
        <?php endforeach; } ?> 
      </div> 
    </div>
      <!--  Fin 8. Segmento de Clientes -->
      <!--      9. Fuentes de Ingresos -->
    <div class="col-lg-6 bordosp4"><h5 class="titulocanvas"><img src="../backoffice/vistas/img/inicio/9fuente-de-ingresos.png" alt="Fuentes de Ingresos" width="48" height="48"> Fuentes de Ingresos</h5>
      <div class="row">
        <?php
          $tabla = "9fuentesdeingresos";
          $idPn = $verMDN["idProyecto"]; 
          $socios = ControladorMDN::ctrVerNotasMDN($tabla, $idPn);
          if($socios == "vacio"){
            echo '<p><img src="../backoffice/vistas/img/plantilla/nota-triste.png" class="imagenes" alt="No hay notas" width="70" height="70"></p>'; 
          }else{
        foreach ($socios as $key => $value):
            ?>      
              <div class="col-lg-4">
                  <div class="quote-container">
                   <blockquote class="note <?php if($value["color"] == 1) {echo "yellow"; } else{ if($value["color"] == 2) {echo "naranja"; } else{ if($value["color"] == 3) {echo "verde"; } else{ if($value["color"] == 4) {echo "azul"; } } } } ?>">
                          <p>
                        <?php echo $value["nota"]?>
                        </p>
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
       <div class="card-footer"> 
        <span class="float-right text-muted">           
          Copyright © <?php echo date("Y"); ?> <a href="www.modelo-de-negocio.com" target="_black">www.modelo-de-negocio.com</a>.
          Todos los derechos reservados. Poryectos Tic @proyectostic @modelodenegocioapp
        </span>
       </div>
      </div>
    </div>
  </div>
</section>
</div>
</body>
</html>
 