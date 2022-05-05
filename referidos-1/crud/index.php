<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Ventas Todos Somos Comerciales Vanguardia</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.11.0/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  

      <!--FONTAWESOME-->
    <script src="https://kit.fontawesome.com/1d7dc8a672.js" crossorigin="anonymous"></script>
  </head>
    
  <body> 
     <header>
     <h3 class='text-center'></h3>
     </header>    
       
    <br>  

    <div class="container caja">
        <div class="row">
        <div class="col-md-9 form-inline" style="margin-bottom: 20px;">
                <div class="form-group pr-2">
                    <select name="filter_gender" id="filter_gender" class="form-control" required>
                        <option value="">Seleccionar Año</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
              <!--  <div class="form-group pr-2">
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
                <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>   
                </div>
            </div>
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Agencia</th>                                
                            <th>Departamento</th>  
                            <th>Puesto</th>
                            <th>Ventas</th>
                            <th>Year</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">User Name:</label>
                    <input type="text" class="form-control" id="username">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Gender</label>
                    <input type="text" class="form-control" id="gender">
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                        <label for="" class="col-form-label">Password</label>
                        <input type="text" class="form-control" id="password">
                        </div>
                    </div>    
                    <div class="col-lg-3">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Status</label>
                        <input type="number" class="form-control" id="status">
                        </div>            
                    </div>    
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>  
            <!-- para usar botones en datatables JS -->
    <script src="assets/datatables/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="assets/datatables/Buttons-2.0.0/js/buttons.html5.min.js"></script>  
     
    <script type="text/javascript" src="main.js"></script>  


    
    
  </body>
</html>
