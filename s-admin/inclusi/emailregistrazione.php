<?				

				//ricezione dei parametri della mail
				$oggetto="Grazie per esserti registrato su www.softwarearredamento.com";
				$mail="
					<html>
						<head>
							<title>Grazie per esserti registrato</title>
						</head>
						<body style=\"font-family:Verdana,Tahoma,sans-serif\">
							<p>
								<center>
									<h1>Grazie per esserti registrato su <b>www.softwarearredamento.com</b></h1>
								</center>
							</p>
							Per attivare il tuo account clicca sul link sottostante:<br>
							<a href='http://www.softwarearredamento.com/attivazione.php?id=$codice1&autent=$idutente'>Attiva account</a><br>
							<br />
							i dati per effettuare il login sono:<br>
							<br>
							<b>Username:</b> $usern;<br>
							<b>Password:</b> $pswdb;<br>
							<br>
							Per qualsiasi problema o informazione contattaci alla pagina:<br/>
							<a href='http://www.softwarearredamento.com/contattaci.php'>Contattaci</a><br /><br />
							Grazie.
						</body>
					</html>
				";
				//header dell'e-mail
				$header="From: info@softwarearredamento.com\r\n";
				$header.= "MIME-Version: 1.0\n";
				$header.= "Content-type: text/html; charset=\"iso-8859-1\"\n";
				$header.="Content-Transfer-Encoding: 7bit\n";
				//invio dell'email al venditore e acquirente
				mail($email,$oggetto,$mail,$header);
?>				