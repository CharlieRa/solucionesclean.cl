<?php

require '../vendor/PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])){

	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$mensaje = $_POST['mensaje'];
	$telefono = $_POST['telefono'];
	$apellido = $_POST['apellido'];

	$mail = new PHPMailer;
	$mail->Timeout  = 15;
	// $mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'cramart@tsensor.cl';                 // SMTP username
	$mail->Password = 'carlos1234567';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->From = 'contacto@solucionesclean.cl';
	$mail->FromName = 'SolucionesClean - Formulario de Contacto';
	$mail->addAddress('carlos.ramart@gmail.com');     // Add a recipient
	// $mail->addReplyTo('info@example.com', 'Information');
	// $mail->addCC('cc@example.com');
	// $mail->addBCC('bcc@example.com');

	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Formulario de Contacto';
	$mail->Body    = '<b>Nombre:</b> '.$nombre.' '.$apellido.'<br><b>Telefono: </b>'.$telefono'<br><b>Correo:</b> '.$email .'<br><b>Mensaje:</b> '.$mensaje;

	if(!$mail->send()) {
	    header('HTTP', true, 500);
	} else {
	    echo "Enviado Correctamente";
	}
	$mail->SmtpClose();
}else{
	header('HTTP', true, 500);
}

?>
