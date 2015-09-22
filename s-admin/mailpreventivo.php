<?		

				//ricezione dei parametri della mail
				$oggetto="Prodotti venduti su www.softwarearredamento.com";
				$mail="	";
				//header dell'e-mail
				$header="From: info@softwarearredamento.com\r\n";
				$header.= "MIME-Version: 1.0\n";
				$header.= "Content-type: text/html; charset=\"iso-8859-1\"\n";
				$header.="Content-Transfer-Encoding: 7bit\n";
				//invio dell'email al venditore e acquirente
				if(!$errore)
				{
					mail("info@softwarearredamento.com",$oggetto,$mail,$header);
				}
?>				