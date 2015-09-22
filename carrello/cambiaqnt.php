<?php
	if(isset($_POST['elemento']) and strlen($_POST['elemento'])>0){
		$elem=$_POST['elemento'];
		if(isset($_POST['cambio']) and strlen($_POST['cambio'])>0){
			if($_POST['cambio']=="+"){
				$_SESSION['carrello'][$elem][4]=$_POST['quantita']+1;
			}	
			
			if($_POST['cambio']=="-"){
				if(($_POST['quantita']-1)>0){
					$_SESSION['carrello'][$elem][4]=$_POST['quantita']-1;
				}	
			}
		}	
	}

?>		