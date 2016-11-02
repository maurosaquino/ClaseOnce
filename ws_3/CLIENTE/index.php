<html>
<head>
	<title>WEB SERVICE TEST</title>
	  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--final de Estilos-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
	<div class="container">
	  	<div class="page-header">
        </div>
		<div class="page-header" align="center">
			<h1>WEB SERVICE #3</h1>      
		</div>
		<div>
			<form action="index.php" method="post" >
				<input type="text" placeholder="Ingrese un n&uacute;mero FLOTANTE" name="txtNumero1" style="width:250px" />
				<br/>
				<input type="text" placeholder="Ingrese otro n&uacute;mero FLOTANTE" name="txtNumero2" style="width:250px" />
				<br/>
				<input type="submit" value="Sumar n&uacute;meros" />
			</form>
		</div>
	<?php
	if(isset($_POST['txtNumero1']) && isset($_POST['txtNumero2'])){

		require_once('../lib/nusoap.php');

		$host = 'http://localhost:8080/ClaseOnce/ws_3/SERVIDOR/testWS.php';
		
		$client = new nusoap_client($host . '?wsdl');
		
		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}

		$result = $client->call('Sumar', array($_POST["txtNumero1"], $_POST["txtNumero2"]));

		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($result);
			echo '</pre>';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {
				echo '<h2>Resultado</h2>';
				echo '<pre>' . $result . '</pre>';
			}
		}
	}
	?>
	</div>
</body>
</html>