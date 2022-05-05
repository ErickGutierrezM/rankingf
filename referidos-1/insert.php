<?php
include('database_connection.php');
// include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Agregar")
	{
		$statement = $connect->prepare("
			INSERT INTO usuarios (nombre, agencia, departamento, puesto, cliente,registro,agenciaCliente,interes,seguimiento) 
			VALUES (:nombre, :agencia, :departamento, :puesto, :cliente,:registro, :agenciaCliente, :interes, :seguimiento)");
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':agencia'	=>	$_POST["agencia"],
				':departamento'	=>	$_POST["departamento"],
				':puesto'	=>	$_POST["puesto"],
				//':mes'	=>	$_POST["mes"],
				//':anio'	=>	$_POST["anio"],
				':cliente' => $_POST["cliente"],
				':registro'	=>	$_POST["registro"],
				':agenciaCliente' => $_POST["agenciaCliente"],
				':interes' => $_POST["interes"],
				':seguimiento'	=>	$_POST["seguimiento"],
			)
		);
		if(!empty($result))
		{
			echo 'Datos agregados correctamente';
		}
	}
	if($_POST["operation"] == "Editar")
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
			SET nombre = :nombre, agencia = :agencia, departamento = :departamento, puesto = :puesto, cliente = :cliente, registro = :registro, agenciaCliente = :agenciaCliente, interes = :interes , seguimiento  = :seguimiento 
			WHERE id = :id"
		);
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':agencia'	=>	$_POST["agencia"],
				':departamento'	=>	$_POST["departamento"],
				':puesto'	=>	$_POST["puesto"],
				//':mes'	=>	$_POST["mes"],
				//':anio'	=>	$_POST["anio"],
				':cliente'	=>	$_POST["cliente"],
				':registro'	=>	$_POST["registro"],
				':agenciaCliente'	=>	$_POST["agenciaCliente"],
				':interes'	=>	$_POST["interes"],
				':seguimiento'	=>	$_POST["seguimiento"],
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