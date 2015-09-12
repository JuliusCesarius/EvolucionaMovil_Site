<?php
require ("PHPMailer/class.phpmailer.php");

//variables de forma
$businessName = $_POST['businessName'];
$contactName = $_POST['contactName'];
$email = $_POST['email'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$interior = $_POST['interior'];
$colonia = $_POST['colonia'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$phone = $_POST['phone'];
$mobile = $_POST['mobile'];
$portal = $_POST['portal'];
$pagoServicios = $_POST['pagoServicios'];

if($interior != ''){
	$interior = ' INT ' . $interior ;
}

if($businessName != ''){
	//se prepara el correo
	$mail = new PHPMailer;

	$mail -> IsSMTP();
	// Set mailer to use SMTP
	$mail -> Host = 'mail.evolucionamovil.mx';
	// Specify main and backup server
	$mail -> Port = 587;
	$mail -> SMTPAuth = true;
	// Enable SMTP authentication
	$mail -> Username = 'postmaster@evolucionamovil.mx';
	// SMTP username
	$mail -> Password = 'evoluciona5500';
	// SMTP password
	//$mail -> SMTPSecure = 'tls';
	// Enable encryption, 'ssl' also accepted
	$mail -> SMTPDebug = 1;
	
	$mail -> From = 'postmaster@evolucionamovil.mx';
	$mail -> FromName = 'Evoluciona Movil Info';
	$mail -> AddAddress('michavo2000@gmail.com', 'Julio Ávila');
	$mail -> AddAddress('evolucionamovil@gmail.com', 'Evoluciona Móvil');
	
	$mail -> AddReplyTo('postmaster@evolucionamovil.mx', 'Evoluciona Movil Info');
	//$mail->AddCC('cc@example.com');
	//$mail->AddBCC('bcc@example.com');
	
	$mail -> WordWrap = 50;
	$mail -> IsHTML(true);
	
	// Set email format to HTML
	
	$mail -> Subject = 'Nuevo prospecto';
	$mail -> Body = '<html> 
					<head> 
					<title>Nuevo prospecto</title> 
					</head> 
					<body> 
					<h1>Nuevo prospecto</h1><br />
					<p><h3><b>Negocio:</b> ' . $businessName . '.</h3></p>
					<p><h4><b>Contacto:</b> ' . $contactName . '.</h4></p>
					<p><h5>Correo: </h5>' . $email . '.</p>
					<p><b>Dirección: </b>' . $calle . ' ' . $numero . $interior. ' ' . $colonia . ', ' . $ciudad . ', ' . $estado . ' C.P.:' . $cp . ' ' . '.</p>
					<p><b>Telefono fijo: </b>' . $phone . '.</p>
					<p><b>Celular: </b>' . $mobile . '.</p>
					<p><b>Portal: </b>' . $portal . '.</p>
					<p><b>Pago de servicios: </b>' . $pagoServicios . '.</p>
					<p style="text-align: right;">Correo Automático, no contestar.</p>
					</body> 
					</html>';
	$mail -> AltBody = 'Nuevo prospecto\n 
					Éstos son sus datos:\n
					Negocio: ' . $businessName . '\n
					Nombre: ' . $contactName . '\n
					Correo: ' . $email . '\n
					Dirección: ' . $calle . ' ' . $numero . $exterior . ' ' . $colonia . ', ' . $ciudad . ', ' . $estado . ' C.P.:' . $cp . ' ' . '\n
					Telefono fijo: ' . $phone . '\n
					Celular: ' . $mobile . '\n
					Portal: ' . $portal . '\n
					Pago de servicios: ' . $pagoServicios . '\n';
	
	if (!$mail -> Send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail -> ErrorInfo;
		exit ;
	} 
	
	header('Location: success.html');
	
}else{
 	header('Location: preafiliacion.html');
}

?>



