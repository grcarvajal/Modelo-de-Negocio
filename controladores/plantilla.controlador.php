<?php
/**
 * Nodelo de Negocio @grcarbajal 26 de mayo de 2020
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class ControladorPlantilla
{
	
public function ctrPlantilla()
	{
		include "vistas/plantilla.php";
	}

/*===========================================================
Enviar mensaje desde pagina contactenos en Modelo de Negocio 
============================================================*/
public function ctrMensajeContactenos()
	{
     if(isset($_POST["mensaje"]))
		{
		if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["mensaje"]) &&
		   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
		   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo"]))
			{
				
			$ruta = ControladorRuta::ctrRuta();

			$mensaje = $_POST["mensaje"];
			$nombre = $_POST["nombre"];
			$correo = $_POST["correo"];

		date_default_timezone_set("America/Bogota");
		$mail = new PHPMailer;
		$mail->Charset = "UTF-8";
		$mail->isMail();
		$mail->setFrom("pruebas.grcarvajal@gmail.com", "Modelo de Negocio");
		$mail->addReplyTo("pruebas.grcarvajal@gmail.com", "Modelo de Negocio");
		$mail->Subject  = "Mensaje de Contactenos Modelod e Negocio";
		$mail->addAddress("pruebas.grcarvajal@gmail.com", "Modelo de Negocio");
		$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
			<center>							
				<img style="padding:20px; width:10%" src="https://tutorialesatualcance.com/tienda/logo.png">
			</center>
			<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
				<center>
					<img style="padding:20px; width:15%" src="https://tutorialesatualcance.com/tienda/icon-email.png">
					<h3 style="font-weight:100; color:#999">Mensaje de contáctenos Modelo de Negocio</h3>
					<hr style="border:1px solid #ccc; width:80%">
					<h4 style="font-weight:100; color:#999; padding:0 20px">Nombre:</h4>'.$nombre.'
					<h4 style="font-weight:100; color:#999; padding:0 20px">Email:</h4>'.$correo.'
					<h4 style="font-weight:100; color:#999; padding:0 20px">Mensaje:</h4>'.$mensaje.'													
					<br>
					<hr style="border:1px solid #ccc; width:80%">
					<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y eliminarlo.</h5>
				</center>	
			</div>
		</div>');

		$envio = $mail->Send();

		if(!$envio){
			echo '<script>
				swal({
					type:"error",
					title: "¡ERROR!",
					text: "¡¡Ha ocurrido un problema enviando el mensaje a '.$_POST["correo"].' '.$mail->ErrorInfo.', por favor inténtelo nuevamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function(result){
					if(result.value){
						history.back();
					}
				});	
			</script>';
		}else{
			echo '<script>
				swal({
					type:"success",
					title: "¡SU MENSAJE FUE ENVIADO CORRECTAMENTE!",
					text: "¡Revisaremos su mensaje y si es necesario nos pondremos en contacto para responder...!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
					if(result.value){
						window.location = "'.$ruta.'";
					}
				});	
			</script>';
			}
			}else{
				echo '<script>
					swal({
						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten caracteres especiales en ninguno de los campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
						if(result.value){
							history.back();
						}
					});	
				</script>';
			}
		}		
	}

}