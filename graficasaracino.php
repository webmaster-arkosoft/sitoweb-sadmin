<?php
	//Ricavo il browser osato
	$lista1=$_SERVER['HTTP_USER_AGENT'];
	$browser=explode(';',$lista1);
	$browser=$browser[1]; 
?>
<html>
<head>
	<title>Software Arredamento tema di Saracino Arreda</title>
	<meta name="title" content="Software Arredamento tema di Saracino Arreda" />
	<meta name="description" content="Un tema personalizzato del Software Arredamento realizzato per il portale di Saracino Arreda" />
	<meta name="keywords" content="software arredamento, saracino arreda, software per arredare casa, software arredamento 3d, arredare casa, software arredamento gratis" />
	<meta name="language" content="it" />
	<meta name="robots" content="index, follow" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<?php include "analitycs.php"; ?>
</head>
<body>
<noscript><div class="nojs">Questo sito richiede l'attivazione di Javascript!!!</div></noscript>
<div class="generale">
	<div class="header">
		<div class="menu">
			<div class="bottone"><a href="http://www.softwarearredamento.com" class="bottone"><div>Home</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/index.html?prev=1" class="bottone"><div>Preventivo</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/galleria.html" class="bottone"><div>Galleria</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/blog/" class="bottone"><div>Blog</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/guida/index.html" class="bottone"><div>Guida</div></a></div>
			<div class="bottone"><a href="http://ticket.arkosoft.it" class="bottone"><div>Supporto</div></a></div>
		</div>
		<div class="logo">&nbsp;</div>
	</div>
	<div class="contenuto1">
		<div class="spiegazione">
			<div class="divmascotte">
				<img src="immagini/mascotte.jpg">
			</div>
			<div class="messaggiomascotte">
				Questo &egrave; un esempio di sito realizzato con S-Admin. <br />
				La grafica del sito &egrave; personalizzata quindi scelta dal possessore del sito di Arredamento!
			</div>
			<div class="divfreccia">
				<a href="graficapoti.html"><img src="immagini/freccia.jpg"></a>
			</div>			
		</div>	
		<img src="immagini/graficasaracino.jpg">
	</div>
<?php include "footer.php"; ?>
</div>	
<div id="oscura"></div>
</body>
</html>