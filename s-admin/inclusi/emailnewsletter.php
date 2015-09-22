<?				
				$maild="
					<html>
						<head>
							<title>Software Arredamento: Newsletter</title>
						</head>
						<body style=\"font-family:Verdana,Tahoma,sans-serif\">
							<p>
								<center>
									<h1>Software Arredamento: Newsletter</b></h1>
								</center>
							</p>
							<br>
							<br>
							".$descn."
						</body>
					</html>
				";
				//header dell'e-mail
				$header="From: info@softwarearredamento.com\r\n";
				$header.= "MIME-Version: 1.0\n";
				$header.= "Content-type: text/html; charset=\"iso-8859-1\"\n";
				$header.="Content-Transfer-Encoding: 7bit\n";
				//invio dell'email al venditore e acquirente
?>				