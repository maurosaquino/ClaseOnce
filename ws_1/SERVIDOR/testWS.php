<?php 
///***********************************************************************************************///
///COMO PROVEEDOR DEL SERVICIO WEB///
///***********************************************************************************************///

//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
	require_once('../lib/nusoap.php'); 
	
//2.- CREAMOS LA INSTACIA AL SERVIDOR
	$server = new nusoap_server(); 

//3.- INICIALIZAMOS EL SOPORTE WSDL (Web Service Description Language)
	$server->configureWSDL('Mi Web Service #1', 'urn:testWS'); 
	//urn (Uniform Resource Name) ES EL NOMBRE DEL RECURSO CON QUE VA A SER ACCESADO EL WEB SERVICE
	
//4.- REGISTRAMOS EL METODO A EXPONER
	$server->register('Saludar',                	// METODO
				array(),  							// PARAMETROS DE ENTRADA
				array('return' => 'xsd:string'),    // PARAMETROS DE SALIDA
				'urn:testWS',                		// NAMESPACE
				'urn:testWS#Saludar',               // ACCION SOAP
				'rpc',                        		// ESTILO
				'encoded',                    		// CODIFICADO
				'Saluda al mundo'    				// DOCUMENTACION
				);

//5.- DEFINIMOS EL METODO COMO UNA FUNCION PHP
	function Saludar() {

		return 'Hola mundo!!!';
	}

//6.- USAMOS EL PEDIDO PARA INVOCAR EL SERVICIO
	$HTTP_RAW_POST_DATA = file_get_contents("php://input");
	//http://php.net/manual/es/wrappers.php.php#wrappers.php.input
	
	$server->service($HTTP_RAW_POST_DATA);