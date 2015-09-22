<?php
	if(isset($_GET['prodottodb'])){
		//Controllo se il carrello è vuoto o meno
		if(count($_SESSION['carrello'])==0){
			$_SESSION['carrello']=Array();
			//Lista dei prodotti presenti nel carrello
			include "listaprodotti.php";
			$_SESSION['carrello']=Array($software);
		}else{
			$qnt=false;
			//Se il carrello di softshop esiste già
			for($a=0; $a<count($_SESSION['carrello']); $a++){
				//Controllo che softshop è stato scelto e aumento le quantita di quella licenza
				if($_GET['prodottodb']==$_SESSION['carrello'][$a][0]){
					$_SESSION['carrello'][$a][4]=$_SESSION['carrello'][$a][4]+1;
					$qnt=true;
				}
			}
			//Se non esiste un prodotto simile lo aggiungo al carrello
			if($qnt==false){
				//Lista dei prodotti presenti nel carrello
				include "listaprodotti.php";

				if(count($software)>0){
		
					array_push($_SESSION['carrello'], $software);
				}	
			}
		}	
	}


?>		