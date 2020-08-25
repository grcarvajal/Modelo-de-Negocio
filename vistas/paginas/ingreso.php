<div class="ladoUsuarios">
<div class="container-fluid">	
<div class="row">			
	<div class="col-12 col-lg-4 formulario">
		<figure class="p-2 p-sm-5 p-lg-4 p-xl-5 text-center">				
			<a href="<?php echo $ruta; ?>inicio"><img src="img/logo-blanco-modelo-de-negocio.png"></a>
			<form class="mt-5" method="post">
				<div class="d-flex justify-content-between">						
					<h4>Ingreso a la aplicación</h4>
				</div>
				
				<input type="email" class="form-control my-3 py-2" placeholder="Correo Electrónico" name="ingresoEmail" required>
				<input type="password" class="form-control my-3 py-2" placeholder="Contraseña" name="ingresoPassword" required>

				<?php
					$ingreso = new ControladorUsuarios();
					$ingreso -> ctrIngresoUsuario();
				?>

				<input type="submit" class="form-control my-3 py-3 btn btn-info" value="INGRESAR">
				<p class="text-center pt-1">¿Aún no tienes una cuenta? | <a href="<?php echo $ruta; ?>registro">Regístrate</a></p>						
				 <a href="#modalRecuperarPassword" data-toggle="modal" data-dismiss="modal">¿Olvidó su contraseña?</a>
			</form>
		</figure>
	</div>
	<div class="col-12 col-lg-8 fotoIngreso text-center">		
		<a href="<?php echo $ruta; ?>inicio"><button class="d-none d-lg-block text-center btn btn-default btn-lg my-3 text-white btnRegresar">Regresar</button></a>
		<a href="<?php echo $ruta; ?>inicio"><button class="d-block d-lg-none text-center btn btn-default btn-lg btn-block my-3 text-white btnRegresarMovil">Regresar</button></a>
		<ul class="p-0 m-0 py-4 d-flex justify-content-center redesSociales">
			<li>
				<a href="https://www.facebook.com/ModeloDeNegocio/" target="_blank"><i class="fab fa-facebook-f lead text-white mx-4"></i></a>
			</li>
			<li>
				<a href="https://www.instagram.com/modelodenegocioapp/" target="_blank"><i class="fab fa-instagram lead text-white mx-4"></i></a>
			</li>												
			<li>
				<a href="https://www.youtube.com/channel/UCBQCJlK4ON1b0PjbHO-ZOGw/featured" target="_blank"><i class="fab fa-youtube lead text-white mx-4"></i></a>
			</li>
		</ul>
	</div>
</div>
</div>
</div>

<!--=====================================
VENTANA MODAL RECUPERAR CONTRASEÑA
======================================-->
<div class="modal" id="modalRecuperarPassword">	
	<div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-header bg-info text-white">
		        <h4 class="modal-title">Recuperar contraseña</h4>
		        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
		    </div>
			 <div class="modal-body">			 	
				<form method="post">
					<p class="text-muted">Escriba su correo electrónico con el que está registrado, para recuperar su contraseña:</p>
					<div class="input-group mb-3">						
						<div class="input-group-prepend">
					      <span class="input-group-text">					      	
					      	<i class="far fa-envelope"></i>
					      </span>
					    </div>
					    <input type="email" class="form-control" placeholder="Email" name="emailRecuperarPassword" required>
					</div>
					<input type="submit" class="btn btn-success btn-block" value="Enviar">
					<?php
						$recuperarPassword = new ControladorUsuarios();
						$recuperarPassword -> ctrRecuperarPassword();
					?>
				</form>
			 </div>
	    </div>
    </div>
</div>