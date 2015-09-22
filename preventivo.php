<?php
	//Settaggio variabili
	$errore=false;
	$inviato=false;
	
	if(isset($_POST['inviopre']) and $_POST['inviopre']=="1"){
		//ricavo dati
		$nome=$_POST['nome'];
		$ragione=$_POST['ragione'];
		$paese=$_POST['cap']." ".$_POST['citta']." ".$_POST['prov'];
		$tel=$_POST['telefono'];
		$email=$_POST['email'];
		$richiesta=$_POST['richiesta'];
		//fine ricavo
		
		//CONTROLLO SE I CAMPI SONO VUOTI
		if(strlen($nome)==0){ $errore=true;}
		if(strlen($_POST['cap'])==0){ $errore=true;}
		if(strlen($_POST['cap'])!=5 or is_numeric($_POST['cap'])==false){ $errore=true;}
		if(strlen($tel)==0 or is_numeric($tel)==false){ $errore=true;}
		if(strlen($_POST['citta'])==0){ $errore=true;}
		if(strlen($_POST['prov'])==0){ $errore=true;}
		if(strlen($_POST['email'])==0 or strstr($_POST['email'],'@')==false){ $errore=true;}
		if(strlen($richiesta)==0){ $errore=true;}
		//FINE CONTROLLO

		//Se è stata accettata la legge sulla privacy invio l'email
		if($_POST['acconsento']=="on" and $errore==false){
			include "email.php";
			$inviato=true;
?>			<script type="text/javascript">aprinvio();</script>	
<?php		}
	}
?>