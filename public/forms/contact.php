<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/php-email-form/PHPMailer/src/Exception.php';
require '../assets/vendor/php-email-form/PHPMailer/src/PHPMailer.php';
require '../assets/vendor/php-email-form/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contacto@institutocolombianodepsicometria.com'; // tu correo
    $mail->Password   = 'xexumbmmonootqcj'; // contraseña de aplicación (no la normal)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Remitente y destinatario
    $mail->setFrom('contacto@institutocolombianodepsicometria.com', 'ClimaLaboralD10');
    $mail->addReplyTo($_POST['email'], $_POST['nombre'] . ' ' . $_POST['apellido']);
    $mail->addAddress('contacto@institutocolombianodepsicometria.com');
    // Contenido
    $mail->isHTML(true);
    $mail->Subject = 'Mensaje de ClimaLaboralD10';
    $mail->Body    = 'Nombre: ' . $_POST['nombre'] . '<br>' .
                     'Apellido: ' . $_POST['apellido'] . '<br>' .
                     'Email: ' . $_POST['email'] . '<br>' .
                     'Teléfono: ' . $_POST['telefono'] . '<br>' .
                     'País: ' . $_POST['pais'] . '<br>' .
                     'Ciudad: ' . $_POST['ciudad'] . '<br>' .
                     'Asunto: ' . $_POST['subject'] . '<br>' .
                     'Mensaje:<br>' . nl2br($_POST['message']);

    $mail->send();
    echo 'Mensaje enviado correctamente.';
    header("refresh:2;url=../"); // redirecciona al inicio
    exit;
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
}
?>
