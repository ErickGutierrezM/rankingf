<?php
  $host_name = 'db5001572668.hosting-data.io';
  $database = 'dbs1311113';
  $user_name = 'dbu1462944';
  $password = 'Galleta#2021MKT%';

  $conexion = new mysqli($host_name, $user_name, $password, $database);

  if ($conexion->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $conexion->connect_error .'</p>');
  }
?>