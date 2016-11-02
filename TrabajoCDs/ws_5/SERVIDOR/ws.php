<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../AccesoDatos.php');
	require_once('../Cd.php');
	
	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Con PDO', 'urn:wsPdo'); 

		$server->wsdl->addComplexType(
									'cd',
									'complexType',
									'struct',
									'all',
									'',
									array('Nombre' => array('name' => 'Nombre', 'type' => 'xsd:string'),
										  'Titulo' => array('name' => 'Titulo', 'type' => 'xsd:string'),
										  'Ano'    => array('name' => 'Ano', 'type' => 'xsd:int')
										 )
								);

///**********************************************************************************************************///								
//REGISTRO METODO SIN PARAMETRO DE ENTRADA Y PARAMETRO DE SALIDA 'ARRAY de ARRAYS'
	$server->register('ObtenerTodosLosCds',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ObtenerTodosLosCds',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene todos los Cds de la Base de Datos'    			
					);

	$server->register('IngresarUnCd',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#IngresarUnCd',             
						'rpc',                        		
						'encoded',                    		
						'Ingresa un CD'    			
					);


	function ObtenerTodosLosCds() {
		
		return Cd::TraerTodos();
	}

	function IngresarUnCd($cd) {
		
		$elcd = new Cd();

		$elcd->interpret = $cd['Nombre'];
		$elcd->titel     = $cd['Titulo'];
		$elcd->jhar      = $cd['Ano'];

		return Cd::IngresarCD($elcd);


	}
///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);
