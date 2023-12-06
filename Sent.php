<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$correo=$_POST['correo'];
$numero=$_POST['numero'];
$nombre=$_POST['nombre'];

$mail = new PHPMailer(true);

try {
  // Configura los ajustes del servidor SMTP
  $mail->isSMTP();
  $mail->Host = 'smtp.office365.com';  // Cambia esto por tu servidor SMTP
  $mail->SMTPAuth = true;
  $mail->Username ='yaweb@outlook.es';  // Cambia esto por tu dirección de correo electrónico
  $mail->Password ='Kaed2413@';  // Cambia esto por tu contraseña
  $mail->SMTPSecure = 'tls';
  $mail->Port =587;  // Puerto SMTP, ajusta según sea necesario

  // Configura los detalles del mensaje
  $mail->setFrom('yaweb@outlook.es', 'Yaweb');  // Cambia esto por tu dirección de correo electrónico y tu nombre
  $mail->addAddress($correo, $nombre);  // Cambia esto por la dirección de correo electrónico y el nombre del destinatario
  $mail->Subject = 'informes de pagina web';
  $mail->Body = 'mandar informacion de paginas web a este correo: '.$correo." o al numero: ".$numero;

 $imagen = $_FILES['imagen']['tmp_name'];
  $nombreImagen = $_FILES['imagen']['name'];
  $mail->addAttachment($imagen, $nombreImagen);
  $mail->CharSet = 'UTF-8'; 
  // Envía el mensaje
  $mail->send();
  var_dump($imagen);
	

} catch (Exception $e) {
  echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
}
?>
