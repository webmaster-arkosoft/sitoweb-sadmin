<?php
	//Ricavo il browser osato
	$lista1=$_SERVER['HTTP_USER_AGENT'];
	$browser=explode(';',$lista1);
	$browser=$browser[1]; 
?>
<html>
<head>
	<title>Software Arredamento</title>
<?php 
		if(strstr($browser, 'MSIE')==true){
?>			<link rel="stylesheet" type="text/css" href="css/oscura.css" media="screen" />
<?php	}else{?>
			<link rel="stylesheet" type="text/css" href="css/oscura_moz.css" media="screen" />
<?php	}?>
	<script language="javascript">
	function chiudi(){
		top.document.getElementById("iframeb").style.display='none';
		top.document.getElementById('oscura1').style.display='none';
	}
	</script>
</head>
<body style="border:0;	padding:0;	margin:0;">
<div class="sfondobenvenuto" Onclick="javascript: chiudi();">&nbsp;</div>
</body>
</html>