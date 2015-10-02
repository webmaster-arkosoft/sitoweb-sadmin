<?php 
	include "functions.php";
	//Inserimento nel carrello
	if(isset($_GET['prodottodb']) and strlen($_GET['prodottodb'])>0){ include "insercarrello.php";	}	
	//Cambio quantità del carrello
	if(isset($_POST['elemento']) and strlen($_POST['elemento'])>0){ include "cambiaqnt.php";	}
	//Elimina prodotto	
	if(isset($_POST['elimina']) and strlen($_POST['elimina'])>0){ include "eliminaprodotto.php";	}
	//Se esiste un 'id-coupon ricavo i prodotti
	if(isset($_GET['idcoupon']) and strlen($_GET['idcoupon'])>0){ include "prodotticoupon.php";	}
?>
	<script src="carrello/js/libs.js" type="text/javascript"></script>
	<div class="barra-navigazione">
		<div class="barra">Il mio Carrello</div>
		<div class="barra1">Dati per la Fatturazione</div>
		<div class="barra1">Metodi di pagamento</div>
	</div>
	
	<div id="scaduto" class="couponscadutoff">&nbsp;</div>
	
	<div class="carrello">
		<div class="titoli">
			<div class="nomesoftware"><div>Nome Software</div></div>
			<div class="consegna"><div>Sistema operativo</div></div>
			<div class="quantita"><div>Quantit&agrave;</div></div>
			<div class="durata"><div>Licenza/Garanzia</div></div>
			<div class="prezzounitario"><div>Prezzo unitario</div></div>
			<div class="prezzounitario"><div>Totale</div></div>
			<div class="cancellalicenza">&nbsp;</div>
		</div>
		<div class="descrizione">
<?php	if(count($_SESSION['carrello'])==0){
?>			<div class="nessunprodotto"><div>Nessun prodotto inserito nel carrello!</div></div>
<?php	}else{
			for($a=0; $a<count($_SESSION['carrello']);$a++){
?>				<script>
					numeroelementi=numeroelementi+1;
					prodotticarrello.push('<?php print $_SESSION['carrello'][$a][0]; ?>');
				</script>
				<div class="dnomesoftware">
					<div class="imgdnomesoftware"><img id="tipolicenza" src="<?php print $_SESSION['carrello'][$a][1]; ?>"></div>
 					<div class="titolodnomesoftware"><?php print $_SESSION['carrello'][$a][2]; ?></div>
					<input type="hidden" name="peso<?php print $_SESSION['carrello'][$a][0]; ?>" id="peso<?php print $_SESSION['carrello'][$a][0]; ?>" value="<?php print ($_SESSION['carrello'][$a][7]*$_SESSION['carrello'][$a][4]); ?>">
				</div>
					<div class="dconsegna">
						<div>
							<img src="http://www.softwarearredamento.com/carrello/immagini/<?php print $_SESSION['carrello'][$a][3]; ?>.jpg" />
						</div>
					</div>
					<div class="dquantita">
						<form action="<? print $primapagina; ?>" method="POST" >
							<div class="qntinput">
								<input id="quantita<?php print $_SESSION['carrello'][$a][0]; ?>" type="text" name="quantita" id="quantita" value="<?php print $_SESSION['carrello'][$a][4]; ?>" />
							</div>
							<div class="cambiaqnt">
								<input type="Submit" name="cambio" id="cambio" class="bottonecambio" value="+" />
								<input type="Submit" name="cambio" id="cambio" class="bottonecambio1" value="-" />
							</div>
							<input type="hidden" name="elemento" id="elemento" value="<?php print $a; ?>" />
							<input type="hidden" name="idcouponq<?php print $a; ?>" id="idcouponq<?php print $a; ?>" value="" />
							<input type="hidden" name="elemcorrente" id="elemcorrente" value="<?php print $_SESSION['carrello'][$a][0]; ?>" />
						</form>
					</div>
					<div class="ddurata">
						<div>
<?php 
								if($_SESSION['carrello'][$a][5]>0){
									print $_SESSION['carrello'][$a][5];
								}else{
									print "-";	
								}
?>						</div>
					</div>
					<div class="dprezzounitario" id="<?php print $_SESSION['carrello'][$a][0]; ?>gena">
						<div id="<?php print $_SESSION['carrello'][$a][0]; ?>prea" class="prezzonormale">
							<?php print "&euro; ".decimali($_SESSION['carrello'][$a][6]); ?>
						</div>
						<div id="<?php print $_SESSION['carrello'][$a][0]; ?>offa" class='prezzooff'>&nbsp;</div>
					</div>
					<div class="dprezzounitario" id="<?php print $_SESSION['carrello'][$a][0]; ?>genb">
						<div id="<?php print $_SESSION['carrello'][$a][0]; ?>preb" class="prezzonormale">
							<?php print "&euro; ".decimali($_SESSION['carrello'][$a][6]*$_SESSION['carrello'][$a][4]); ?>
						</div>
						<input type="hidden" name="totale<?php print $_SESSION['carrello'][$a][0]; ?>" id="totale<?php print $_SESSION['carrello'][$a][0]; ?>" value="<?php print decimali($_SESSION['carrello'][$a][6]*$_SESSION['carrello'][$a][4]); ?>">
						<input type="hidden" name="totalescont<?php print $_SESSION['carrello'][$a][0]; ?>" id="totalescont<?php print $_SESSION['carrello'][$a][0]; ?>" value="<?php print decimali($_SESSION['carrello'][$a][6]*$_SESSION['carrello'][$a][4]); ?>">
						<div id="<?php print $_SESSION['carrello'][$a][0]; ?>offb" class='prezzooff'>&nbsp;</div>
					</div>
					<div class="dcancellalicenza">
						<form action="<? print $primapagina; ?>" method="POST" >
							<div><input type="Submit" name="elimina" id="elimina" class="bottoneelimina" value="<?php print $a; ?>" /></div>
							<input type="hidden" name="idcoupone<?php print $a; ?>" id="idcoupone<?php print $a; ?>" value="" />
							<input type="hidden" name="elemcorrente" id="elemcorrente" value="<?php print $_SESSION['carrello'][$a][0]; ?>" />
						</form>	
					</div>
<?php				//controllo il pese delle spese di spedizione
					if(strlen($_SESSION['carrello'][$a][7])>0){
						$spesespedizione=$spesespedizione+($_SESSION['carrello'][$a][7]*$_SESSION['carrello'][$a][4]);
					}
					
					//moltiplico il prezzo senza iva per le quantità
					$totale=$totale+($_SESSION['carrello'][$a][6]*$_SESSION['carrello'][$a][4]);
			}
		}
		
		//include config
		include "configcar.php";
		//connessione al database
		$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
		//selezione del database
		mysql_select_db($database) or die ("Non riesco a selezionare il database");
		
		//Controllo se ci sono id-coupon in questo periodo e creo un array js con tutti gli id coupon in hex
		$query=mysql_query("SELECT * FROM coupon WHERE CURRENT_DATE()<=coupon.datafine and ((attivati+1)<=quantita or quantita=-1)") or die ("Query coupon non eseguita!");
?>		<script>
<?php	while($data=mysql_fetch_array($query)){
?>			lista.push('<?php print $data[1]; ?>');
<?php		
			//Controllo se ci sono prodotti per questo id-coupon
			$query1=mysql_query("SELECT * FROM prodotticoupon JOIN prodotticarrello ON prodotticoupon.idprodotto=prodotticarrello.id WHERE idcoupon='".mysql_real_escape_string($data[0])."'") or die ("Query prodotti coupon non eseguita!");
?>			var prod = new Array();
<?php		$cont=0;
			while($data1=mysql_fetch_array($query1)){
?>				prod[<? print $cont; ?>] = new Array('<?php print $data1[1]; ?>','<?php print $data1[3]; ?>','<?php print $data1[9]; ?>');
<?php			$cont=$cont+1;
			}
?>			prodotti.push(prod);
<?php	}
		//Chiudo la connessione
		mysql_close($db);
?>		</script>

		<form action="<? print $secondapagina; ?>" method="POST">
<?php	
		//Se c'è almeno un prodotto nel carrello
		if(count($_SESSION['carrello'])>0){
?>			<div class="coupon">
				<div class="testocoupon"><img src="http://www.softwarearredamento.com/carrello/immagini/regalo.jpg" alt="ID coupon"><div class="promozionecoupon">Attiva subito la tua <span class="promlabelcoupon">PROMOZIONE</span>: <span class="labelcoupon">(Inserisci il tuo ID-COUPON)</span></div></div>
				<div class="inputcoupon"><input type="text" name="idcoupon" id="idcoupon" value="" onfocus="javascript: coupon(this);" onkeyup="javascript: coupon(this);"></div>
				<div id="success" class="successoff">&nbsp;</div>
			</div>
<?php	}
?>			

		</div>
		<div class="divspese">
			<div class="divimponibile">
				<div>Totale escl. Iva</div>
			</div>
			<div class="divimponibile1">
				<div id="totaleparzialediv">
					&euro; <?php if(strlen($totale)>0){ print decimali($totale); }else{ print "0.00"; } ?>
				</div>
				<input type="hidden" name="totaleparziale" id="totaleparziale" value="<?php if(strlen($totale)>0){ print decimali($totale); }else{ print "0.00"; } ?>" />
			</div>
			<div class="divimponibile2">
				&nbsp;
			</div>
			
			<div class="divimponibile">
				<div>Iva (22%)</div>
			</div>
			<div class="divimponibile1">
				<div id="ivacarrellodiv">
					&euro; <?php if(strlen($totale)>0){ print decimali((($totale*22)/100)); }else{ print "0.00"; } ?>
				</div>
				<input type="hidden" name="ivacarrello" id="ivacarrello" value="<?php if(strlen($totale)>0){ print decimali((($totale*22)/100)); }else{ print "0.00"; } ?>" />
			</div>
			<div class="divimponibile2">
				&nbsp;
			</div>
			
			<div class="spesesped">
				<div>Spese di spedizione</div>
			</div>
			<div class="spesesped1">
<?php			$spese=fascespedizione($spesespedizione);				
?>				<div><?php if($spese=="0.00"){ print "Gratuita";}else{ print "&euro; ".$spese; } ?></div>
			</div>
			<div class="divimponibile2">
				&nbsp;
			</div>
				
		</div>
		<div class="footercarrello">
			<div id="totalefinalediv">
				Totale (iva inclusa) &euro; <?php if(strlen($totale)>0){ print decimali(($totale+(($totale*22)/100))+$spese); }else{ print "0.00"; } ?>
			</div>
			<input type="hidden" name="totalefinale" id="totalefinale" value="<?php if(strlen($totale)>0){ print decimali(($totale+(($totale*22)/100))+$spese); }else{ print "0.00"; } ?>" />
		</div>
	</div>
	<div class="bottoni">
		<div class="spazio">&nbsp;</div>
		<div class="bottonetorna">
			<a class="bottonetorna" href="<?php print $paginainiziale; ?>">&nbsp;</a>
		</div>
		<span>&nbsp;</span>
		<div class="bottoneconferma">
			<input type="Submit" class="bottoneconferma" name="cmdconferma" id="cmdconferma"/>
		</div>	
	</div>
	
	</form>
	
<?php
	include "controllicoupon.php";
?>	