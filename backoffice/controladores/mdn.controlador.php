<?php
/**
@grcarvajal grcarvajal@gmail.com **Gildardo Restrepo Carvajal**
06/05/2020 gestionar modelos de negocio
Gestior Modelos de Negocio
 */

class ControladorMDN
{

/*--=====================================
	Registro de modelo de negocio
======================================--*/	

public function ctrCrearMDN()
	{

		if(isset($_POST["nombreProyecto"]))
		{
			$ruta = ControladorRuta::ctrRuta();

		    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreProyecto"])){		    	
                         
		    	$tabla = "modelodenegocio";
		    	$datos = array("nombreProyecto" => $_POST["nombreProyecto"],
		    				   "paraQuien" => $_POST["paraQuien"],
		    				   "sectorEconomico" => $_POST["sectorEconomico"],
		    				   "idUsuario" => $_POST["idU"],
		    				   "version" => 1.0
		    						);

			    $respuesta = ModeloMDN::mdlRegistroMDN($tabla, $datos);  

			    if($respuesta == "ok")
			    	$item = "idUsuario";
					$valor = $_SESSION["id"];
					$pMDN = ControladorMDN::ctrMostrarDboardMDN($item, $valor);
					$idMDN = $pMDN["idProyecto"];
					$_SESSION["idPro"] = $idMDN;
				    {
				    echo '<script>
						swal({
							type:"success",
						  	title: "¡OK!",
						  	text: "¡Modelo de Negocio Creado!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"		  
							}).then(function(result){
							if(result.value){   
								   window.location = "'.$ruta.'dashboardMDN"
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
								 window.location = "'.$ruta.'inicio"
							}
						});	
					</script>';
					}
	}
}

/*=============================================
	CREAR NOTA DE MODELO DE NEGOCIO
=============================================*/
static public function ctrCrearNota()
{
	if(isset($_POST["notaC"]))
		{
			$ruta = ControladorRuta::ctrRuta();

		    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .,\/\#!$%\*;:=\-_()”“"…]+$/', $_POST["notaC"]))
		   // if(preg_match('/^[.,\/#!$%\^&\*;:{}=\-_`~()”“"…]{10,4000}$/i', utf8_encode($texto))) {
		    	             
		    {	
				$nota = $_POST["notaC"];
				$idU =  $_SESSION["id"];
				$idP = $_POST["idPC"];
				$color = $_POST["colorC"];
				$tabla = $_POST["tablaC"];
			
				$respuesta = ModeloMDN::mdlCrearNota($nota, $idU, $idP, $color, $tabla);
				 if($respuesta == "ok")
				    {
				     $_SESSION["idPro"] = $idP;
				   	 echo '<script> 
							 window.location = "'.$ruta.'dashboardMDN"	
						  </script>';
					}
		}else{
		 $_SESSION["idPro"] = $_POST["idPC"];
		echo '<script>
						swal({
							type:"error",
							title: "¡CORREGIR!",
							text: "¡No se permiten caracteres especiales en ninguno de los campos!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
							if(result.value){
								 window.location = "'.$ruta.'dashboardMDN"
							}
						});	
					</script>';	
		}
	 }
}

/*=============================================
	Mostrar notas de cada item en el MDN
=============================================*/
static public function ctrVerNotasMDN($tabla, $idPn)
	{
		$id = $idPn;
		$tabla = $tabla;
		$respuesta = ModeloMDN::mdlVerNotasMDN($tabla, $id);

		if(empty($respuesta)) 
		{
		return "vacio";
		}else{
		return $respuesta;
		}
	}

/*=============================================
	Eliminar notas de cada item en el MDN
=============================================*/
static public function ctrEliminarNotaMDN()
{
	if(isset($_POST["idItem"]))
		{		
		$ruta = ControladorRuta::ctrRuta();

		$id = $_POST["idItem"];
		$tabla = $_POST["tabla"];
		$idP = $_POST["idP"];
		$item = $_POST["itemN"];
		$respuesta = ModeloMDN::mdlEliminarNotaMDN($tabla, $id, $item);
		 if($respuesta == "ok")
		  {
		    $_SESSION["idPro"] = $idP;
		   	 echo '<script> 
					 window.location = "'.$ruta.'dashboardMDN"	
				  </script>';
			}
		
		}
		
	}

/*=============================================
	Mostrar modelo de negocio todos por usuario
=============================================*/
static public function ctrMostrarMDN($item, $valor){
		$tabla = "modelodenegocio";
		$respuesta = ModeloMDN::mdlMostrarMDN($tabla, $item, $valor);
		return $respuesta;
	}

/*====================================================================
	Mostrar modelo de negocio el utimo creado para ir a dashboardMDN
======================================================================*/
static public function ctrMostrarDboardMDN($item, $valor){
		$tabla = "modelodenegocio";
		$respuesta = ModeloMDN::mdlMostrarDboarMDN($tabla, $item, $valor);
		return $respuesta;
	}


/*=============================================
	Ver un modelo de negocio por ID
=============================================*/
static public function ctrVerMDN($item, $valor){
		$tabla = "modelodenegocio";
		$respuesta = ModeloMDN::mdlVerMDN($tabla, $item, $valor);
		return $respuesta;
	}

/*=============================================
Ver nota para Actualizar notas del modelo de negocio
=============================================*/
static public function ctrVerActualizarNotaMDN()
  {
	if(isset($_POST["id"]))
		{
		$tabla = $_POST["id"]; // la tabla
		$nombreCampoID = $_POST["id2"];  // el nombre del campo id en la tabla
		$valorID = $_POST["id3"];   // el valor del id de la fila para editar
		$respuesta = ModeloMDN::mdlVerMDN($tabla, $nombreCampoID, $valorID);
		$idProyecto = $respuesta["idP"];
		
		if ($respuesta["color"] == 1)
			{ $color = "Amarillo"; }
				else { 
					if ($respuesta["color"] == 2)
					   { $color = "Naranja"; }
			          else {
			         	if ($respuesta["color"] == 3)
			         		{ $color = "Verde"; }
			         	   else {
			         	  	if ($respuesta["color"] == 4)
			         		{ $color = "Azul"; }
			         	  }
			         	 }
			         	}

		
		echo '<form method="post">
		          <p class="text-muted">Editar la nota.</p>
		           <div class="input-group mb-3">            
		            <div class="input-group-prepend">
		                <span class="input-group-text">                 
		                  <i class="fa fa-th-large"></i>
		                </span>
		              </div>
		               <input type="text" class="form-control" placeholder="Nota" value="'.$respuesta["nota"].'" name="nota" required />
		               <input type="hidden" value="'.$nombreCampoID.'" name="nombreCampoID"/>
		               <input type="hidden" value="'.$tabla.'" name="tabla"/>
		               <input type="hidden" value="'.$valorID.'" name="valorID"/>
		               <input type="hidden" value="'.$idProyecto.'" name="idP"/>			               
		          </div>
		          <p class="text-muted"><h5>El color actual es: '.$color.'</h5></p>
		          <p class="text-muted">Elige un color para editar la nota.</p>
		          <div class="input-group mb-3"> 
		             <div class="form-group">';
		             	if ($respuesta["color"] == 1)
							{ 
						  echo '<div class="form-check">
				                  <input class="form-check-input" type="radio" name="color" value="1" checked>
				                  <label class="form-check-label">Amarillo</label>
				                </div>
								<div class="form-check">
				                  <input class="form-check-input" type="radio" name="color" value="2">
				                  <label class="form-check-label">Naranja</label>
				                </div>
				                <div class="form-check">
				                  <input class="form-check-input" type="radio" name="color" value="3">
				                  <label class="form-check-label">Verde</label>
				                </div>
				                <div class="form-check">
				                  <input class="form-check-input" type="radio" name="color" value="4">
				                  <label class="form-check-label">Azul</label>
				                </div>'; 
							}
								else { 
									if ($respuesta["color"] == 2)
									   {
							echo '<div class="form-check">
					                  <input class="form-check-input" type="radio" name="color" value="1">
					                  <label class="form-check-label">Amarillo</label>
					                </div>
									<div class="form-check">
					                  <input class="form-check-input" type="radio" name="color" value="2" checked>
					                  <label class="form-check-label">Naranja</label>
					                </div>
					                <div class="form-check">
					                  <input class="form-check-input" type="radio" name="color" value="3">
					                  <label class="form-check-label">Verde</label>
					                </div>
					                <div class="form-check">
					                  <input class="form-check-input" type="radio" name="color" value="4">
					                  <label class="form-check-label">Azul</label>
					                </div>'; 
									    }
							          else {
							         	if ($respuesta["color"] == 3)
							         		{ 
							      echo '<div class="form-check">
						                  <input class="form-check-input" type="radio" name="color" value="1">
						                  <label class="form-check-label">Amarillo</label>
						                </div>
										<div class="form-check">
						                  <input class="form-check-input" type="radio" name="color" value="2">
						                  <label class="form-check-label">Naranja</label>
						                </div>
						                <div class="form-check">
						                  <input class="form-check-input" type="radio" name="color" value="3" checked>
						                  <label class="form-check-label">Verde</label>
						                </div>
						                <div class="form-check">
						                  <input class="form-check-input" type="radio" name="color" value="4">
						                  <label class="form-check-label">Azul</label>
						                </div>'; 
							         		}
							         	   else {
							         	  	if ($respuesta["color"] == 4)
							         		{ 
							        echo '<div class="form-check">
							                  <input class="form-check-input" type="radio" name="color" value="1">
							                  <label class="form-check-label">Amarillo</label>
							                </div>
											<div class="form-check">
							                  <input class="form-check-input" type="radio" name="color" value="2">
							                  <label class="form-check-label">Naranja</label>
							                </div>
							                <div class="form-check">
							                  <input class="form-check-input" type="radio" name="color" value="3">
							                  <label class="form-check-label">Verde</label>
							                </div>
							                <div class="form-check">
							                  <input class="form-check-input" type="radio" name="color" value="4" checked>
							                  <label class="form-check-label">Azul</label>
							                </div>'; 
								         		 }
							         	  }
							         	 }
							         	}
		               echo '</div>           
				          </div>           
				          <input type="submit" class="btn btn-success btn-block" value="Editar Nota">
				        </form>';
	}

  }

/*=============================================
Editar nota del modelo de negocio
=============================================*/
static public function ctrEditarNotaMDN()
  {
	if(isset($_POST["color"]))
		{
		$ruta = ControladorRuta::ctrRuta();

	    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nota"]))
	    {
			$tabla = $_POST["tabla"];	
			$color = $_POST["color"];
			$nota = $_POST["nota"];
			$nombreCampoID = $_POST["nombreCampoID"];
			$idP = $_POST["idP"];
			$valorID = $_POST["valorID"];
			$respuesta = ModeloMDN::mdlEditarNotaMDN($tabla, $color, $nota, $nombreCampoID, $valorID);
			 if($respuesta == "ok")
					    {
					    $_SESSION["idPro"] = $idP;
					   	 echo '<script> 
								 window.location = "'.$ruta.'dashboardMDN"	
							  </script>';
						}
		}else{
			 $_SESSION["idPro"] = $idP;
			echo '<script>
				swal({
					type:"error",
					title: "¡CORREGIR!",
					text: "¡No se permiten caracteres especiales en ninguno de los campos!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
					if(result.value){
						 window.location = "'.$ruta.'dashboardMDN"
					}
				});	
			</script>';
			}
		}
	 }

/*=============================================
Editar la version del modelo de negocio
=============================================*/
static public function  ctrEditarVersionMDN()
  {
	if(isset($_POST["idPVersion"]))
		{
		$ruta = ControladorRuta::ctrRuta();
			$idP = $_POST["idPVersion"];
			$tabla = "modelodenegocio";
			$respuesta = ModeloMDN::mdlEditarVersionMDN($tabla, $idP);
			 if($respuesta == "ok")
			    {
			    $_SESSION["idPro"] = $idP;
				echo '<script>
						swal({
							type:"success",
						  	title: "¡OK!",
						  	text: "¡Versión actualizada!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"		  
							}).then(function(result){
							if(result.value){   
								   window.location = "'.$ruta.'dashboardMDN"
							} 
						});
					</script>';
			} else {
			 $_SESSION["idPro"] = $idP;
			echo '<script>
				swal({
					type:"error",
					title: "¡NO SE LOGRO!",
					text: "¡No se pudo guardar la versión, intente de nuevo!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
					if(result.value){
						 window.location = "'.$ruta.'dashboardMDN"
					}
				});	
			</script>';
			}
		}
	 }
/*============================================
	Eliminar Modelo de Negocio
 =============================================*/
static public function ctrEliminarMDN()
{
	if(isset($_POST["idProyecto"]))
		{		
		$ruta = ControladorRuta::ctrRuta();
		$tabla = "modelodenegocio";
		$idP = $_POST["idProyecto"];
		$respuesta = ModeloMDN::mdlEliminarMDN($tabla, $idP);
		 if($respuesta == "ok")
		  {
		   	 echo '<script> 
					 window.location = "'.$ruta.'proyectos"	
				  </script>';
			}
		
		}
		
	}
/*=============================================
Actualizar descargas en el modelo de negocio +1
=============================================*/
static public function  ctrDescargasMDN()
  {
	if(isset($_POST["idPDescargas"]))
	 {
	 	//$ruta = ControladorRuta::ctrRuta();
		$idP = $_POST["idPDescargas"];
		$tabla = "modelodenegocio";
		$respuesta = ModeloMDN::mdlDesacargasMDN($tabla, $idP);
	
		}
		
	 }

/*=============================================
Ver modelo de negocio para actualizar
=============================================*/
static public function ctrVerActualizarMDN()
  {
	if(isset($_POST["id"]))
		{
		$tabla = "modelodenegocio";
		$item = "idProyecto"; // la tabla
		$valor = $_POST["id"];   // el valor del id de la fila para editar
		$respuesta = ModeloMDN::mdlVerMDN($tabla, $item, $valor);
		$idProyecto = $respuesta["idProyecto"];

    echo '<form method="post">
          <p class="text-muted">Editar: El nombre del proyecto.</p>
          <div class="input-group mb-3">            
            <div class="input-group-prepend">
                <span class="input-group-text">                 
                  <i class="fa fa-th-large"></i>
                </span>
              </div>
              <input type="text" class="form-control" value="'.$respuesta["nombreProyecto"].'" placeholder="Nombre del Modelo de Negocio" name="nombrePro" required>
               <input type="hidden" value="'.$respuesta["idProyecto"].'" name="idPEditar">
          </div>
           <p class="text-muted">Editar: Para quién?, desarrollara este Modelo de Negocio.</p>
          <div class="input-group mb-3">            
            <div class="input-group-prepend">
                <span class="input-group-text">                 
                  <i class="fa fa-university"></i>
                </span>
              </div>
              <input type="text" class="form-control" value="'.$respuesta["paraQuien"].'" placeholder="Para quién?" name="paraQuien" required>
          </div>
          <p class="text-muted">Editar: El sector económico.</p>
           <div class="form-group mb-3">                            
                  <select class="form-control" placeholder="Sector Económico" name="sectorEconomico" required> 
                    <option>'.$respuesta["sectorEconomico"].'</option>              
                    <option>Agropecuario</option>
                    <option>Servicios</option>
                    <option>Industrial</option>
                    <option>Transporte</option>
                    <option>Comercio</option>
                    <option>Financiero</option>
                    <option>Construcción</option>
                    <option>Energético</option>
                    <option>Comunicaciones</option>
                    <option>Salud</option>
                    <option>Educación</option>
                    <option>Minería</option>
                    <option>Solidario</option>
                    <option>Tecnologías</option>
                    <option>Artesanías</option>
                    <option>Otro</option>
                  </select>
            </div>
          <input type="submit" class="btn btn-success btn-block" value="EDITAR MODELO DE NEGOCIO">
        </form>';	
   	 }
	}
/*=============================================
Editar modelo de negocio
=============================================*/
static public function ctrEditarMDN()
  {
	if(isset($_POST["nombrePro"]))
		{
		$ruta = ControladorRuta::ctrRuta();

	    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombrePro"]))
	    {
			$tabla = "modelodenegocio";
			$nombrePro = $_POST["nombrePro"];
			$idPEditar = $_POST["idPEditar"];
			$paraQuien = $_POST["paraQuien"];
			$sectorEconomico = $_POST["sectorEconomico"];
			$respuesta = ModeloMDN::mdlEditarMDN($tabla, $nombrePro, $idPEditar, $paraQuien, $sectorEconomico);
		 if($respuesta == "ok")
			{
			echo '<script>
					swal({
						type:"success",
					  	title: "¡OK!",
					  	text: "¡Modelo de negocio actualizado!",
					  	showConfirmButton: true,
						confirmButtonText: "Cerrar"		  
						}).then(function(result){
						if(result.value){   
							   window.location = "'.$ruta.'proyectos"
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
						 window.location = "'.$ruta.'proyectos"
					}
				});	
			</script>';
			}
		}
	 }
}