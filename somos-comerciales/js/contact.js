$(document).ready(function() {
    $('#formContacto').on('submit', function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            url: "server/form-contact.php",
            type: "POST",
            cache: false,
            data: formdata,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                $('#sendContacto').attr('disabled', 'disabled');
            },
            success: function(data) {
                $('#sendContacto').attr('disabled', false);
                if (data.success) {
                    $('#formContacto')[0].reset();
                    $('#formNombreEmp_error').text('');
                    $('#formNumero_error').text('');
                    $('#formTelefono_error').text('');
                    $('#formEmail_error').text('');
                    $('#formAgencia_error').text('');
                    $('#formNombre_error').text('');
                    $('#formApellidoP_error').text('');
                    $('#formApellidoM_error').text('');
                    $('#formCel_error').text('');
                    $('#formCorreo_error').text('');
                    $('#captcha_error').text('');
                    grecaptcha.reset();
                    alert('¡Enviado Correctamente!');

                } else {
                    $('#formNombreEmp_error').text(data.formNombreEmp_error);
                    $('#formNumero_error').text(data.formNumero_error);
                    $('#formTelefono_error').text(data.formTelefono_error);
                    $('#formEmail_error').text(data.formEmail_error);
                    $('#formAgencia_error').text(data.formAgencia_error);
                    $('#formNombre_error').text(data.formNombre_error);
                    $('#formApellidoP_error').text(data.formApellidoP_error);
                    $('#formApellidoM_error').text(data.formApellidoM_error);
                    $('#formCel_error').text(data.formCel_error);
                    $('#formCorreo_error').text(data.formCorreo_error);
                    $('#captcha_error').text(data.captcha_error);
                }
            }
        });
    });
});