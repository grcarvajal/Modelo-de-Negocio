<div class="col-12 col-md-8">	
	<div class="card card-primary card-outline">		
		<div class="card-header">			
			
		</div>
		<div class="card-body">			
			<h6 class="card-title">Tienes acceso a todo el contenido de esta aplicación.</h6>			
			<br>

		 <form method="post">
		 	<div class="form-group">
				<label for="inputName" class="control-label">Nombre completo</label>
				<div>
		 	<input type="text" class="form-control" name="nombreUsuario" value="<?php echo $usuario["nombre"]; ?>">
		 	</div>
			</div>
			<div class="form-group">
				<label for="inputName" class="control-label">E-mail:</label>
				<div>
		 	<input type="text" class="form-control" value="<?php echo $usuario["email"]; ?>" readonly>
		 	</div>
			</div>
			<div class="form-group">
				<label for="inputName" class="control-label">País:</label>
				<div>
		 	<input type="text" class="form-control" placeholder="Pais" name="pais" required>
		 	</div>
			</div>
		 	<div class="form-group">
				<label for="inputName" class="control-label">Teléfono móvil:</label>
				<div>
		 	<input type="text" class="form-control" placeholder="Teléfono" name="telefono" required>
		 	</div>
			</div>
		 	<div class="form-group">
				<label for="inputName" class="control-label">Ciudad:</label>
				<div>
		 	<input type="text" class="form-control" placeholder="Ciudad" name="ciudad" required>
		 	</div>
			</div>
		 	<input type="hidden" value="<?php echo $usuario["id_usuario"]; ?>" name="idUsuario">
                        
                        <button type="submit" class="btn btn-success btn-block">Actualizar</button>    
                   </form>  
		<?php

		$actualizarPerfil = new ControladorUsuarios();
        $actualizarPerfil -> ctrActualizarPerfilUsuario();
        ?>
	<br>	
	<p> Yo acepto los términos y condiciones <a href="#terminos" data-toggle="collapse"> Ver términos y condiciones</a></p>																	
<!--=====================================
CONTRATO ctrActualizarPerfilUsuario
======================================-->
<div class="clearfix"></div>
	<div id="terminos" class="collapse pb-4">		
		<div class="card">
			<div class="card-body">
				Los suscritos a saber: www.modelo-de-negocio.com, es una aplicación web para desarrollar modelos de negocio, esta aplicación está basada en el  Modelo de Negocio  Canvas creado por Alexander Osterwalder de www.businessmodelgeneration.com, en adelante y para todos los efectos del presente contrato se denominará modelo-de-negocio.com, y quien se registra con los datos inscriptos en el anterior formulario de registro, persona que acepta estos términos y condiciones, mayor de edad y actuando en nombre propio, quien en adelante y para todos los efectos de los presentes TERMINOS Y CONDICIONES, que se regirá por las siguientes partes y cláusulas: 
			</div>
			<div class="card-header">
				<a class="card-link" data-toggle="collapse" href="#collapse1">
			 		DEFINICIONES Y ALCANCE
			 	</a>
			</div>
			<div id="collapse1" class="collapse show" data-parent="#accordion">				
				<div class="card-body">						
					Para efectos de la interpretación del presente documento, relevante usados en el mismo
					están definidos en este documento de Términos y Condiciones el cual usted aceptó y estuvo de acuerdo al registrarse en la página web www.modelo-de-negocio.com; los términos y palabras no definidas en el documento de Términos y Condiciones serán interpretadas pos su significado legal y técnico conforme a lo preceptuado en las leyes de cada país. 
				</div>
			</div>

		 	<div class="card-header">
		 		<a class="collapsed card-link" data-toggle="collapse" href="#collapse6">
		 			VALIDEZ Y DURACIÓN
		 		</a>
		 	</div>
		 	<div id="collapse6" class="collapse" data-parent="#accordion">
		 		<div class="card-body">
		 			El presente documento tendrá validez durante el periodo que el usuario o emprendedor esté suscrito a la aplicación www.modelo-de-negocio.com.
		 		</div>
		 	</div>

		 	<div class="card-header">
		 		<a class="collapsed card-link" data-toggle="collapse" href="#collapse7">
		 			PROPIEDAD INTELECTUAL
		 		</a>
		 	</div>
		 	<div id="collapse7" class="collapse" data-parent="#accordion">
		 		<div class="card-body">
		 			El usuario o emprendedor posee todos los derechos de autor y la propiedad intelectual de los Modelos de Negocio que cree en la aplicación, los textos digitales, las marcas, nombres y cualquier otra clase de propiedad intelectual que use será exclusiva del usuario o emprendedor. 
		 		</div>
		 	</div>
		</div>
	</div>
</div>
</div>	
</div>