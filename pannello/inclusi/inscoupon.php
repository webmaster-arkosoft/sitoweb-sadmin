<?php
	$errore=false;
	$entra=false;
	$entra1=false;
	$entra2=false;
	$msg="I seguenti campi risultano vuoti o sbagliati: ";
	
	//Controllo campi
	if(isset($_POST['codice']) and strlen($_POST['codice'])==0){ 
		$errore=true; 
		$entra=true; 
		$msg.="codice, "; 
	}
	if(isset($_POST['codice']) and strlen($_POST['codice'])!=6 and $entra==false){ 
		$errore=true; 
		$msg.="codice, "; 
	}
	if(isset($_POST['datainizio']) and strlen($_POST['datainizio'])==0){ 
		$errore=true; 
		$entra1=true;
		$msg.="data inizio, "; 
	}
	if(isset($_POST['datainizio']) and $entra1==false){
		$control=explode("-",$_POST['datainizio']);
		if(count($control)!=3){
			$msg.="data inizio, ";
			$errore=true;
		}	
	}
	if(isset($_POST['datafine']) and strlen($_POST['datafine'])==0){ 
		$errore=true; 
		$msg.="datafine, "; 
	}
	if(isset($_POST['datafine']) and $entra2==false){
		$control1=explode("-",$_POST['datafine']);
		if(count($control1)!=3){
			$msg.="data fine, ";
			$errore=true;
		}	
	}
	if(isset($_POST['quantita']) and strlen($_POST['quantita'])==0){ 
		$errore=true; 
		$msg.="quantita, "; 
	}
	if(count($_POST['scelto'])==0){ 
		$errore=true; 
		$msg.="prodotti scontati. "; 
	}

	if($errore==false){

		$codicehex=ascii2hex(strtolower($_POST['codice']));
		
		//Controllo se esiste già un id coupon con questo codice
		$queryctrl=mysql_query("SELECT * FROM coupon WHERE codicecoupon='".$codicehex."'") or die ("Query id coupon non eseguita!");
		if(strlen(@mysql_result($queryctrl,0,0))>0){
			$msg="Questo ID-Coupon esiste gia' ";
			$errore=true;
		}else{
		
			//Sistemo l'array dei prezzi dei prodotti
			$listafiltrata = array_filter($_POST['prodscontato'], 'strlen');
			$listaprezzoscont=array_merge(array(),$listafiltrata);
			
			//Sistemo l'array degli id dei prodotti
			$listaidprezzo=array_merge(array(),$_POST['scelto']);
			
			//Sistemo la data di inizio
			$datainiziopost=explode("-",$_POST['datainizio']);
			$datainizio=$datainiziopost[2]."-".$datainiziopost[1]."-".$datainiziopost[0];
			
			//Sistemo la data di fine
			$datafinepost=explode("-",$_POST['datafine']);
			$datafine=$datafinepost[2]."-".$datafinepost[1]."-".$datafinepost[0];
			
			//Inserisco i coupon
			mysql_query("INSERT INTO coupon VALUES('default','".mysql_real_escape_string($codicehex)."','".mysql_real_escape_string($datainizio)."','".mysql_real_escape_string($datafine)."','".mysql_real_escape_string($_POST['quantita'])."','0')");
			
			$ultimo=mysql_insert_id();
			//Inserisco tutti i prodotti di questo id coupon
			for($a=0;$a<count($listaidprezzo);$a++){
				$idprodotto=$listaidprezzo[$a];
				$prezzoprod=$listaprezzoscont[$a];	
				mysql_query("INSERT INTO prodotticoupon VALUES('default','".$idprodotto."','".mysql_real_escape_string($ultimo)."','".mysql_real_escape_string(decimali($prezzoprod))."')");
			}
			$msg="Coupon inserito correttamente! ";
			$_POST['codice']="";
			$_POST['datainizio']="";
			$_POST['datafine']="";
			$_POST['quantita']="";
			$_POST['scelto']="";
			$_POST['prodscontato']="";
		}	
	}	
?>