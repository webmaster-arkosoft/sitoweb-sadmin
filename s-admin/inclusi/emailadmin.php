<?				

				//ricezione dei parametri della mail
				$oggetto="Nuovo utente registrato su www.softwarearredamento.com";
				$mail="
					<html>
						<head>
							<title>Nuovo utente registrato</title>
						</head>
						<body style=\"font-family:Verdana,Tahoma,sans-serif\">
							<p>
								<center>
									<h1>Nuovo utente registrato su <b>www.softwarearredamento.com</b></h1>
								</center>
							</p>
							Alcuni dati sul nuovo utente:<br>
							<br>
							<b>Username:</b> $userdb;<br>
							<b>Password:</b> $pswdb;<br>
							<b>Nome:</b> $nomedb;<br>
							<b>Cognome:</b> $cognomedb;<br>
							<br>
						</body>
					</html>
				";
				//header dell'e-mail
				$header="From: info@softwarearredamento.com\r\n";
				$header.= "MIME-Version: 1.0\n";
				$header.= "Content-type: text/html; charset=\"iso-8859-1\"\n";
				$header.="Content-Transfer-Encoding: 7bit\n";
				//invio dell'email al venditore e acquirente
				mail("info@softwarearredamento.com",$oggetto,$mail,$header);
?>				