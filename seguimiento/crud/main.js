$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;

    fill_datatable();

    function fill_datatable(filter_gender = '') {

        tablaUsuarios = $('#tablaUsuarios').DataTable({
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
                        columns: [0, 1, 2, 5, 6]
                    },
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6]
                    },
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6]
                    },
                    text: '<i class="fas fa-print"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-light'
                },
            ],
            "ajax": {
                "url": "bd/crud.php",
                "method": 'POST', //usamos el metodo POST
                "data": {
                    opcion: opcion,
                    filter_gender: filter_gender

                }, //enviamos opcion 4 para que haga un SELECT
                "dataSrc": ""
            },
            "columns": [
                { "data": "id" },
                { "data": "nombre" },
                { "data": "agencia" },
                { "data": "departamento" },
                { "data": "puesto" },
                { "data": "ventas" },
                { "data": "anio" },
                { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
            ]
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
            $('#tablaUsuarios').DataTable().destroy();
            fill_datatable(filter_gender);
        } else {
            alert('Select Both filter option');
            $('#tablaUsuarios').DataTable().destroy();
            fill_datatable();
        }
    });

    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios').submit(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        username = $.trim($('#username').val());
        first_name = $.trim($('#first_name').val());
        last_name = $.trim($('#last_name').val());
        gender = $.trim($('#gender').val());
        password = $.trim($('#password').val());
        status = $.trim($('#status').val());
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            datatype: "json",
            data: { user_id: user_id, username: username, first_name: first_name, last_name: last_name, gender: gender, password: password, status: status, opcion: opcion },
            success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });



    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        user_id = null;
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Alta de Usuario");
        $('#modalCRUD').modal('show');
    });

    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        username = fila.find('td:eq(1)').text();
        first_name = fila.find('td:eq(2)').text();
        last_name = fila.find('td:eq(3)').text();
        gender = fila.find('td:eq(4)').text();
        password = fila.find('td:eq(5)').text();
        status = fila.find('td:eq(6)').text();
        $("#username").val(username);
        $("#first_name").val(first_name);
        $("#last_name").val(last_name);
        $("#gender").val(gender);
        $("#password").val(password);
        $("#status").val(status);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");
        $('#modalCRUD').modal('show');
    });

    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + user_id + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, user_id: user_id },
                success: function() {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

});