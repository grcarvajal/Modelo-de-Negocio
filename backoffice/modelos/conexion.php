<?php
/**
@grcarvajal grcarvajal@gmail.com **Gildardo Restrepo Carvajal**
28/04/2020 ventas suscripcion
 */
class Conexion
{
	
	static function conectar()
	{
		$link = new PDO("mysql:host=localhost;dbname=mdn-proyectostic",
						"root",
						"");

		$link->exec("set names utf8");

		return $link;
	}
}