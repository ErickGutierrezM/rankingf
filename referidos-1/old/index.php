<?php

include('database_connection.php');

//$mes = '';
$query = "SELECT DISTINCT mes FROM usuarios ORDER BY mes ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
//foreach($result as $row)
//{
//$mes .= '<option value="'.$row['mes'].'">'.$row['mes'].'</option>';
//}

?>

<!doctype html>
<html lang="en">

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
    <script src="https://kit.fontawesome.com/1d7dc8a672.js" crossorigin="anonymous"></script>

    <title>Referidos Todos Somos Comerciales - Vanguardia</title>
</head>

<body>
  <!--  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="#">
    <img src="assets/images/logo.png" width="250" alt="">
  </a>
        </div>
    </nav>-->
    <div class="container text-center p-4">
    <h2 class="text-center p-1"><span class="badge badge-danger p-2"><i class="fas fa-heart"></i> Referidos</span><span class="badge badge-light p-2">Vanguardia</span></h2> 
    </div>
    <div class="container p-4">
        <div class="row">
            <!-- <div class="col-md-4"></div> -->
            <div class="col-md-9 form-inline" style="margin-bottom: 20px;">
                <div class="form-group pr-2">
                    <select name="filter_gender" id="filter_gender" class="form-control" required>
                        <option value="">Seleccionar Año</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
               <!-- <div class="form-group pr-2">
                    <select name="filter_country" id="filter_country" class="form-control" required>
                        <option value="">Seleccionar Mes</option>
                        <?php //echo $mes; ?>
                    </select>
                </div>-->
                <div class="form-group" align="center">
                    <button type="button" name="filter" id="filter" class="btn btn-primary"><i class="fas fa-filter"></i> Filtrar</button>
                </div>
            </div>
            <div class="col-md-3">
                <div align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
                        class="btn btn-primary"><i class="fas fa-user-plus"></i>  Agregar asesor</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="customer_data" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Agencia</th>
                        <th>Departamento</th>
                        <th>Puesto</th>
                        <th>Referidos</th>
                        <!--<th>Mes</th>-->
                        <th>Año</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
        <h2 class="text-center p-1"><span class="badge badge-warning text-light p-2"><i class="fas fa-medal"></i> TOP 10</span><span class="badge badge-light p-2">Referidos Todos Somos Comerciales Vanguardia</span></h2> 
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center p-2">
        <div class="row">
        <form class="form-inline" action="ranking-referidos.php" method="get">
            <div class="form-group pr-2">
                <select name="year" id="filter_gender" class="form-control" required>
                    <option value="">Seleccionar Año</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
            </div>
           <!-- <div class="form-group pr-2">
                <select name="month" id="filter_country" class="form-control " required>
                    <option value="">Seleccionar Mes</option>
                    <?php// echo $mes; ?>
                </select>
            </div>-->
            <div class="form-group" align="center">
                <button type="submit" class="btn btn-success">ir al ranking <i class="fas fa-award"></i></button>
            </div>
        </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="userModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" id="user_form" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Asesor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" />
                            <br />
                            <label>Agencia</label>
                            <input type="text" name="agencia" id="agencia" class="form-control" />
                            <br />
                            <label>Departamento</label>
                            <input type="text" name="departamento" id="departamento" class="form-control" />
                            <br />
                            <label>Puesto</label>
                            <input type="text" name="puesto" id="puesto" class="form-control" />
                            <br />
                            <label>Referidos</label>
                            <input type="text" name="referidos" id="referidos" class="form-control" />
                            <br />
                           <!-- <label>Mes</label>
                            <select class="form-control" name="mes" id="mes">
                                <option selected disabled>Elgir mes</option>
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                            <br />-->
                            <label>Año</label>
                            <select class="form-control" name="anio" id="anio">
                                <option selected disabled>Elgir Año</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                            <br />

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id" />
                        <input type="hidden" name="operation" id="operation" />
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



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

    <!-- para usar botones en datatables JS -->
    <script src="datatables/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-2.0.0/js/buttons.html5.min.js"></script>




    <script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $('#add_button').click(function() {
            $('#user_form')[0].reset();
            $('.modal-title').text("Agregar asesor");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        fill_datatable();

        function fill_datatable(filter_gender = '', filter_country = '') {
            var dataTable = $('#customer_data').DataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "sProcessing": "Procesando...",
                },
                responsive: 'true',
                dom: 'Bfrtilp',
                buttons: [{
                    
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 5 , 6 ]
                        },
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 5 , 6 ]
                        },
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 5 , 6]
                        },
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-light'
                    },
                ],
                "processing": true,
                "serverSide": true,
                "order": [],
                "searching": false,
                "ajax": {
                    url: "fetch.php",
                    type: "POST",
                    data: {
                        filter_gender: filter_gender,
                        filter_country: filter_country
                    }
                }
            });
        }

        $('#filter').click(function() {
            var filter_gender = $('#filter_gender').val();
            //var filter_country = $('#filter_country').val();
           // if (filter_gender != '' && filter_country != '') {
              //  $('#customer_data').DataTable().destroy();
              //  fill_datatable(filter_gender, filter_country);
           // } 
            
            if (filter_gender != '') {
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_gender);
            } else {
                alert('Select Both filter option');
                $('#customer_data').DataTable().destroy();
                fill_datatable();
            }
        });
        $(document).on('submit', '#user_form', function(event) {
            event.preventDefault();
            var nombre = $('#nombre').val();
            var agencia = $('#agencia').val();
            var departamento = $('#departamento').val();
            var puesto = $('#puesto').val();
            var referidos = $('#referidos').val();
            //var mes = $('#mes').val();
            var anio = $('#anio').val();

            if (nombre != '' && agencia != '' && departamento != '' && puesto != '' && referidos !=
                '' &&
                mes != '' && anio != '') {
                $.ajax({
                    url: "insert.php",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data);
                        $('#user_form')[0].reset();
                        $('#userModal').modal('hide');
                        window.location.reload();
                    }
                });
            } else {
                alert("Los campos son requeridos");
            }
        });

        $(document).on('click', '.update', function() {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "fetch_single.php",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    $('#userModal').modal('show');
                    $('#nombre').val(data.nombre);
                    $('#agencia').val(data.agencia);
                    $('#departamento').val(data.departamento);
                    $('#puesto').val(data.puesto);
                    $('#referidos').val(data.referidos);
                    //$('#mes').val(data.mes);
                    $('#anio').val(data.anio);
                    $('.modal-title').text("Edit User");
                    $('#user_id').val(user_id);
                    $('#action').val("Edit");
                    $('#operation').val("Edit");
                }
            })
        });

        $(document).on('click', '.delete', function() {
            var user_id = $(this).attr("id");
            if (confirm("¿Estás seguro de que quieres eliminar esto?")) {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        user_id: user_id
                    },
                    success: function(data) {
                        alert(data);
                        // dataTable.ajax.reload();
                        window.location.reload();
                    }
                });
            } else {
                return false;
            }
        });


    });
    </script>
</body>

</html>