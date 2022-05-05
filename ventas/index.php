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

    <title>Ventas Todos Somos Comerciales Vanguardia</title>


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    
    <style>
    body {
        margin: 0;
        padding: 0;
    }

    .box {
        width: 1280px;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 25px;
    }
    </style>


</head>

<body>
    <div class="container text-center p-4">
        <h2 class="text-center p-1"><span class="badge badge-danger p-2"><i class="fas fa-heart"></i> Ventas</span><span
                class="badge badge-light p-2">Vanguardia</span></h2>
    </div>
    <div class="container box">
        <div class="table-responsive">

            <div class="row p-3">
                
                <div class="input-daterange ">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="start_date" id="start_date" class="form-control" autocomplete="off"
                            placeholder="fecha inicio" />

                        <div class="input-group-prepend ml-2">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="end_date" id="end_date" class="form-control" autocomplete="off"
                            placeholder="fecha fin" />
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="button" name="search" id="search" value="Filtrar" class="btn btn-info" />
                    <button onClick="window.location.reload();" class="btn btn-outline-warning">Recargar</button>
                </div>
                <div align="right">
                        <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
                            class="btn btn-primary"><i class="fas fa-user-plus"></i>  Agregar colaborador</button>
                    </div>

                
            </div>
            
            <table id="order_data" class="table table-bordered table-striped" style="width: 100% !important;">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Agencia</th>
                        <th>Departamento</th>
                        <th>Puesto</th>
                        <th>Ventas</th>
                        <th>Año</th>
                        <th>fecha de venta</th>
                        <th style="width: 80px;">Acciones</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
    <div class="container mt-2">
        <div class="text-center">
        <h2 class="text-center p-1"><span class="badge badge-warning text-light p-2"><i class="fas fa-medal"></i> TOP 10</span><span class="badge badge-light p-2">Ventas Todos Somos Comerciales Vanguardia</span></h2> 
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center p-2">
        <div class="row">
        <form class="form-inline" action="ranking-ventas.php" method="get">
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
                    <?php //echo $mes; ?>
                </select>
            </div>-->
            <div class="form-group" align="center">
                <button type="submit" class="btn btn-success">ir al ranking <i class="fas fa-award"></i></button>
            </div>
        </form>
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
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Agencia</label>
                                <input type="text" name="agencia" id="agencia" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Departamento</label>
                                <input type="text" name="departamento" id="departamento" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Puesto</label>
                                <input type="text" name="puesto" id="puesto" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Ventas</label>
                                <input type="text" name="ventas" id="ventas" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Año</label>
                                <select class="form-control" name="anio" id="anio">
                                    <option selected disabled>Elegir Año</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha de venta</label>
                                <input class="form-control fecha" type="date" id="fecha" name="fecha">
                            </div>
                            <!-- <div class="form-group">
                                <label for="seguimiento">Seguimiento</label>
                                <textarea class="form-control" id="seguimiento" name="seguimiento" rows="3"></textarea>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id" />
                        <input type="hidden" name="operation" id="operation" />
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Agregar" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
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
            $('#action').val("Agregar");
            $('#operation').val("Agregar");
        });

    $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: "yyyy-mm-dd",
        autoclose: true
    });

    fetch_data('no');

    function fetch_data(is_date_search, start_date = '', end_date = '') {
        var dataTable = $('#order_data').DataTable({
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
            "ajax": {
                url: "fetch-prueba.php",
                type: "POST",
                data: {
                    is_date_search: is_date_search,
                    start_date: start_date,
                    end_date: end_date
                }
            }
        });
    }

    $('#search').click(function() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        if (start_date != '' && end_date != '') {
            $('#order_data').DataTable().destroy();
            fetch_data('yes', start_date, end_date);
        } else {
            alert("Ambas fechas son requeridas");
        }
    });

    $(document).on('submit', '#user_form', function(event) {
            event.preventDefault();
            var nombre = $('#nombre').val();
            var agencia = $('#agencia').val();
            var departamento = $('#departamento').val();
            var puesto = $('#puesto').val();
            var ventas = $('#ventas').val();
            //var mes = $('#mes').val();
            var anio = $('#anio').val();
            var fecha = $('#fecha').val();
            //var seguimiento = $('#seguimiento').val();

            if (nombre != '' && agencia != '' && departamento != '' && puesto != '' && ventas !=
                '' && anio != '' && fecha != '') {
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
                    $('#ventas').val(data.ventas);
                    $('#anio').val(data.anio);
                    $('#fecha').val(data.fecha);
                    // $('#seguimiento').val(data.seguimiento);
                    $('.modal-title').text("Editar Registro");
                    $('#user_id').val(user_id);
                    $('#action').val("Editar");
                    $('#operation').val("Editar");
                    //alert(data.fecha);
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