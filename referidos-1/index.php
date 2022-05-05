<?php 
$connect = mysqli_connect("db5004754274.hosting-data.io", "dbu1436247", "GalletaMKT77%2021", "dbs3985634");
$query = "SELECT * FROM agencia ORDER BY nombre_agencia ASC";
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

    <style>
    body {
        margin: 0;
        padding: 0;
    }

    /* .box {
        width: 1500px !important;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 25px;
    } */
    .formulario__label{
        display: block;
        font-weight: 700;
        padding: 10px;
        cursor: pointer;
    }
    .formulario__grupo-input{
        position: relative;
    }
    .form-control{
        background: #fff !important;
        border: 3px solid #f0f0f0;
        border-radius: 3px;
        transition: .3s ease all;
        padding: 0 40px 0 10px;
    }
    .form-control:focus{
        border: 3px solid #0075ff;
        outline: none;
        box-shadow: 3px 0px 30px rgba(163, 163, 163, 0.4);
    }
   
    .formulario__input-error{
        font-size: 12px;
        margin-bottom: 0;
        display: none;
    }
    .formulario__input-error-activo{
        display: block;
    }
    .formulario__validacion-estado{
        position: absolute;
        right: 10px;
        top: 10px;
        z-index: 100;
        font-size: 16px;
        opacity: 0;
    }
    .formulario__mensaje{
        height: 45px;
        line-height: 45px;
        background: #f66060;
        padding: 0 15px;
        border-radius: 3px;
        display: none;
    }
    .formulario__mensaje-activo{
        display: block;
    }
    .form-group-correcto .formulario__validacion-estado{
    color: #1ed12d;
    opacity: 1;
    }
    .form-group-incorrecto .formulario__label{
    color: #bb2929;
    }
    .form-group-incorrecto .formulario__validacion-estado{
    color: #bb2929;
    opacity: 1;
    }
    .form-group-incorrecto .form-control{
        border: 3px solid #bb2929;
    }
    tbody td{
        font-size: 11px;
    }

    </style>


</head>

<body>
    <div class="container text-center p-4">
        <h2 class="text-center p-1"><span class="badge badge-danger p-2"><i class="fas fa-heart"></i>
                Referidos</span><span class="badge badge-light p-2">Vanguardia</span>
        </h2>
    </div>
    <div class="container-fluid">
        <div class="col-xs-12 mx-auto pl-4 pr-4">
            <div class="row p-3">

                <div class="ml-auto" align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
                        class="btn btn-primary"><i class="fas fa-user-plus"></i> Agregar asesor</button>
                </div>


            </div>

            <table id="order_data" class="table table-bordered table-striped dt-responsive nowrap" style="width: 100% !important;">
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
    </div>
    <div class="container mt-2" style="display: none;">
        <div class="text-center">
            <h2 class="text-center p-1"><span class="badge badge-warning text-light p-2"><i class="fas fa-medal"></i>
                    TOP 10</span><span class="badge badge-light p-2">Referidos Todos Somos Comerciales Vanguardia</span>
            </h2>
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center p-2" style="display: none;">
        <div class="row" style="display: none;">
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
                    <?php //echo $mes; ?>
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
            <form method="post" id="user_form" class="user_form" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4 class="text-center" style="text-transform: capitalize;">informacion de referidor</h4>
                        <div class="form-group" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" name="nombre" id="nombre" class="form-control" />
                                <i class="far fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error">El nombre solo puede contener letras.</p>
                        </div>
                        <div class="form-group">
                            <label for="agencia" class="formulario__label">Agencia</label>
                            <select name="agencia" id="agencia" class="form-control">
                                <option selected>Elegir agencia</option>
                                <?php 
                                $connect = mysqli_connect("db5004754274.hosting-data.io", "dbu1436247", "GalletaMKT77%2021", "dbs3985634");
                                $query = "SELECT * FROM agencia ORDER BY nombre_agencia ASC";
                                $result = mysqli_query($connect, $query);
                                while($row = mysqli_fetch_array($result))
                                {
                                echo '<option value="'.$row["agencia_id"].'">'.$row["nombre_agencia"].'</option>';
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group" id="grupo__departamento">
                            <label for="departamento" class="formulario__label">Departamento</label>
                            <div class="formulario__grupo-input">
                                <input type="text" name="departamento" id="departamento" class="form-control" />
                                <i class="far fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error">El departamento solo puede contener letras.</p>
                        </div>

                        <div class="form-group" id="grupo__puesto">
                            <label for="puesto" class="formulario__label">Puesto</label>
                            <div class="formulario__grupo-input">
                            <input type="text" name="puesto" id="puesto" class="form-control" />
                                <i class="far fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error">El puesto solo puede contener letras.</p>
                        </div>

                        <div class="form-group">
                            <label for="anio" class="formulario__label">Año</label>
                            <select class="form-control" name="anio" id="anio">
                                <option selected disabled>Elegir Año</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="registro" class="formulario__label">Fecha de registro</label>
                            <input type="date" name="registro" id="registro" class="form-control" />
                        </div>

                        <h4 class="text-center" style="text-transform: capitalize;">informacion de cliente referido</h4>
                        <div class="form-group" id="grupo__cliente">
                            <label for="cliente" class="formulario__label">Cliente</label>
                            <div class="formulario__grupo-input">
                            <input type="text" name="cliente" id="cliente" class="form-control" />
                                <i class="far fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error">El nombre del cliente solo puede contener letras.</p>
                        </div>

                        <div class="form-group" id="grupo__agencia-cliente">
                            <label for="agenciaCliente" class="formulario__label">Agencia</label>
                            <div class="formulario__grupo-input">
                            <input type="text" name="agenciaCliente" id="agenciaCliente" class="form-control" />
                                <i class="far fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error">El nombre de la agencia solo puede contener letras.</p>
                        </div>

                        <div class="form-group">
                            <label for="interes" class="formulario__label">Auto de intéres</label>
                            <input type="text" name="interes" id="interes" class="form-control" />
                        </div>

                        <div class="form-group" id="grupo__seguimiento">
                            <label for="seguimiento" class="formulario__label">Seguimiento</label>
                            <div class="formulario__grupo-input">
                            <input class="form-control" id="seguimiento" name="seguimiento"></input>
                                <i class="far fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error">El texto redactado solamente debe contener letras, espacios y puntos.</p>
                        </div>
                        <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> por favor llenar todos los campos</p>
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
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

<script src="js/formulario.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>



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

    load_data();

    function load_data(is_category) {
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
                        columns: [0, 1, 2, 5, 6, 7, 8]
                    },
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8]
                    },
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8]
                    },
                    text: '<i class="fas fa-print"></i>',
                    titleAttr: 'Imprimir Archivo',
                    className: 'btn btn-light'
                },
            ],
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "fetch.php",
                type: "POST",
                data: {
                    is_category: is_category
                }
            },
            "columnDefs": [{
                "targets": [1],
                "orderable": false,
                
            }, ],
        });
    }

    $(document).on('change', '#category', function() {
        var category = $(this).val();
        $('#order_data').DataTable().destroy();
        if (category != '') {
            load_data(category);
        } else {
            load_data();
        }
    });
    $(document).on('submit', '#user_form', function(event) {
        event.preventDefault();
        var nombre = $('#nombre').val();
        var agencia = $('#agencia').val();
        var departamento = $('#departamento').val();
        var puesto = $('#puesto').val();
        var registro = $('#registro').val();
        //var mes = $('#mes').val();
        //  var anio = $('#anio').val();
        var cliente = $('#cliente').val();
        var agenciaCliente = $('#agenciaCliente').val();
        var interes = $('#interes').val();
        var seguimiento = $('#seguimiento').val();

        if (nombre != '' && agencia != '' && departamento != '' && puesto != '' && registro !=
            '' && cliente !=
            '' && agenciaCliente != '' && interes != '' && seguimiento != '') {
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
                $('#registro').val(data.registro);
                //$('#mes').val(data.mes);
                // $('#anio').val(data.anio);
                $('#cliente').val(data.cliente);
                $('#agenciaCliente').val(data.agenciaCliente);
                $('#interes').val(data.interes);
                $('#seguimiento').val(data.seguimiento);
                $('.modal-title').text("Editar Registro");
                $('#user_id').val(user_id);
                $('#action').val("Editar");
                $('#operation').val("Editar");
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