<?php	
	//Prendo l'Id-coupon scritto nella variabile GET e lo scrivo nella text corrispondente	
	if(isset($_GET['idcoupon']) and strlen($_GET['idcoupon'])>0){
?>		<script>
			if(document.getElementById("idcoupon")!=null){
				document.getElementById("idcoupon").value='<?php print $_GET['idcoupon']; ?>';
				document.getElementById("idcoupon").focus();
			}	
		</script>	
<?php		
	}	
	
	//Prendo l'Id-coupon scritto nella variabile POST nel riquadro per aumentare la quantità e lo scrivo nella text corrispondente	
	$elementoa=$_POST['elemento'];
	if(isset($_POST['idcouponq'.$elementoa]) and strlen($_POST['idcouponq'.$elementoa])>0){ 
?>		<script>
			if(document.getElementById("idcoupon")!=null){
				document.getElementById("idcoupon").value='<?php print $_POST['idcouponq'.$elementoa]; ?>';
				document.getElementById("idcoupon").focus();
			}	
		</script>	
<?php		
	}	

	//Prendo l'Id-coupon scritto nella variabile POST nel riquadro per eliminare una quantità e lo scrivo nella text corrispondente	
	$elementob=$_POST['elimina'];
	if(isset($_POST['idcoupone'.$elementob]) and strlen($_POST['idcoupone'.$elementob])>0){ 
?>		<script>
			if(document.getElementById("idcoupon")!=null){
				document.getElementById("idcoupon").value='<?php print $_POST['idcoupone'.$elementob]; ?>';
				document.getElementById("idcoupon").focus();
			}	
		</script>	
<?php		
	}	
?>