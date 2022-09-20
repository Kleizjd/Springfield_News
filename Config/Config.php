<?php
	// $arrUrl = explode("/", $url);
	// $last = array_pop($arrUrl);
	// const BASE_URL = implode("/", $arrUrl);
	// BASE_URL =  "http://" . dirname(__DIR__) . "/www/coffe_garden";
	// BASE_URL =  "http://" . $_SERVER["HTTP_HOST"] . "/www/coffe_garden";
// URL ABSOLUTA DE LA APLICACIÓN
define("BASE_URL", "http://" . $_SERVER["HTTP_HOST"] . "/" . str_replace("C:/xampp/htdocs/", "", str_replace("\\", "/", "/www/Springfield_News")));
    // const BASE_URL = "http://localhost/www/coffee_garden";

	const MEDIA = "/public";

	//Zona horaria
	date_default_timezone_set('America/Bogota');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "springfield";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";
	const activeSession = 10000000;
	//Para envío de correo
	const ENVIRONMENT = 1; // Local: 0, Produccón: 1;

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "$";
	const CURRENCY = "USD";

