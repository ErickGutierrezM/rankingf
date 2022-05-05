<?php
include('database_connection.php');
// include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Agregar")
	{
		$statement = $connect->prepare("
			INSERT INTO ventas (nombre, agencia, departamento, puesto, ventas,anio,fecha) 
			VALUES (:nombre, :agencia, :departamento, :puesto, :ventas, :anio, :fecha)
		");
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':agencia'	=>	$_POST["agencia"],
				':departamento'	=>	$_POST["departamento"],
				':puesto'	=>	$_POST["puesto"],
				':ventas'	=>	$_POST["ventas"],
				//':mes'	=>	$_POST["mes"],
				':anio'	=>	$_POST["anio"],
				':fecha'	=>	$_POST["fecha"],
			)
		);
		if(!empty($result))
		{
			echo 'Datos agregados correctamente';
		}
	}
	if($_POST["operation"] == "Editar")
	{
		$statement = $connect->prepare(
			"UPDATE ventas 
			SET nombre = :nombre, agencia = :agencia, departamento = :departamento, puesto = :puesto, ventas = :ventas, anio  = :anio,  fecha  = :fecha
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':agencia'	=>	$_POST["agencia"],
				':departamento'	=>	$_POST["departamento"],
				':puesto'	=>	$_POST["puesto"],
				':ventas'	=>	$_POST["ventas"],
				//':mes'	=>	$_POST["mes"],
				':anio'	=>	$_POST["anio"],
				':fecha'	=>	$_POST["fecha"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Datos actualizados correctamente';
		}
	}
}

?>