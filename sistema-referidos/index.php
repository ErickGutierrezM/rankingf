<?php 
$connect = mysqli_connect("db5004754274.hosting-data.io", "dbu1436247", "GalletaMKT77%2021", "dbs3985634");
$query = "SELECT * FROM category ORDER BY category_name ASC";
$result = mysqli_query($connect, $query);
?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--DATATABLES-->

    <!--datables CSS básico-->
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.11.0/css/dataTables.bootstrap4.min.css">

    <!--FONTAWESOME-->
    <script src="https://kit.fontawesome.com/88f4b8bc1d.js" crossorigin="anonymous"></script>

    <title>Referidos Todos Somos Comerciales Vanguardia</title>


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

</head>
 <body>
  <div class="container">
  <div class="row p-3">

<div class="ml-auto" align="right">
    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
        class="btn btn-primary"><i class="fas fa-user-plus"></i> Agregar asesor</button>
</div>


</div>
   

    <table id="product_data" class="table table-bordered table-striped dt-responsive nowrap" style="width: 100%;">
    <thead>
                    <tr>
                        <th>Colaborador</th>
                        <th> <select name="category" id="category" class="form-control">
                                <option value="">Agencia</option>
                                <?php 
                                while($row = mysqli_fetch_array($result))
                                {
                                echo '<option value="'.$row["agencia_id"].'">'.$row["nombre_agencia"].'</option>';
                                }
                                ?>
                            </select></th>
                        <th>Departamento</th>
                        <th>Puesto</th>
                        <th>Fecha del registro</th>
                        <!-- <th>Referidos</th> -->
                        <th>Prospecto referido</th>
                        <th>Empresa que atiende</th>
                        <th style="width: 60px;">Intéres</th>
                        <th>Seguimiento</th>
                        <th style="width: 60px;">Ultimo seguimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
    </table>
   
  </div>
 </body>
</html>
<!-- Optional JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
    integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>
<script type="text/javascript" src="datatables/datatables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 load_data();

 function load_data(is_category)
 {
  var dataTable = $('#product_data').DataTable({
   "processing":true,
   "serverSide":true,
   "order":[],
   "ajax":{
    url:"fetch.php",
    type:"POST",
    data:{is_category:is_category}
   },
   "columnDefs":[
    {
     "targets":[2],
     "orderable":false,
    },
   ],
  });
 }

 $(document).on('change', '#category', function(){
  var category = $(this).val();
  $('#product_data').DataTable().destroy();
  if(category != '')
  {
   load_data(category);
  }
  else
  {
   load_data();
  }
 });
});
</script>
