<div class="row">
<!-- .card proyectos del usuario 12 col-->
 <div class="col-md-12">
		 <!-- Box Comment -->
<div class="card card-widget widget-user-2 card-outline imagenes">
	<div class="widget-user-header">
         <div class="widget-user-image">
            <img class="img-circle elevation-2" src="<?php echo $usuario["foto"]; ?>" alt="Usuario">
            <span class="float-right text-muted">
             <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_black">
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="GM7L89KRYHY8J" />
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                <img alt="" border="0" src="https://www.paypal.com/en_CO/i/scr/pixel.gif" width="1" height="1" />
              </form>
          </div>
                <!-- /.widget-user-image -->
            <h3 class="widget-user-username"><?php echo $usuario["nombre"]; ?></h3>
            <h5 class="widget-user-desc"><?php echo date("d-m-yy"); ?></h5>
           <?php 
              $item = "idUsuario";
              $valor = $usuario["id_usuario"]; 
              $cont = 0;
              $pMDN = ControladorMDN::ctrMostrarMDN($item, $valor);
              foreach ($pMDN as $key => $value): 
                $cont = $cont + 1;
              endforeach; 
           ?> 
  </div>
	 <!-- /.card-header -->
		<div class="card-body">
							<!-- /.contenido -->
			<div class="row">
               
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box imagenes">
              <span class="info-box-icon bg-info"><i class="fa fa-paper-plane"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">PROYECTOS</span>
                <span class="info-box-number"><?php echo $cont; ?><small> modelos de negocio</small></span><br>
                <a href="#modalCrearModelo" class="btn btn-outline-success btn-sm" data-toggle="modal" data-dismiss="modal">Crear</a>
                <a href="proyectos" class="btn btn-outline-success btn-sm">Ver</a>
              </div>           
            </div>          
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box imagenes">
              <span class="info-box-icon bg-green"><i class="fa fa-cogs"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">HERRAMIENTAS</span>
                <span class="info-box-number">3<small> ayudas</small></span><br>
                <a href="herramientas" class="btn btn-outline-success btn-sm">Ver</a>
              </div>           
            </div>          
        </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box imagenes">
              <span class="info-box-icon bg-red"><i class="fa fa-share-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> INVITAR AMIGOS</span>
                <span class="info-box-number"><i class="fa fa-share-alt"> </i><small> share</small></span><br>
                <a href="javascript:void(0)" class="btn btn-outline-success btn-sm" onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=http://modelo-de-negocio.com')">Compartir</a>
              </div>           
            </div>          
        </div>
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

<div class="col-md-8">
    <!-- Box Comment -->
  <div class="card card-outline imagenes">
    <div class="card-header">
      <h2>Modelo de Negocio</h2>
        <!-- /.user-block -->
    <div class="card-tools">
   </div>
<!-- /.card-tools -->
</div>
      <!-- /.card-header -->
<div class="card-body">
    <img class="img-fluid pad imagenes centrarContenido" src="vistas/img/inicio/Modelo-de-Negocio2.png" alt="Modelo de Negocio">
<p></p>
     <div class="col-md-12">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body clearfix">
                <blockquote class="quote-secondary">
                Modelo de Negocio  Canvas creado por Alexander Osterwalder de www.businessmodelgeneration.com
                <a href="vistas\doc\the-business-model-canvas.pdf" target="_blank">Plantilla .PDF del Modelo de Negocio.
               </a>                
        El Modelo de negocio Canvas, está licenciado por la Licencia
        <a href="https://creativecommons.org/licenses/by-sa/3.0/" target="_blank"> Creative Commons Reconocimiento-Compartir Igual 3.0 Unported.</a>      
                  <p><small>Modelo de Negocio <cite title="Source Title">Proyectos Tic</cite></small></p>
                </blockquote>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
</div>
    <!-- /.card -->
</div>

 <!-- .card derecho 4 col-->
<div class="col-md-4">
  <!-- Box Comment -->
  <div class="card card-outline imagenes">
  <div class="card-header">
    <h2>Interesante</h2>
    <!-- /.user-block -->
  <div class="card-tools">
  </div>
  </div>
      <!-- /.card-header -->
    <div class="card-body">
      <!-- /.contenido -->
    <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Proyectos <span class="float-right badge bg-primary">2</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Libros <span class="float-right badge bg-info">2</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Blogs <span class="float-right badge bg-success">4</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Cursos <span class="float-right badge bg-danger">3</span>
                    </a>
                  </li>
                </ul>
              </div>       
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
        
</div> 													 
</div>
            <!-- /.card-body -->
           <div class="card-footer">
              <?php $redesSociales = ControladorGeneral::ctrRedesSociales(); echo  $redesSociales; ?>  
           </div>
           <!-- /.card-footer -->
	</div>
		 <!-- /.card -->
</div>
</div>

