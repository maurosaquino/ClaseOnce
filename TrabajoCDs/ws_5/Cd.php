<?php
class Cd
{
	public $id;
	public $interpret;
	public $jahr;
	public $titel;
	
	public static function TraerTodos()
	{
		

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT id, interpret, jahr, titel
				FROM cds";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		return $consulta->fetchall();
		
	}


	public static function IngresarCD($cd)
	{
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

		$consulta =$objetoAccesoDato->RetornarConsulta('INSERT INTO cds (titel, interpret, jahr) VALUES (:titulo,:interprete,:ano)');
		$consulta->bindValue(':titulo',		  $cd->titel, PDO::PARAM_INT);
		$consulta->bindValue(':interprete',   $cd->interpret, PDO::PARAM_INT);
		$consulta->bindValue(':ano',   		  $cd->jhar, PDO::PARAM_INT);
		$consulta->execute();
		return "Ingresado";

		
	}
}