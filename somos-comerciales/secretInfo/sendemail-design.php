

<?php

require "secretInfo/conexion_BD.php";

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $nombre = $_POST['nombre'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['email'];
  $selectProyectos ='NA';
  $nom_negocio = 'NA';
  $descripcion = $_POST['descripcion'];
  $origenForm = 'Pagina Diseño Gráfico';

  date_default_timezone_set("America/Mexico_City");
  $fecha = date('Y-m-d H:i:s');

  $query = mysqli_query($conexion, "INSERT INTO clientes (nombre_cliente, telefono_cliente, correo_cliente ,proyecto_cliente, nom_negocio_cliente, descripcion_cliente, pagina_origen, fecha_contacto) VALUES ('".$nombre."', '".$telefono."', '".$correo."' ,'".$selectProyectos."', '".$nom_negocio."', '".$descripcion."', '".$origenForm."', '".$fecha."')");

  if ($query)
  {
      header('Location: index.php');
      echo "OK";
  }
  else
  {
      echo "ERROR: ".mysqli_error($conexion);
  }


  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.ionos.mx';
    $mail->SMTPAuth = true;
    $mail->Username = 'leads@galletamkt.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'GalletaMKT77%'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('hol@galletamkt.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('leads@galletamkt.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Cotización Página Diseño Gráfico GalletaMKT';
    $mail->Body = "<h3>Nombre : $nombre <br>Teléfono: $telefono <br>Correo : $correo <br>Descripción del proyecto : $descripcion <br>Origen: $origenForm </h3>";

    $mail->send();
    $alert = '<script type="text/javascript">
    alert("Formulario enviado correctamente, nos pondremos en contacto lo antes posible");
    window.location.href="diseno-grafico.php";
    </script>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>