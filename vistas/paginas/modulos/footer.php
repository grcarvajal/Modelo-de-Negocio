<!--=====================================
FOOTER
======================================-->
<footer class="container-fluid bg-dark contactenos" id="contactenos">	
	<div class="container">
		<div class="d-flex flex-column-reverse flex-lg-row">			
			<div class="pt-3 pt-lg-5 pr-lg-5 flex-fill">
				<p class="lead text-white text-center text-lg-left">CONTÁCTENOS</p>				
				<form method="post">
					<div class="form-group">					
						<input type="text" class="form-control form-control-lg" name="nombre" placeholder="Nombre" required>
					</div>
					<div class="form-group">						
						<input type="text" class="form-control form-control-lg" name="correo" placeholder="Correo electrónico" required>
					</div>
					<div class="form-group">						
						<textarea class="form-control form-control-lg" rows="3" name="mensaje" placeholder="Escribe aquí tu mensaje" required></textarea>
					</div>
					<button type="submit" class="btn btn-info btn-block btn-lg">Enviar</button>
				</form>
				<?php
				      $Mensaje = new ControladorPlantilla();
				      $Mensaje -> ctrMensajeContactenos();
				        
				 ?>
				<ul class="p-0 m-0 py-4 d-flex justify-content-center">
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
	<div class="pt-lg-5 px-lg-5">
		<div class="p-5 visitanos imagenes">			
			<h1 class="mt-5">Modelo de negocio</h1>
			<p>Es una aplicación totalmente gratis, desarrollada por un colombiano.</p>
			<p>
			Colombia.<br>
			Cali Valle de Cauca.<br>
			<a href="#">Modelo de Negocio.</a><br>					
						
			Email: info@modelo-de-negocio.com<br>
			Cel.: 315 488 59 04<br>
			Puede ayudarnos haciendo una donación.<br>	
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_black">
		        <input type="hidden" name="cmd" value="_s-xclick" />
		        <input type="hidden" name="hosted_button_id" value="GM7L89KRYHY8J" />
		        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
		        <img alt="" border="0" src="https://www.paypal.com/en_CO/i/scr/pixel.gif" width="1" height="1" />
		      </form>							
			</p>			
		</div>
	</div>
		</div>
		<div class="pt-lg-12 px-lg-12 copyright">
				Copyright © <?php echo date("Y"); ?> <a href="#">Poryectos Tic</a>.
    			Todos los derechos reservados. <br>
    			<a href="https://www.freepik.es">Algunas imágenes creadas por freepik - www.freepik.es</a>
			</div>
			<br>
	</div>
</footer>