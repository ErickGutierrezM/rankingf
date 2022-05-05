<?php
include('database_connection.php');
// include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connect->prepare("
			INSERT INTO usuarios (nombre, agencia, departamento, puesto, referidos, anio) 
			VALUES (:nombre, :agencia, :departamento, :puesto, :referidos, :anio)
		");
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':agencia'	=>	$_POST["agencia"],
				':departamento'	=>	$_POST["departamento"],
				':puesto'	=>	$_POST["puesto"],
				':referidos'	=>	$_POST["referidos"],
				//':mes'	=>	$_POST["mes"],
				':anio'	=>	$_POST["anio"]
			)
		);
		if(!empty($result))
		{
			echo 'Datos agregados correctamente';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		// $image = '';
		// if($_FILES["user_image"]["name"] != '')
		// {
		// 	$image = upload_image();
		// }
		// else
		// {
		// 	$image = $_POST["hidden_user_image"];
		// }
		$statement = $connect->prepare(
			"UPDATE usuarios 
			SET nombre = :nombre, agencia = :agencia, departamento = :departamento, puesto = :puesto, referidos = :referidos, anio  = :anio  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':agencia'	=>	$_POST["agencia"],
				':departamento'	=>	$_POST["departamento"],
				':puesto'	=>	$_POST["puesto"],
				':referidos'	=>	$_POST["referidos"],
				//':mes'	=>	$_POST["mes"],
				':anio'	=>	$_POST["anio"],
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