<?php 
	include "functions.php";
	
	//Inserimento nel carrello
	if(isset($_POST['prodotto']) and strlen($_POST['prodotto'])>0 and $_POST['settasession']=="true"){ include "insercarrellofatt.php"; }	

		
	$_SESSION['invio']="0";
	
	$tipoattivita=1;
		
	//Se da metodi di pagamento si torna indietroprelevare i dati dalle sessioni
	if(isset($_SESSION['tipoattivita']) and strlen($_SESSION['tipoattivita'])>0){
		$tipoattivita=$_SESSION['tipoattivita'];
		$ragione=$_SESSION['ragionesociale'];
		$nome=$_SESSION['nome'];
		$cognome=$_SESSION['cognome'];
		$indirizzo=$_SESSION['indirizzo'];
		$cap=$_SESSION['cap'];
		$citta=$_SESSION['citta'];
		$prov=$_SESSION['prov'];
		$piva=$_SESSION['piva'];
		$codfiscale=$_SESSION['codfiscale'];
		$tel=$_SESSION['tel'];
		$email=$_SESSION['email'];
		$tipopagamento=$_SESSION['tipopagamento'];
		$idmacchina=$_SESSION['idmacchina'];
	}
	
	/*Lista dei prodotti con questo coupon*/
	if(isset($_POST['idcoupon']) and strlen($_POST['idcoupon'])>0){
		$arrayprodotti=prodottiscontati($_POST['idcoupon']);
		
		if(count($arrayprodotti)!=0){
			$codicecoupon="?idcoupon=".$_POST['idcoupon'];
		}else{
			$_POST['idcoupon']="";
		}	
	}	
	/*fine lista*/
	
	
?>	
<div class="barra-navigazione">
	<div class="barra1"><a href="<?php print $primapagina.$codicecoupon; ?>">Il mio Carrello</a></div>
	<div class="barra">Dati per la Fatturazione</div>
	<div class="barra1">Metodi di pagamento</div>
</div>

<?php if(count($_SESSION['carrello'])==0){ ?><div class="inserimentoprodotti">Attenzione inserisci almeno un prodotto nel carrello!</div><?php } ?>

<div class="contenitore">
	<div class="divriepilogo">
		<div class="iltuoordine">IL TUO ORDINE</div>
		<div class="riepilogo">
<?php			for($a=0; $a<count($_SESSION['carrello']); $a++){
?>					<div class="boxsingolop">
						<div class="imgsoftware">
							<img src="<?php print $_SESSION['carrello'][$a][1]; ?>">
						</div>
						<div class="titolosoftware">
							<div>&nbsp;</div>
							<?php print $_SESSION['carrello'][$a][4]; ?> <?php print $_SESSION['carrello'][$a][2]; ?>
						</div>

<?php 					//Controllo se il prodotto è nella array dei prodotti scontati
						$trovato=-1;
						$trovato=trovasoftware($_SESSION['carrello'][$a][0],$arrayprodotti);
?>						
						<div class="<?php if($trovato>-1){ print "prezzosoftware1"; }else{ print "prezzosoftware"; } ?>">
<?php							
							$prezzoqnt=$_SESSION['carrello'][$a][6]*$_SESSION['carrello'][$a][4];
							$prezzoiva=$prezzoqnt+(($prezzoqnt*22)/100);
								
							//Se è stato trovato il predotto metto il prezzo originario sbarrato e il prezzo in offerta in rosso
							if($trovato>-1){
?>								<p><span class="prezzooriginaledf"><?php print "&euro; ".decimali($prezzoiva); ?></span></p>
<?php							$prezzoscontato=$arrayprodotti[$trovato][1]*$_SESSION['carrello'][$a][4];
								$prezzoiva=$prezzoscontato+(($prezzoscontato*22)/100);
							}													
?>							<p><?php if($trovato>-1){ print "<span class='prezzoscontatodf'>"; } ?><?php print "&euro; ".decimali($prezzoiva); ?><?php if($trovato>-1){ print "</span>"; } ?>
							<p>IVA incl.</p>
						</div>
					</div>
<?php					
					//controllo il pese delle spese di spedizione
					if(strlen($_SESSION['carrello'][$a][7])>0){
						$spesespedizione=$spesespedizione+($_SESSION['carrello'][$a][7]*$_SESSION['carrello'][$a][4]);
					}
					
					//Calcolo totale
					$totale=$totale+$prezzoiva;
					$quantita=$quantita+$_SESSION['carrello'][$a][4];
				}
?>
					<div class="boxsingolop1">
						<div class="imgsoftwaresp">
							<img src="carrello/immagini/corriere.jpg">
						</div>
						<div class="titolosoftwaresp">
							<div>&nbsp;</div>
							Spese di Spedizione
						</div>
						<div class="prezzospese">
<?php 						$spese=fascespedizione($spesespedizione);	
?>							<p><?php if($spese=="0.00"){ print "Gratuita";}else{ print "&euro; ".$spese; } ?></p>
							<p><?php if($spese!="0.00"){ print "IVA incl."; }?></p>
						</div>
					</div>
		</div>
		<div class="totalelicenze"><span class="scrittatotale">TOTALE (IVA INCL.): </span>&euro; <?php if(strlen($totale)>0){ print decimali($totale+$spese); }else{ print "0.00"; } ?></div>
	</div>	

	<form name="acquista" id="acquista" method="POST" action="<? print $terzapagina; ?>"  Onsubmit="javascript: return controlloacquista();">
	<div class="divpagamento">
		<div class="iltuoordine">SCEGLI IL METODO DI PAGAMENTO</div>
		<div class="tipopagamento">
			<div class="sceltapagamento"><input type="radio" name="tipopagamento" id="tipopagamento" value="1" <? if(!isset($tipopagamento) or $tipopagamento=="1"){ print "checked=\"checked\";"; } ?> >Pagamento tramite Paypal <img src="/carrello/immagini/pagamento-paypal.jpg"/></div>
			<div class="sceltapagamento"><input type="radio" name="tipopagamento" id="tipopagamento" value="2" <? if(isset($tipopagamento) and $tipopagamento=="2"){ print "checked=\"checked\";"; } ?> >Pagamento tramite Bonifico <img src="/carrello/immagini/pagamento-bonifico.jpg"/></div>
		</div>
	</div>	
	
	<div class="ituoidati">I TUOI DATI PER LA FATTURAZIONE</div>
	<div class="divdatifattura">
		<div class="datifattura">
			<div class="datifattura1">
				<?php if(strlen($messaggio)>0){?><div class="messaggio1" id="messaggio"><?php print $messaggio; ?></div><?php } ?>
				<div class="campoobbligatorio2">Campi obbligatori per la fatturazione(*)</div>
				<script src="carrello/js/dati-fatturazione.js" type="text/javascript"></script>
				
				<div class="campoacquista"><div>&nbsp;</div></div>
				<div class="checkboxacquista">
					<input type="radio" name="tipoattivita" id="tipoattivita" value="1" <? if(!isset($tipoattivita) or $tipoattivita=="1"){ print "checked=\"checked\";"; } ?> Onclick="javascript: configuraform('1');"> Azienda/Ente
					<input type="radio" name="tipoattivita" id="tipoattivita" value="2" <? if(isset($tipoattivita) and $tipoattivita=="2"){ print "checked=\"checked\";"; } ?> Onclick="javascript: configuraform('2');"> Libero Professionista 
					<input type="radio" name="tipoattivita" id="tipoattivita" value="3" <? if(isset($tipoattivita) and $tipoattivita=="3"){ print "checked=\"checked\";"; } ?> Onclick="javascript: configuraform('3');"> Privato
				</div>

				<div id="ragionesociale" <? if($tipoattivita=="3"){ print "class=\"campoacquistanascosto\""; }else{ print "class=\"campoacquista\""; } ?> ><div>Ragione Sociale*</div></div>
				<div id="ragionesociale1" <? if($tipoattivita=="3"){ print "class=\"inputacquistanascosto\""; }else{ print "class=\"inputacquista\""; } ?> ><input type="text" name="ragione" id="ragione" value="<?php print $ragione; ?>"  Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>

				<div class="campoacquista"><div>Nome*</div></div>
				<div class="inputacquista"><input type="text" name="nome" id="nome" value="<?php print $nome; ?>"  Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>

				<div class="campoacquista"><div>Cognome*</div></div>
				<div class="inputacquista"><input type="text" name="cognome" id="cognome" value="<?php print $cognome; ?>"   Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>
				
				<div class="campoacquista"><div>Indirizzo*</div></div>
				<div class="inputacquista"><input type="text" name="indirizzo" id="indirizzo" value="<?php print $indirizzo; ?>"  Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>
				
				<div class="campoacquista">
					<div>Cap*</div>
				</div>
				<div class="inputacquista1">
					<input type="text" name="cap" id="cap" value="<?php print $cap; ?>" class="cap" Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/>
					<div class="campo2">Citt&agrave;* <input type="text" name="citta" id="citta" value="<?php print $citta; ?>" class="citta" Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>
					<div class="campo3">Prov* <input type="text" name="prov" id="prov" value="<?php print $prov; ?>" class="prov" Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>
				</div>
				
				<div id="piva" <? if($tipoattivita=="3"){ print "class=\"campoacquistanascosto\""; }else{ print "class=\"campoacquista\""; } ?> ><div>Partita Iva*</div></div>
				<div id="piva1" <? if($tipoattivita=="3"){ print "class=\"inputacquistanascosto\""; }else{ print "class=\"inputacquista\""; } ?> ><input type="text" name="piva" id="piva" value="<?php print $piva; ?>"  Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>

				<div id="codfiscale" <? if($tipoattivita=="1"){ print "class=\"campoacquistanascosto\""; }else{ print "class=\"campoacquista\""; } ?> ><div>Codice Fiscale*</div></div>
				<div id="codfiscale1" <? if($tipoattivita=="1"){ print "class=\"inputacquistanascosto\""; }else{ print "class=\"inputacquista\""; } ?>><input type="text" name="codfiscale" id="codfiscale" value="<?php print $codfiscale; ?>"  Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>


				<div class="campoacquista"><div>Telefono*</div></div>
				<div class="inputacquista"><input type="text" name="tel" id="tel" value="<?php print $tel; ?>"  Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>

				<div class="campoacquista"><div>Email*</div></div>
				<div class="inputacquista"><input type="text" name="email" id="email" value="<?php print $email; ?>"  Onclick="javascript: svuota(this.value);" onkeypress="javascript: svuota(this.value);"/></div>	

				<div class="campoacquista"><div>Legge privacy</div></div>
				<div class="textareaacquista">
					<textarea name="legge" id="legge" cols="35" rows="7" READONLY>Ai sensi dell'art. 13 del D.Lgs 196/2003, i dati personali forniti ad Arkosoft saranno trattati in modo lecito, secondo correttezza e nell'assoluto rispetto della normativa vigente in materia di privacy, anche con l'ausilio di mezzi elettronici o comunque automatizzati che consentano la conservazione protetta degli stessi. Sempre per le medesime finalit&agrave;, i dati personali possono venire a conoscenza dei dipendenti addetti all'Unit&agrave;  di Arkosoft e/o di terzi che abbiano rapporti di servizio con la stessa, preposti al trattamento medesimo, in qualit&agrave;  d'Incaricati del trattamento. I medesimi dati personali, previo suo specifico consenso, potranno anche essere utilizzati per finalit&agrave;  di marketing (esempio invio di materiale pubblicitario omaggi e buoni sconti, indagini di mercato) da parte di Arkosoft. Tale consenso &egrave; facoltativo. Lei, quale soggetto interessato, ha la facolt&agrave;  di esercitare i diritti previsti dall'art. 7 del D.Lgs. 196/2003 ed, in particolare, ha il diritto di conoscere in ogni momento quali sono i suoi dati e come vengono utilizzati; ha anche il diritto di farli aggiornare, integrare, rettificare o cancellare, chiederne il blocco ed opporsi al loro trattamento.
		La informiamo, inoltre, che il titolare del trattamento dei dati &egrave; Arkosoft, nella persona del Presidente del Consiglio di Amministrazione, domiciliato presso la sede della societ&agrave;  in via Casterllo 54 a San Pancrazio Salentino (Br) ,mentre il responsabile del trattamento dei dati &egrave; il Responsabile vendite clienti della divisione mercato di Arkosoft, domiciliato presso la sede della societ&agrave;  in via Castello,54 a San Pancrazio Salentino (Br).
					</textarea>
					<br />
				</div>
				
				<div class="campoacquista"><div>&nbsp;</div></div>
				<div class="checkboxacquista">
					<input type="checkbox" name="acconsento" id="acconsento" checked="checked"> Dichiaro di aver letto la Legge sulla Privacy
				</div>
				<input type="hidden" name="idcoupon" id="idcoupon" value="<?php print $_POST['idcoupon']; ?>" />
			</div>	
		</div>
	</div>
	
<?php	 if(count($_SESSION['carrello'])!=0){ 
?>			<div class="pulsanti">
				<div class="tornacar">
					<div class="bottonetornacarrello">
						<a class="bottonetornacarrello" href="<? print $primapagina.$codicecoupon; ?>">&nbsp;</a>
					</div>
				</div>
				<input type="image" src="/carrello/immagini/bottone-avanti.jpg" name="avanti" id="avanti" src="" value="1" Onmouseover="javascript: cambiabottoneavanti();" Onmouseout="javascript: cambiabottoneavanti1();" />
			</div>
	</form>
<?php	}
?>	

</div>	


			