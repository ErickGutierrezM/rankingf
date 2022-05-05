
<?php


use PHPMailer\PHPMailer\PHPMailer;

require_once '../vendor/PHPMailer/src/PHPMailer.php';
require_once '../vendor/PHPMailer/src/SMTP.php';
require_once '../vendor/PHPMailer/src/Exception.php';


if (isset($_POST["formNombre"])) {

	$formNombre = '';
	$formEmail = '';
	$formTelefono = '';

	$formEmpresa = '';
    $formAsunto = '';

	$formNombre_error = '';
	$formEmail_error = '';
	$formTelefono_error = '';

	$formEmpresa_error = '';
    $formAsunto_error = '';
	$captcha_error = '';

	if (empty($_POST["formNombre"])) {
		$formNombre_error = 'El nombre es requerido';
	} else {
		$formNombre = $_POST["formNombre"];
	}

    if(empty($_POST["formEmail"])) {
        $formEmail_error = 'El correo electronico es requerido';
    }
    else {
        if(!filter_var($_POST["formEmail"], FILTER_VALIDATE_EMAIL)) {
            $formEmail_error = 'Correo electronico invalido, intenta de nuevo';
        }
        else {
            $formEmail = $_POST["formEmail"];
        }
    }

	if (empty($_POST["formTelefono"])) {
		$formTelefono_error = 'El numero de teléfono es requerido';
	} else {
		$formTelefono = $_POST["formTelefono"];
	}

	if (empty($_POST["formEmpresa"])) {
		$formEmpresa_error = 'El nombre de tu empresa es requerido';
	} else {
		$formEmpresa = $_POST["formEmpresa"];
	}

	if (empty($_POST["formAsunto"])) {
		$formAsunto_error = 'Se requiere de una breve descripción';
	} else {
		$formAsunto = $_POST["formAsunto"];
	}

	if (empty($_POST['g-recaptcha-response'])) {
		$captcha_error = 'Debes completar el Captcha';
	} else {
		$captcha = $_POST['g-recaptcha-response'];
		$secret_key = '6LfIusMbAAAAAM-eVZQ7VqCfPeuLzvy5Ax6LXxWo';
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$captcha");
		$response_data = json_decode($response, TRUE);
		$error = json_encode($response_data);

		if (!$response_data['success']) {
			$captcha_error = $error;
		}
	}

	if ($formNombre_error == '' && $formEmail_error == '' && $formTelefono_error == '' && $formEmpresa_error == '' && $formAsunto_error == '' && $captcha_error == '') {

		$nombre = $_POST['formNombre'];
        $email = $_POST['formEmail'];
		$telefono = $_POST['formTelefono'];
		$empresa = $_POST['formEmpresa'];
		$asunto = $_POST['formAsunto'];

		date_default_timezone_set("America/Mexico_City");
		$fecha = date('d/m/Y');
		$hora = date('H:i');
		date_default_timezone_set("America/Mexico_City");
		$fechaDB = date('Y-m-d H:i:s');

		$mail = new PHPMailer(true);
		$mail->isSMTP();
		//$mail->isMail();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Host = 'smtp.ionos.mx';
		$mail->Port = '587';

		$mail->Username = 'noreply@galletamkt.com';
		$mail->Password = 'GalletaMKT77%';

		$mail->setFrom('noreply@galletamkt.com', 'Nuevo mensaje ' . $servicio . '');

		$mail->AddAddress('noreply@galletamkt.com');
		$mail->WordWrap = 50;

		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Correo de Formulario de contacto';
		$mail->Body = '
			<h3 align="center">Detalles del solicitante</h3>
			<p>Fecha y hora de contacto: ' . $fecha . ' ' . $hora . '</p>
			<table border="1" width="100%" cellpadding="5" cellspacing="5">
				<tr>
					<td width="30%">Nombre:</td>
					<td width="70%">' . $nombre . '</td>
				</tr>
                <tr>
					<td width="30%">Email</td>
					<td width="70%">' . $email . '</td>
				</tr>
				<tr>
					<td width="30%">Teléfono</td>
					<td width="70%">' . $telefono . '</td>
				</tr>
				<tr>
					<td width="30%">Empresa</td>
					<td width="70%">' . $empresa . '</td>
				</tr>
				<tr>
					<td width="30%">Asunto</td>
					<td width="70%">' . $asunto . '</td>
				</tr>
			</table>
			';

		if ($mail->send()) {
			$data = array(
				'success' => true
			);

			// require_once "../../secretInfo/conexion_BD.php";

			// $query = mysqli_query($conexion, "INSERT INTO clientes (nombre_cliente, telefono_cliente, proyecto_cliente, nom_negocio_cliente, descripcion_cliente, pagina_origen, fecha_contacto) VALUES ('" . $nombre . "', '" . $telefono . "', '" . $proyecto . "', '" . $negocio . "', '" . $descripcion . "', '" . $origenForm . "', '" . $fechaDB . "')");
		} else {
			$data = array(
				'success' => false
			);
		}
	} else {
		$data = array(
			'formNombre_error' => $formNombre_error,
			'formEmail_error' => $formEmail_error,
			'formTelefono_error' => $formTelefono_error,
			'formEmpresa_error'  => $formEmpresa_error,
			'formAsunto_error'  => $formAsunto_error,
			'captcha_error'  => $captcha_error
		);
	}
	echo json_encode($data);
}

?>
