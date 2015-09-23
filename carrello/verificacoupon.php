<?php
		
	// include config
	include "../config.php";
	include "functions.php";
	//connessione al database
	$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
	//selezione del database
	mysql_select_db($database) or die ("Non riesco a selezionare il database");


	
	//se c'è l'id-coupon controllo quali prodotti corrispondono e li aggiungo al carrello
	if(isset($_POST['idcoupon']) and strlen($_POST['idcoupon'])>0){
		
		$empty=false;
		
		//Controllo se ci sono prodotti per questo id-coupon
		$codice=mysql_real_escape_string(strtolower($_POST['idcoupon']));
		$datacorrente=date("Y-m-d");
		$query=mysql_query("SELECT datafine,quantita,attivati,id FROM coupon WHERE codicecoupon='".$codice."'") or die ("Query coupon non eseguita!");
		$datadb=mysql_result($query,0,0);
		$qntdb=mysql_result($query,0,1);
		$attivatidb=mysql_result($query,0,2);
		$idcoupondb=mysql_result($query,0,3);

		//Se non esiste l'id-coupon
		if(strlen($datadb)==0){
			print "Questo ID-COUPON non esiste";
			$empty=true;
		}
		
		
		//Controllo la scadenza
		if($empty==false){
			if(calcolatempo($datacorrente,$datadb,"g")<0){
				print "L'ID-COUPON che hai inserito risulta scaduto!";
				$empty=true;
			}
		}	
		
		//Controllo la quantità
		if($empty==false){
			if((intval($attivatidb)+1)>$qntdb and $qntdb!=-1){
				print "L'offerta con questo ID-COUPON &egrave; terminata";
				$empty=true;
			}
		}

		//Controllo se il numero di prodotti che sono nel carrello con l'idcoupon è uguale a quelli inseriti nel DB
		$lista=explode(",",$_POST['listaprod']);
		$errore=false;
		$queryctrl=mysql_query("SELECT idprodotto FROM prodotticoupon WHERE idcoupon='".$idcoupondb."'") or die ("Query num prodotti coupon non eseguita!");
		while($data=mysql_fetch_array($queryctrl)){
			if(in_array($data[0],$lista)==false){
				$errore=true;
			}
		}

		//Se manca anche un prodotto dell'idcoupon del DB nell'array da cercare considero sbagliato l'id-coupon
		if($errore==true){
			print "erroreprod";
		}	
	}
	
	mysql_close($db);
?>	