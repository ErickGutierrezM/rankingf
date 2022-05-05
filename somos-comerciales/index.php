<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>



    <title>Referidos colaboradores - Grupo Vanguardia</title>
</head>

<body>

    <div class="container">
        <section class="page-section" style="padding-top: 0;" id="contactanos">
            <h2 class="text-center">Para referir a un cliente por favor usa este formulario</h2>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <form action="" method="POST" id="formContacto">
                            <div class="form-group">
                                <label for="formNombreEmp">Nombre del empleado*</label>
                                <input type="text" class="form-control" name="formNombreEmp" id="formNombreEmp">
                                <span id="formNombreEmp_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formNombre">Número del empleado*</label>
                                <input type="text" class="form-control" name="formNumero" id="formNumero">
                                <span id="formNumero_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formNombre">Teléfono del empleado*</label>
                                <input type="tel" class="form-control" name="formTelefono" id="formTelefono">
                                <span id="formTelefono_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formEmail">Correo electrónico</label>
                                <input type="mail" class="form-control" name="formEmail" id="formEmail">
                                <span id="formEmail_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formEmail">Agencia en la que labora el empleado* </label>
                                <select name="formAgencia" id="formAgencia" class="form-control">
                                    <option selected="true" disabled="disabled">Selecciona agencia
                                    </option>
                                    <option value="Honda Galerías">Honda Galerías</option>
                                    <option value="Honda González Gallo">Honda González Gallo</option>
                                    <option value="Renault Américas">Renault Américas</option>
                                    <option value="Renault Gonzalez Gallo">Renault Gonzalez Gallo</option>
                                    <option value="Audi Center Galerías">Audi Center Galerías</option>
                                    <option value="Acura Guadalajara">Acura Guadalajara</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Kia Altaria">Kia Altaria</option>
                                    <option value="Kia Corregidora">Kia Corregidora</option>
                                    <option value="Honda Power House">Honda Power House</option>
                                    <option value="Honda Motonova">Honda Motonova</option>
                                    <option value="Laminado y Pintura">Laminado y Pintura</option>
                                    <option value="Serviopera">Serviopera</option>
                                    <option value="Corporativo">Corporativo</option>
                                    <option value="Vanrenta">Vanrenta</option>
                                    <option value="DIRTOP">DIRTOP</option>
                                </select>

                                <span id="formAgencia_error" class="text-danger font-10px"></span>
                            </div>
                            <h2>Datos del referido o recomendado</h2>
                            <div class="form-group">
                                <label for="formNombre">Nombre(s)*</label>
                                <input type="text" class="form-control" name="formNombre" id="formNombre">
                                <span id="formNombre_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formApellidoP">Apellido Paterno*</label>
                                <input type="text" class="form-control" name="formApellidoP" id="formApellidoP">
                                <span id="formApellidoP_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formApellidoM">Apellido Materno*</label>
                                <input type="text" class="form-control" name="formApellidoP" id="formApellidoP">
                                <span id="formApellidoM_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formCelular">Celular* </label>
                                <input type="tel" class="form-control" name="formCel" id="formCel">
                                <span id="formCel_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formCorreo">Correo electrónico* </label>
                                <input type="text" class="form-control" name="formCorreo" id="formCorreo">
                                <span id="formCorreo_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formApellidoM">Auto de Interes *</label>
                                <input type="text" class="form-control" name="formApellidoP" id="formApellidoP">
                                <span id="formApellidoP_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <label for="formApellidoM">¿Nuevo o Seminuevo?</label>
                                <select class="form-control" name="formEstatus" id="formEstatus">
                                    <option selected="true" disabled="disabled">Seleccionar
                                    </option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Seminuevo">Seminuevo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formApellidoM">Agencia*</label>
                                <select class="form-control" name="formAgenciaC" id="formAgenciaC">
                                    <option selected="true" disabled="disabled">Seleccionar Agencia
                                    </option>
                                    <option value="Honda Galerías">Honda Galerías</option>
                                    <option value="Honda González Gallo">Honda González Gallo</option>
                                    <option value="Renault Américas">Renault Américas</option>
                                    <option value="Audi Center Galerías">Audi Center Galerías</option>
                                    <option value="Acura Guadalajara">Acura Guadalajara</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Kia Altaria">Kia Altaria</option>
                                    <option value="Kia Corregidora">Kia Corregidora</option>
                                    <option value="Honda Power House">Honda Power House</option>
                                    <option value="Honda Motonova">Honda Motonova</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formfecha">¿Cuando piensa realizar su compra?</label>
                                <select class="form-control" name="formFecha" id="formFecha">
                                    <option selected="true" disabled="disabled">Seleccionar
                                    </option>
                                    <option value="Este mes">Este mes</option>
                                    <option value="De 1 a 2 meses">De 1 a 2 meses</option>
                                    <option value="Próximos 3 meses">Próximos 3 meses</option>
                                    <option value="No lo tiene definido">No lo tiene definido</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="formApellidoM">Como le gustaría ser contactado</label>
                                <select id="formMedio" name="formMedio" placeholder="Selecciona los medios por los cuales puedes ser contactado" multiple>
                                    <option value="Por llamada">Por llamada</option>
                                    <option value="Por whatsapp">Por whatsapp</option>
                                    <option value="Por correo">Por correo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formHorario">¿Qué horario prefiere?</label>
                                <select class="form-control" name="formHorario" id="formHorario">
                                    <option selected="true" disabled="disabled">Seleccionar
                                    </option>
                                    <option value="9:00am">9:00am</option>
                                    <option value="10:00am">10:00am</option>
                                    <option value="11:00am">11:00am</option>
                                    <option value="12:00pm">12:00pm</option>
                                    <option value="1:00pm">1:00pm</option>
                                    <option value="2:00:pm">2:00:pm</option>
                                    <option value="3:00pm">3:00pm</option>
                                    <option value="4:00pm">4:00pm</option>
                                    <option value="5:00pm">5:00pm</option>
                                    <option value="6:00pm">6:00pm</option>
                                    <option value="7:00pm">7:00pm</option>
                                    <option value="8:00pm">8:00pm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6Lc2XvgbAAAAAEabbrxGZgK3efEH4Kn67xtXfcnK">
                                </div>
                                <span id="captcha_error" class="text-danger font-10px"></span>
                            </div>
                            <div class="form-group">
                                <div class="text-center mt-5">
                                    <button type="submit" name="sendContacto" id="sendContacto"
                                        class="btn btn-primary px-4" style="width: 100%;">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/app.js"></script>
    <script src="js/contact.js"></script>
</body>

</html>