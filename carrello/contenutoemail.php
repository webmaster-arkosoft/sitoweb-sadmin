<?php
			//E-MAIL AMMINISTRATORE E ACQUIRENTE
			//Invio preventivo via email
			$oggetto="Licenze di RistoManager vendute su www.ristomanager.it";
			$oggetto1="Licenze di RistoManager acquistate su www.ristomanager.it";
			
			//Tipo di pagamento
			switch($tipo){
				case "2":
				$tipo="Bonifico";
				break;
				
				case "1":
				$tipo="Paypal";
				break;
			}
			
			
			$prefazione="<strong>".utf8_decode($nome)." ".utf8_decode($cognome)."</strong> ha acquistato tramite ".$tipo." le seguenti licenze del software:</b><p>&nbsp;</p>";
			$prefazione.='<table style="border: 1px solid #ccc; margin-bottom: 20px;">
				<tr>
					<td>Ragione Sociale: </td>
					<td>'.utf8_decode($ragionesociale).'</td>
				</tr>
				<tr>
					<td>Nome: </td>
					<td>'.utf8_decode($nome).'</td>
				</tr>
				<tr>
					<td>Cognome: </td>
					<td>'.utf8_decode($cognome).'</td>
				</tr>
				<tr>
					<td>Indirizzo: </td>
					<td>'.utf8_decode($indirizzo).'</td>
				</tr>
				<tr>
					<td>Residenza: </td>
					<td>'.utf8_decode($cap)." ".utf8_decode($citta)." prov (".utf8_decode($prov).')</td>
				</tr>
				<tr>
					<td>Cod. Fiscale: </td>
					<td>'.utf8_decode($codfiscale).'</td>
				</tr>
				<tr>
					<td>P.iva: </td>
					<td>'.utf8_decode($piva).'</td>
				</tr>
				<tr>
					<td>Telefono: </td>
					<td>'.utf8_decode($tel).'</td>
				</tr>
				<tr>
					<td>Email: </td>
					<td>'.utf8_decode($email).'</td>
				</tr>
				</table>
				';
				
			if(strlen($_POST['idcoupon'])>0){	
				$contenutoemail='<table>
					<tr>
						<td>ID-Coupon: </td>
						<td>'.$_POST['idcoupon'].'</td>
					</tr>
				</table>';
			}	
			
			$contenutoemail=$contenutoemail.'<table  style="border: 1px solid #ccc;" cellpadding="0" cellspacing="0" width="100%">	
				<tr>
					<td align="center" style="border: 1px solid #ccc; width: 20%;">Quantit&agrave;</td>
					<td align="center" style="border: 1px solid #ccc; width: 20%;">Prodotto</td>
					<td align="center" style="border: 1px solid #ccc; width: 20%;">Prezzo (escl. iva)</td>
					<td align="center" style="border: 1px solid #ccc; width: 20%;">Totale (escl. iva)</td>
					<td align="center" style="border: 1px solid #ccc; width: 20%;">Licenza/Garanzia</td>
				</tr>
				
			';
			
			
			for($i=0; $i<count($_SESSION['carrello']);$i++){
				if(count($_SESSION['carrello'][$i])>0){
					
					//Controllo se il prodotto è nella array dei prodotti scontati
					$trovato=-1;
					$trovato=trovasoftware($_SESSION['carrello'][$i][0],$arrayprodotti);
					
					//Se è stato trovato questo prodotto nella lista dei prodotti scontati sconto il prezzo altrimenti metto il prezzo originario
					if($trovato>-1){
						$prezzoprod=$arrayprodotti[$trovato][1];
					}else{
						$prezzoprod=$_SESSION['carrello'][$i][6];
					}
					
					//righe della tabella
					$contenutoemail.='<tr>
						<td style="border: 1px solid #ccc; width: 20%; text-align: center;">'.$_SESSION['carrello'][$i][4].'</td>
						<td style="border: 1px solid #ccc; width: 20%; text-align: center;">'.$_SESSION['carrello'][$i][2].'</td>
						<td style="border: 1px solid #ccc; width: 20%; text-align: center;">'.$prezzoprod.'</td>
						<td style="border: 1px solid #ccc; width: 20%; text-align: center;">'.number_format($prezzoprod*$_SESSION['carrello'][$i][4],2).'</td>
						<td style="border: 1px solid #ccc; width: 20%; text-align: center;">'.$_SESSION['carrello'][$i][5].'</td>
					</tr>';
				}
			}
			
		
			if($tipo!="Paypal"){
				$prefazione1="
				<img src='http://".$_SERVER['HTTP_HOST']."/carrello/immagini/logoarkosoft.jpg'><br /><br />
				
				Grazie <strong>".utf8_decode($_POST['nome'])." ".utf8_decode($_POST['cognome'])."</strong> per aver acquistato RistoManager, il software per la gestione del tuo ristorante.<br />
					Di seguito sono riportati i dati dove effettuare il bonifico pari a <strong>€ ".decimali($totale+$spese)."</strong> Iva Inclusa.<br /><br />
					<strong>Dati di Bonifico:</strong><br />
					INTESTAZIONE: Arkosoft di Basile Stefano & C.<br />
					IBAN: IT79 D052 6279 260C C032 6042 007 <br />
					BANCA: Banca Popolare Pugliese
					<p>&nbsp;</p>
				";
			}else{
				//Link paypal
				$link=htmlentities("https://www.paypal.com/xclick/business=info@arkosoft.it&currency_code=EUR&item_name=Pagamento dei prodotti acquistati&amount=".decimali($totale+$spese));

				$prefazione1="
					<img src='http://".$_SERVER['HTTP_HOST']."/carrello/immagini/logoarkosoft.jpg'><br /><br />
				
					Grazie <strong>".utf8_decode($_POST['nome'])." ".utf8_decode($_POST['cognome'])."</strong> per aver acquistato RistoManager, il software per la gestione del tuo ristorante.<br /><br />
					Se ancora non hai effettuato il pagamento della licenza ti riportiamo sotto il link di paypal dove effettuare il pagamento: <br />
					<a href='".$link."'><b>Paga Subito</b></a><br /><br />
					oppure tramite bonifico<br />
					<strong>Dati di Bonifico:</strong><br />
					INTESTAZIONE: Arkosoft di Basile Stefano & C.<br />
					IBAN: IT79 D052 6279 260C C032 6042 007<br /> 
					BANCA: Banca Popolare Pugliese
					<p>&nbsp;</p>
					Totale pari a <strong>&euro; ".decimali($totale+$spese)."</strong> Iva Inclusa.<br /><br />
				";
			}	
			
			$footer="<br /><br />
			Cordiali Saluti<br />
			Arkosoft SNC<br /><br />
			<hr />
			<strong>ARKOSOFT snc</strong><br />						
			Cod.Fiscale: 02166630745<br />								
			P.Iva: 02166630745<br />											
			Sede Legale-Operativa: Via Castello, 54	<br />								
			72026, San Pancrazio Sal.no, BR	<br />									
			Tel: 0831/1815236		<br />														
			Fax: 0831/1815238	<br />					
			Sito: http://www.arkosoft.it<br />					
			E-Mail: info@arkosoft.it<br />						
			<p>&nbsp;</p><p>&nbsp;</p>
			";
			
			//Spese di spedizione
			if($spese=="0.00"){
				$scrivospese="Gratuite";
			}else{
				$scrivospese=decimali($spese)." Iva inclusa";
			}	
			$contenutoemail.='</table>
			<table style="margin-top: 20px;">
				<tr>
					<td align="right" style="font-size: 18px; font-weight: bold;">
						'."Spese di spedizione: ".$scrivospese.'
					</td>
				</tr>
				<tr>
					<td align="right" style="font-size: 18px; font-weight: bold;">
						'."Totale da pagare: ".decimali($totale+$spese).' Iva inclusa
					</td>
				</tr>
			</table>';	

			//invio dell'email al venditore e acquirente
			$contenutoemail1=$prefazione1.$contenutoemail.$footer;
			$contenutoemail=$prefazione.$contenutoemail;
			
			
			
			require("phpmailer/class.phpmailer.php");
			
			//VENDITORE
			$mail = new PHPMailer();
			//Invio preventivo via email
			$mail->IsHTML(true);
			$mail->From = "info@ristomanager.it";
			$mail->FromName = "RistoManager";
			$mail->AddAddress("info@arkosoft.it");
			$mail->AddAddress("vendite@arkosoft.it");
			$mail->Subject=$oggetto;
			$mail->Body=$contenutoemail;
			$mail->Send();
			
			//CLIENTE
			$mail1 = new PHPMailer();
			//Invio preventivo via email
			$mail1->IsHTML(true);
			$mail1->From = "info@ristomanager.it";
			$mail1->FromName = "RistoManager";
			$mail1->AddAddress($email);
			$mail1->Subject=$oggetto1;
			$mail1->Body=$contenutoemail1;
			$mail1->Send();
			
?>			