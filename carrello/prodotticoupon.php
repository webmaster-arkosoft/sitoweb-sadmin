<?php


	// include config
	include "config.php";
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");
	
	//se c'è l'id-coupon controllo quali prodotti corrispondono e li aggiungo al carrello
	if(isset($_GET['idcoupon']) and strlen($_GET['idcoupon'])>0){
		//Controllo se ci sono prodotti per questo id-coupon
		$codice=mysql_real_escape_string(ascii2hex(strtolower($_GET['idcoupon'])));
		unset($_SESSION['carrello']);
		$queryc=mysql_query("SELECT idprodotto,iconaprodotto,nomeprodotto,sistemaoperativo,duratalicenza,prezzo,peso FROM coupon JOIN prodotticoupon ON coupon.id=prodotticoupon.idcoupon JOIN prodotticarrello ON prodotticarrello.id=prodotticoupon.idprodotto WHERE coupon.codicecoupon='".$codice."' AND CURRENT_DATE()<=coupon.datafine") or die ("Query coupon non eseguita!");
		while($datac=mysql_fetch_array($queryc)){
			//Array(ID,IMMAGINE PRODOTTO,NOME PRODOTTO,SISTEMA OPERATIVO,QUANTITA' INIZIALE,DURATA PRODOTTO,PREZZO SENZA IVA,KG DEL PRODOTTO
			$prodotticoupon[]=Array($datac[0],$datac[1],$datac[2],$datac[3],"1",$datac[4]." anno",$datac[5],$datac[6]);
		}
		$_SESSION['carrello']=$prodotticoupon;
	}
	mysql_close($db);
?>	