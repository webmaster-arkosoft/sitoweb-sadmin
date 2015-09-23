<?php 

	//RICAVO I DATI POST
	$errore="";
	if(isset($_POST['tipoattivita'])){
		$_SESSION['tipoattivita']=$_POST['tipoattivita'];
		//Se è stato selezionato come tipo di attività Azienda o Libero Professionista
		if($_POST['tipoattivita']=='1' or $_POST['tipoattivita']=='2'){
			//Setto la ragione sociale se è stata inserita altrimenti segnalo l'errore
			if(isset($_POST['ragione']) and strlen($_POST['ragione'])>0){ 
				$ragionesociale=$_POST['ragione']; 
				$_SESSION['ragionesociale']=$_POST['ragione']; 
			}else{
				$_SESSION['ragionesociale']="";
				$errore="Ragione Sociale,";
			}
		}else{
			$_SESSION['ragionesociale']="";
		}
		
		//Setto il nome se è stato inserito altrimenti segnalo l'errore
		if(isset($_POST['nome']) and strlen($_POST['nome'])>0){ 
			$nome=$_POST['nome']; 
			$_SESSION['nome']=$_POST['nome']; 
		}else{
			if($_POST['tipoattivita']=='3'){
				$errore="Nome,";
				$_SESSION['nome']="";
			}else{
				$errore.=" nome,";
				$_SESSION['nome']="";
			}	
		}
		
		//Setto il cognome se è stato inserito altrimenti segnalo l'errore
		if(isset($_POST['cognome']) and strlen($_POST['cognome'])>0){ 
			$cognome=$_POST['cognome']; 
			$_SESSION['cognome']=$_POST['cognome']; 
		}else{
			$errore.=" cognome,";
			$_SESSION['cognome']="";
		}
		
		//Setto l'indirizzo se è stato inserito altrimenti segnalo l'errore
		if(isset($_POST['indirizzo']) and strlen($_POST['indirizzo'])>0){ 
			$indirizzo=$_POST['indirizzo']; 
			$_SESSION['indirizzo']=$_POST['indirizzo']; 
		}else{
			$errore.=" indirizzo,";
			$_SESSION['indirizzo']="";
		}
				
		//Setto il cap se è stato inserito altrimenti segnalo l'errore
		if(isset($_POST['cap']) and strlen($_POST['cap'])>0){ 
			$cap=$_POST['cap']; 
			$_SESSION['cap']=$_POST['cap']; 
		}else{
			$errore.=" cap,";
			$_SESSION['cap']="";
		}
						
		//Setto la città se è stata inserita altrimenti segnalo l'errore
		if(isset($_POST['citta']) and strlen($_POST['citta'])>0){ 
			$citta=$_POST['citta']; 
			$_SESSION['citta']=$_POST['citta']; 
		}else{
			$errore.=" citt&agrave;,";
			$_SESSION['citta']="";
		}
		
		//Setto la provincia se è stata inserita altrimenti segnalo l'errore
		if(isset($_POST['prov']) and strlen($_POST['prov'])>0){ 
			$prov=$_POST['prov']; 
			$_SESSION['prov']=$_POST['prov']; 
		}else{
			$errore.=" provincia,";
			$_SESSION['prov']="";
		}
				
		//Se è stato selezionato come tipo di attività Azienda o Libero Professionista
		if($_POST['tipoattivita']=='1' or $_POST['tipoattivita']=='2'){		
			//Setto la partita iva se è stata inserita altrimenti segnalo l'errore
			if(isset($_POST['piva']) and strlen($_POST['piva'])>0){ 
				$piva=$_POST['piva']; 
				$_SESSION['piva']=$_POST['piva']; 
			}else{
				$errore.=" partita iva,";
				$_SESSION['piva']="";
			}
		}else{
			$_SESSION['piva']="";
		}	
		
		//Se è stato selezionato come tipo di attività Libero Professionista oprivato
		if($_POST['tipoattivita']=='2' or $_POST['tipoattivita']=='3'){		
			//Setto il codice fiscale se è stato inserito altrimenti segnalo l'errore
			if(isset($_POST['codfiscale']) and strlen($_POST['codfiscale'])>0){ 
				$codfiscale=$_POST['codfiscale']; 
				$_SESSION['codfiscale']=$_POST['codfiscale']; 
			}else{
				$errore.=" codice fiscale,";
				$_SESSION['codfiscale']="";
			}
		}else{
			$_SESSION['codfiscale']="";
		}

		//Setto il telefono se è stato inserito altrimenti segnalo l'errore
		if(isset($_POST['tel']) and strlen($_POST['tel'])>0){ 
			$tel=$_POST['tel']; 
			$_SESSION['tel']=$_POST['tel']; 
		}else{
			$errore.=" telefono,";
			$_SESSION['tel']="";
		}	

		//Setto l'email se è stata inserita altrimenti segnalo l'errore
		if(isset($_POST['email']) and strlen($_POST['email'])>0 and strstr($_POST['email'],'@')==true){ 
			$email=$_POST['email']; 
			$_SESSION['email']=$_POST['email']; 
		}else{
			$errore.=" email,";
			$_SESSION['email']="";
		}


	}else{
		$_SESSION['tipoattivita']="";
	}
	//FINE RICAVO I DATI
	
	//tipo di pagamento
	if(isset($_POST['tipopagamento']) and strlen($_POST['tipopagamento'])>0){
		$_SESSION['tipopagamento']=$_POST['tipopagamento'];
		$tipo=$_POST['tipopagamento'];
	}

	//Controllo se è stato inserito un idcoupon
	if(isset($_POST['idcoupon']) and strlen($_POST['idcoupon'])>0){
		$codicecoupon="?idcoupon=".$_POST['idcoupon'];
	}
?>	
<div class="barra-navigazione">
	<div class="barra1">Il mio Carrello</div>
	<div class="barra1">Dati per la Fatturazione</div>
	<div class="barra">Metodi di pagamento</div>
</div>
	
<?php 
	if(strlen($errore)>0 and strlen($_POST['email'])==0){ ?>
		<div class="msgerrore">
			Attenzione alcuni campi sono vuoti o inseriti non correttamente: <br /><?php print substr($errore,0,-1); ?>
		</div>
		<div class="bottonetornaindietro">
			<a class="bottonetornaindietro" href="<? print $secondapagina; ?>">&nbsp;</a>
		</div>
<?php 
	}else{
		
		include "functions.php";
		
		//Lista dei prodotti scontati per questo id coupon
		$arrayprodotti=prodottiscontati($_POST['idcoupon']);
	
		// include config
		include "config.php";
		//connessione al database
		$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
		//selezione del database
		mysql_select_db($database) or die ("Non riesco a selezionare il database");
	
		//ricavo la data e l'ora
		$data=date('Y-m-d H:i:s');
		//Inserisco nel DB
		mysql_query("insert into acquistitransazione values('default','".$data."')") or die("Errore.La query transazione non &egrave; stata eseguita");
		//ultimo id inserito
		$idtransazione=mysql_insert_id();
	
		//Calcolo il totale da pagare e quantita prodotti
		for($a=0; $a<count($_SESSION['carrello']); $a++){
			//controllo il peso delle spese di spedizione
			if(strlen($_SESSION['carrello'][$a][7])>0){
				$spesespedizione=$spesespedizione+($_SESSION['carrello'][$a][7]*$_SESSION['carrello'][$a][4]);
			}
			
			//Controllo se il prodotto è nella array dei prodotti scontati
			$trovato=-1;
			$trovato=trovasoftware($_SESSION['carrello'][$a][0],$arrayprodotti);
			
			//Se è stato trovato questo prodotto nella lista dei prodotti scontati sconto il prezzo altrimenti metto il prezzo originario
			if($trovato>-1){
				$prezzoprod=$arrayprodotti[$trovato][1]+(($arrayprodotti[$trovato][1]*22)/100);
			}else{
				$prezzoprod=$_SESSION['carrello'][$a][6]+(($_SESSION['carrello'][$a][6]*22)/100);
			}
			
			//Calcolo il totale
			$totale=$totale+($prezzoprod*$_SESSION['carrello'][$a][4]);
		
			mysql_query("insert into acquistiprodotti values('default','".mysql_real_escape_string($_SESSION['carrello'][$a][0])."','".mysql_real_escape_string($_SESSION['carrello'][$a][2])."','".mysql_real_escape_string($_SESSION['carrello'][$a][4])."','".mysql_real_escape_string($prezzoprod)."','".mysql_real_escape_string(($prezzoprod*$_SESSION['carrello'][$a][4]))."','".mysql_real_escape_string($idtransazione)."')") or die("Errore.La query prodotti non &egrave; stata eseguita");
		}
		//Se vi sono le spedizioni le sommo al totale
		$spese=fascespedizione($spesespedizione);
		
		
		//Inserisco l'utente
		mysql_query("insert into acquistidatiutente values('default','".mysql_real_escape_string($ragionesociale)."','".mysql_real_escape_string($nome)."','".mysql_real_escape_string($cognome)."','".mysql_real_escape_string($indirizzo)."','".mysql_real_escape_string($cap)."','".mysql_real_escape_string($citta)."','".mysql_real_escape_string($prov)."','".mysql_real_escape_string($piva)."','".mysql_real_escape_string($codfiscale)."','".mysql_real_escape_string($tel)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($tipo)."','".mysql_real_escape_string($idtransazione)."')") or die("Errore.La query utente non &egrave; stata eseguita");
		
		//Spedizione
		if($spese!="0.00"){
			mysql_query("insert into acquistispedizione values('default','".mysql_real_escape_string($idtransazione)."','".mysql_real_escape_string($spese)."')") or die("Errore.La query transazione non &egrave; stata eseguita");
		}
		
		mysql_close($db);
		
?>		<div class="divbonifico">
			<div class="bonifico">
				Grazie <strong><?php print $_POST['nome']." ".$_POST['cognome']; ?></strong> per aver acquistato Ristomanager, il gestionale per la ristorazione.<br />
				
<?php			//PAGAMENTO CON BONIFICO
				if(isset($_POST['tipopagamento']) and $_POST['tipopagamento']=="2"){
?>					Le abbiamo inviato un e-mail con il riepilogo del suo acquisto!<br /><br />
					Di seguito sono riportati i dati dove effettuare il bonifico pari a <span>&euro; <?php if(strlen($totale)>0){ print decimali($totale+$spese); }else{ print "0.00"; } ?></span> Iva Inclusa.
					<div class="imgdatibonifico">
						<img src="/carrello/immagini/bonifico-bancario.jpg">
					</div>
					<div class="datibonifico">
						<strong>Dati di Bonifico:</strong><br />
						INTESTAZIONE: Arkosoft di Basile Stefano & C.<br />
						IBAN: IT79 D052 6279 260C C032 6042 007<br />
						BANCA: Banca Popolare Pugliese						
					</div>
<?php			}	
				
				//PAGAMENTO CON PAYPAL
				if(isset($_POST['tipopagamento']) and $_POST['tipopagamento']=="1"){
?>					Il totale &egrave; pari <span>&euro; <?php if(strlen($totale)>0){ print decimali($totale+$spese); }else{ print "0,00"; } ?></span> Iva Inclusa.<br /><br /> 
					Clicca sul bottone <strong>Paga adesso</strong> per completare il vostro ordine tramite Paypal. <p>&nbsp;</p>
					<form name="pay" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="business" value="info@arkosoft.it">
						<input type="hidden" name="item_name_1" value="Acquisto su ristomanager.it">
						<input type="hidden" name="currency_code" value="EUR">
						<input type="hidden" name="amount_1" value="<?php print decimali($totale+$spese); ?>">
						<input type="hidden" name="upload" value="1">
						<input type="hidden" name="return" value="<?php print "http://".$_SERVER['HTTP_HOST'].$confermaordine; ?>" >
						
						<center>
						<input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - Il metodo rapido, affidabile e innovativo per pagare e farsi pagare.">
						<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
						</center>
					</form>
					<script>
						document.forms["pay"].submit();
					</script>
<?php			}
?>			</div>	
			<div class="informazioni">
				<img src="/carrello/immagini/contattaci.jpg"><br /><br />
				<span class="ditta">ARKOSOFT</span> <span class="snc">SNC</span><br /><br />
				via castello, 54<br />
				72026 San Pancrazio Sal.no(Br)<br />
				Tel: 0831.1815236<br />
				Tel/Fax: 0831.1815238<br />
				E-mail: info@arkosoft.it<br />
			</div>
		</div>	
<?php	

		if($_SESSION['invio']=="0" and strlen($_SESSION['email'])>0){
			//include config
			include "config.php";
			//connessione al database
			$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
			//selezione del database
			mysql_select_db($database) or die ("Non riesco a selezionare il database");
			//Controllo se ci sono prodotti per questo id-coupon
			$codice=mysql_real_escape_string(ascii2hex($_POST['idcoupon']));
			//Controllo se questo id-coupon è valido
			$querycou=mysql_query("SELECT id,attivati FROM coupon WHERE codicecoupon='".$codice."' AND CURRENT_DATE()<=datafine") or die ("Query id coupon non eseguita!");
			$coupondb=mysql_real_escape_string(mysql_result($querycou,0,0));
			$attivatidb=mysql_result($querycou,0,1);
			if(strlen($coupondb)>0){
				mysql_query("UPDATE coupon SET attivati='".($attivatidb+1)."' WHERE id=".$coupondb."");
			}
			mysql_close($db);
			
			//contenuto email per venditore e acquirente
			include "contenutoemail.php";
			
			$_SESSION['invio']="1";

			session_unset();
		}else{
?>			<script>
			function aggiorna(){
				var url = 'http://www.ristomanager.it';
				window.location.href = url;
			}
			setTimeout(function(){aggiorna()}, 2000);
			</script>
<?php	}	
	}
?>


			