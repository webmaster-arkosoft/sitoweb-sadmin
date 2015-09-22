<?php
	
	//Cancellazione dell'idcoupon
	if(isset($_POST['selezionato1']) and strlen($_POST['selezionato1'])>0){
	
		$idcoupondb=mysql_real_escape_string($_POST['selezionato1']);
	
		//Cancello i vecchi prodotti associati
		mysql_query("DELETE FROM coupon WHERE id=".$idcoupondb."");

		$msg="Coupon eliminato correttamente! ";
	
	}	
?>