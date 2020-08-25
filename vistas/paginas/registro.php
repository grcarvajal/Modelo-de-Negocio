<div class="ladoUsuarios">
<div class="container-fluid">		
<div class="row">			
	<div class="col-12 col-lg-4 formulario">
		<figure class="p-2 p-sm-5 p-lg-2 p-xl-3">				
			<a href="<?php echo $ruta; ?>inicio"><img src="img/logo-blanco-modelo-de-negocio.png"></a>
			<form class="mt-3 px-4" method="post" onsubmit="return validarPoliticas()">
				<input type="hidden" value="modelo-de-negocio" name="patrocinador">
				<div class="d-flex justify-content-between">						
					<h4>Registrarse para ingresar</h4>
				</div>
				Al registrarse recibirá un correo electrónico para validar su registro
				<input type="text" class="form-control my-3 py-2" placeholder="Nombre" name="registroNombre" required>
				<input type="email" class="form-control my-3 py-2" placeholder="Correo Electrónico" name="registroEmail" required>
				<input type="password" class="form-control my-3 py-2" placeholder="Contraseña" name="registroPassword" required>
				<div class="form-check-inline text-right">							
					<input type="checkbox" id="politicas" class="form-check-input">
					<label class="form-check-label" for="politicas">
						Para registrarse debe aceptar nuestras <p><a href="#"> políticas de privacidad </a><span></span></p>
					</label>
				</div>
				<?php
				$registro = new ControladorUsuarios();
				$registro -> ctrRegistroUsuario();
				?>

				<input type="submit" class="form-control my-3 py-3 btn btn-info" value="REGISTRARSE">
				¿Ya tienes una cuenta? | <a href="<?php echo $ruta; ?>ingreso">Ingresar</a>
			</form>
		</figure>
	</div>
	<div class="col-12 col-lg-8 fotoRegistro text-center">		
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