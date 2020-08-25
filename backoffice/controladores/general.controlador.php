<?php

class ControladorGeneral{

	//Ruta de regreso a inicio

	static public function ctrRutaInicio(){

		return "http://localhost/Dropbox/Modelo-Negocio/";

	}

	static public function ctrRuta(){

		return "http://localhost/Dropbox/Modelo-Negocio/backoffice/";

	}

	static public function ctrValorSuscripcion(){

		return 10;

	}
	
	static public function ctrPatrocinador(){

		return "modelo-de-negocio";

	}

	static public function ctrRedesSociales(){

		return '<span class="float-right text-muted">        
		              <a href="https://www.facebook.com/ModeloDeNegocio/" target="_black"><img src="vistas/img/inicio/iconFacebook.png" width="36" height="36"></a>
		              <a href="https://www.instagram.com/modelodenegocioapp/" target="_black"><img src="vistas/img/inicio/iconInstagram.png" width="36" height="36"></a>
		              <a href="https://www.youtube.com/channel/UCBQCJlK4ON1b0PjbHO-ZOGw/featured" target="_black"><img src="vistas/img/inicio/iconYoutube.png" width="36" height="36"></a>   
                </span>';

	}
}