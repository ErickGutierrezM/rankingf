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

    <title>Seguimiento Referidos Todos Somos Comerciales Vanguardia</title>


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
</head>

<body>
    <div class="container text-center p-4">
        <h2 class="text-center p-1">Seguimiento <span class="badge badge-danger p-2"><i class="fas fa-heart"></i>
                Referidos</span><span class="badge badge-light p-2">Vanguardia</span></h2>
    </div>
    <div class="container-fluid">
        <div class="col-xs-12 mx-auto pl-4 pr-4">

        <table id="order_data" class="table table-bordered table-striped dt-responsive nowrap" style="width: 100%;">
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
                                <label for="seguimiento">Seguimiento</label>
                                <textarea class="form-control" id="seguimiento" name="seguimiento" rows="3"></textarea>
                            </div>
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

$(document).on('change', '#category', function(){
  var category = $(this).val();
  $('#order_data').DataTable().destroy();
  if(category != '')
  {
   load_data(category);
  }
  else
  {
   load_data();
  }
 });
    $(document).on('submit', '#user_form', function(event) {
        event.preventDefault();
        var nombre = $('#nombre').val();
        var agencia = $('#agencia').val();
        var departamento = $('#departamento').val();
        var puesto = $('#puesto').val();
        var anio = $('#anio').val();
        var cliente = $('#cliente').val();
        var agenciaCliente = $('#agenciaCliente').val();
        var interes = $('#interes').val();
        var seguimiento = $('#seguimiento').val();

        if (nombre != '' && agencia != '' && departamento != '' && puesto != '' && anio != '' &&
            agenciaCliente != '' && interes != '' && seguimiento != '') {
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