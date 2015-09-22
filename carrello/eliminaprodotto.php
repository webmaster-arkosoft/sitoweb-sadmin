<?php
	if(isset($_POST['elimina']) and strlen($_POST['elimina'])>0){
		$elem=$_POST['elimina'];
		if($_SESSION['carrello'][$elem][4]>1){
			$_SESSION['carrello'][$elem][4]=$_SESSION['carrello'][$elem][4]-1;
		}else{
			//Elimino prodotto
			unset($_SESSION['carrello'][$elem]);
			//Riordino le keys dell'array
			$_SESSION['carrello']=array_merge(array(),$_SESSION['carrello']); 
		}	
	}

?>		