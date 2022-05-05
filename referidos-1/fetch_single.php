<?php
include('database_connection.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connect->prepare(
		"SELECT * FROM usuarios
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nombre"] = $row["nombre"];
		$output["agencia"] = $row["agencia"];
		$output["departamento"] = $row["departamento"];
		$output["puesto"] = $row["puesto"];
		//$output["referidos"] = $row["referidos"];
		//$output["mes"] = $row["mes"];
		//$output["anio"] = $row["anio"];
		$output["cliente"] = $row["cliente"];
		$output["registro"] = $row["registro"];
		$output["agenciaCliente"] = $row["agenciaCliente"];
		$output["interes"] = $row["interes"];
		$output["seguimiento"] = $row["seguimiento"];
	}
	echo json_encode($output);
}
?>