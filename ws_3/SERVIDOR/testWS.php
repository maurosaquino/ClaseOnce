<?php 
	require_once('../lib/nusoap.php'); 
	
	$server = new nusoap_server(); 

	$server->configureWSDL('Mi Web Service #3', 'urn:testWS'); 
	
	$server->register('Sumar',                				// METODO
				array('numero1' => 'xsd:float', 			// PARAMETROS DE ENTRADA
					  'numero2' => 'xsd:float'),  			
				array('return' => 'xsd:float'),    			// PARAMETROS DE SALIDA
				'urn:testWS',                				// NAMESPACE
				'urn:testWS#Sumar',           				// ACCION SOAP
				'rpc',                        				// ESTILO
				'encoded',                    				// CODIFICADO
				'Obtiene la suma de dos n&uacute;meros'    	// DOCUMENTACION
			);

	function Sumar($numero1, $numero2) {
	 
		return ($numero1 + $numero2);
	}

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");
	$server->service($HTTP_RAW_POST_DATA);
