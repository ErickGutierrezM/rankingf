<?php
//fetch.php
$connect = mysqli_connect("db5004754274.hosting-data.io", "dbu1436247", "GalletaMKT77%2021", "dbs3985634");
$columns = array('nombre', 'agencia', 'departamento', 'puesto', 'cliente','registro' ,'agenciaCliente', 'interes','seguimiento', 'created_at');

$query = "SELECT * FROM usuarios WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'created_at BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR nombre LIKE "%'.$_POST["search"]["value"].'%" 
  OR agencia LIKE "%'.$_POST["search"]["value"].'%" 
  OR departamento LIKE "%'.$_POST["search"]["value"].'%"
  OR puesto LIKE "%'.$_POST["search"]["value"].'%"
  OR cliente LIKE "%'.$_POST["search"]["value"].'%"
  OR registro LIKE "%'.$_POST["search"]["value"].'%"
  OR agenciaCliente LIKE "%'.$_POST["search"]["value"].'%"
  OR interes LIKE "%'.$_POST["search"]["value"].'%"
  OR created_at LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY created_at desc ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();

 $sub_array[] = $row['nombre'];
 $sub_array[] = $row['agencia'];
 $sub_array[] = $row['departamento'];
 $sub_array[] = $row['puesto'];
 $sub_array[] = $row['registro'];

 // $sub_array[] = $row['anio'];
 $sub_array[] = $row['cliente'];
 $sub_array[] = $row['agenciaCliente'];
 $sub_array[] = $row['interes'];
 $sub_array[] = $row['seguimiento'];
 $sub_array[] = $row['created_at'];
 $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-primary btn-md update" style="margin-right:10px;"><i class="fas fa-user-edit"></i></button>' . '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-md delete"><i class="fas fa-trash"></i></button>';

 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM usuarios";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>