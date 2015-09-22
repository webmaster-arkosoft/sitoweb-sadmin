<?	

	$nome=utf8_decode($nome);
	$ragione=utf8_decode($ragione);
	$paese=utf8_decode($paese);
	$tel=utf8_decode($tel);
	$email=utf8_decode($email);
	$richiesta=utf8_decode($richiesta);
			
	//ricezione dei parametri della mail
	$oggetto="Richiesta da www.softwarearredamento.com";
	$fullmsg="
		<html>
			<head>
				<title>Richiesta</title>
			</head>
			<body style=\"font-family:Verdana,Tahoma,sans-serif\">
				<p>
					<center>
						<h1><b>Richiesta da www.softwarearredamento.com</b></h1>
					</center>
				</p>
				<br>
				<b>Nome e Cognome:</b> $nome;<br>
				<b>Ragione Sociale:</b> $ragione;<br>
				<b>Cap/Citt&agrave;/Prov:</b> $paese;<br>
				<b>Telefono:</b> $tel;<br>
				<b>E-mail:</b> $email;<br>
				<b>Richiesta:</b> $richiesta;<br>
				<br>
			</body>
		</html>
	";

	require("phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();

	//Invio preventivo via email
	$mail->IsHTML(true);
	$mail->From = "info@softwarearredamento.com";
	$mail->FromName = "S-Admin";
	$mail->AddAddress("info@arkosoft.it");
	$mail->Subject=$oggetto;
	$mail->Body=$fullmsg;
	$mail->Send();

?>				