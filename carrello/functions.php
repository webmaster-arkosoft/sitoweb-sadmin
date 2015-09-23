<?php
//Funzione per la differenza tra date
function calcolatempo($data_iniziale,$data_finale,$unita) {
	$data1 = strtotime($data_iniziale);
	$data2 = strtotime($data_finale);
	 
	switch($unita) {
	case "m": $unita = 1/60; break; //MINUTI
	case "h": $unita = 1; break;	//ORE
	case "g": $unita = 24; break;	//GIORNI
	case "a": $unita = 8760; break; //ANNI
	}
	 
	$differenza = (($data2-$data1)/3600)/$unita;
	return $differenza;
}

//Funzione che mi trovo i prodotti scontati con quell'id coupon
function prodottiscontati($idcoupon){
		//include config
		include "config.php";
		//connessione al database
		$db = mysql_connect($host, $user, $psw) or die ("Errore nella connessione.");
		//selezione del database
		mysql_select_db($database) or die ("Non riesco a selezionare il database");
		//Controllo se ci sono prodotti per questo id-coupon
		$codice=mysql_real_escape_string(ascii2hex(strtolower($idcoupon)));
		//Controllo se ci sono prodotti per questo id-coupon
		$query=mysql_query("SELECT prodotticoupon.idprodotto,prodotticoupon.prezzoscontato FROM coupon JOIN prodotticoupon ON coupon.id=prodotticoupon.idcoupon JOIN prodotticarrello ON prodotticarrello.id=prodotticoupon.idprodotto WHERE coupon.codicecoupon='".$codice."' AND CURRENT_DATE()<=coupon.datafine and ((attivati+1)<=quantita or quantita=-1)") or die ("Query prodotti coupon non eseguita!");
		$cont=0;
		$arrayprodotti=Array();
		while($data=mysql_fetch_array($query)){
			$arrayprodotti[]=Array($data[0],$data[1]);
			if(cercaprodotto($data[0])==false){
				return Array();
			}
		}
		mysql_close($db);
		
		return $arrayprodotti;
}
//Funzione che controlla se il prodotto scontato esiste nel carrello
function cercaprodotto($prodotto){
	$trovato=false;
	for($a=0;$a<count($_SESSION['carrello']);$a++){
		if($prodotto==$_SESSION['carrello'][$a][0]){
			$trovato=true;
		}
	}
	return $trovato;
}
		
//Funzione per trovare un elemento in un array(dati-fatturazione.php)
function trovasoftware($elem,$lista){
	for($a=0;$a<count($lista);$a++){
		if($elem==$lista[$a][0]){
			return $a;
		}
	}
}

//Funzione per convertire da ascii a hex
function ascii2hex($ascii) {
	$hex = '';
	for($i = 0; $i < strlen($ascii); $i++) {
		$byte = dechex(ord($ascii{$i}));
		$byte = str_repeat('0', 2 - strlen($byte)).$byte;
		$hex.=$byte."";
	}
	return $hex;
}

//Funzione per convertire da hex a ascii
function hex2ascii($hex){
	$ascii='';
	for($i=0; $i<strlen($hex); $i=$i+2) {
		$ascii.=chr(hexdec(substr($hex, $i, 2)));
	}
	return($ascii);
}

//aggiunge gli zeri per trasformali in euro
function decimali($importo){
	$punto=strpos($importo,".");
	if($punto==false){
		$risultato=$importo.".00";
	}else{
		$divido=explode(".",$importo);
		switch (strlen($divido[1])) {
			case 1:
				$risultato=$importo."0";
				break;
			case 2:
				$risultato=$importo;
				break;
			default:
				$risultato=$importo;
		}	
	}
	return $risultato;
}

//Spese di spedizione
function fascespedizione($spese){
	if($spese==0){
		$risultato="0.00";
	}

	if($spese>0 and $spese<3){
		$risultato="10.00";
	}
	
	if($spese>=3){
		$risultato="20.00";
	}
	return $risultato;
}
?>