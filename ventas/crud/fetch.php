<?php

include('database_connection.php');

$column = array('nombre', 'agencia', 'departamento', 'puesto','ventas' , 'anio' );

$query = "
SELECT * FROM ventas
";

//if(isset($_POST['filter_gender'], $_POST['filter_country']) && $_POST['filter_gender'] != '' && $_POST['filter_country'] != '')
if(isset($_POST['filter_gender']) && $_POST['filter_gender'] != '')

{
 //$query .= '
 //WHERE anio = "'.$_POST['filter_gender'].'" AND mes = "'.$_POST['filter_country'].'" 
//';
 $query .= '
 WHERE anio = "'.$_POST['filter_gender'].'"
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY ventas desc ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
 $sub_array = array();

 $sub_array[] = $row['nombre'];
 $sub_array[] = $row['agencia'];
 $sub_array[] = $row['departamento'];
 $sub_array[] = $row['puesto'];
 $sub_array[] = $row['ventas'];
//$sub_array[] = $row['mes'];
 $sub_array[] = $row['anio'];
 $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-primary btn-md update" style="margin-right:10px;"><i class="fas fa-user-edit"></i></button>' . '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-md delete"><i class="fas fa-trash"></i></button>';


 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM ventas";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
// "recordsTotal"   =>  count_all_data($connect),
"recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);



echo json_encode($output);

?>