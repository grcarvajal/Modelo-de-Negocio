<div class="row">
<!-- .card proyectos del usuario 12 col-->
 <div class="col-md-12">
		 <!-- Box Comment -->
<div class="card card-widget widget-user-2 card-outline imagenes">
	<div class="widget-user-header">
                <!-- /.widget-user-image -->
            <h3><?php echo $usuario["nombre"]; ?> [ Datos de la Aplicación ]</h3>
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
              <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">USUARIOS</span>
                <span class="info-box-number"><?php echo $cont; ?><small> modelos de negocio</small></span><br>
                <a href="#modalCrearModelo" class="btn btn-outline-success btn-sm" data-toggle="modal" data-dismiss="modal">Crear</a>
                <a href="proyectos" class="btn btn-outline-success btn-sm">Ver</a>
              </div>           
            </div>          
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box imagenes">
              <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">USUARIOS VERIFICADOS</span>
                <span class="info-box-number">3<small> ayudas</small></span><br>
                <a href="herramientas" class="btn btn-outline-success btn-sm">Ver</a>
              </div>           
            </div>          
        </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box imagenes">
              <span class="info-box-icon bg-red"><i class="fa fa-share-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> DESCARGAS</span>
                <span class="info-box-number"><i class="fa fa-share-alt"> </i><small> share</small></span><br>
                <a href="javascript:void(0)" class="btn btn-outline-success btn-sm" onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=http://modelo-de-negocio.com')">Compartir</a>
              </div>           
            </div>          
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box imagenes">
              <span class="info-box-icon bg-success"><i class="fa fa-paper-plane"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> MDN CREADOS</span>
                <span class="info-box-number"><?php echo $cont; ?><small> modelos de negocio</small></span><br>
                <a href="#modalCrearModelo" class="btn btn-outline-success btn-sm" data-toggle="modal" data-dismiss="modal">Crear modelo de negocio</a>
              </div>           
            </div>          
        </div>
        
</div> 													 
</div>
</div>
		 <!-- /.card -->
</div>
</div>

