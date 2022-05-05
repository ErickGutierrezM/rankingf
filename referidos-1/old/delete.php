<?php

include('database_connection.php');
include("function.php");

if(isset($_POST["user_id"]))
{
	$statement = $connect->prepare(
		"DELETE FROM usuarios WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Datos eliminados correctamente';
	}
}



?>