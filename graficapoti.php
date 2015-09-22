<html>
<head>
	<title>Software Arredamento tema di Potì Arredamenti</title>
	<meta name="title" content="Software Arredamento tema di Potì Arredamenti" />
	<meta name="description" content="Un tema personalizzato del Software Arredamento realizzato per il portale di Potì Arredamenti" />
	<meta name="keywords" content="software arredamento, potì arredamenti, software per arredare casa, arredamento, software arredare casa, software arredo" />
	<meta name="language" content="it" />
	<meta name="robots" content="index, follow" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<script type="text/javascript" src="js/preventivo.js"></script>
	<script type="text/javascript" src="js/demo.js"></script>
	<?php include "analitycs.php"; ?>
</head>
<body>
<noscript><div class="nojs">Questo sito richiede l'attivazione di Javascript!!!</div></noscript>
<div class="generale">
	<div class="header">
		<div class="menu">
			<div class="bottone"><a href="http://www.softwarearredamento.com" class="bottone"><div>Home</div></a></div>
			<div class="bottone" <? if($inviato==false){ ?>Onclick="javascript: apripreventivo();"<?}?>><a href="#" class="bottone"><div>Preventivo</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/galleria.html" class="bottone"><div>Galleria</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/blog/" class="bottone"><div>Blog</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/guida/index.html" class="bottone"><div>Guida</div></a></div>
			<div class="bottone"><a href="http://ticket.arkosoft.it" class="bottone"><div>Supporto</div></a></div>
		</div>
		<div class="logo">&nbsp;</div>
	</div>
	<div class="divpreventivo" id="divpreventivo">
<?		if($inviato==true){
?>			<div class="inviocorretto" id="inviocorretto">La tua Richiesta &egrave; stata inviata correttamente!</div>				
<?		}else{
			include "formrichiesta.php";
		} 
?>	</div>
	<div class="contenuto1">
		<div class="spiegazione1">
			<div class="divfreccia1">
				<a href="graficasaracino.html"><img src="immagini/freccia1.jpg"></a>
			</div>
			<div class="divmascotte">
				<img src="immagini/mascotte.jpg">
			</div>
			<div class="messaggiomascotte">
				Questo &egrave; un esempio di sito realizzato con Software Arredamento. <br />
				La grafica del sito &egrave; personalizzata quindi scelta dal possessore del sito di Arredamento!
			</div>			
		</div>	
		<img src="immagini/graficapoti.jpg">
	</div>
<?php include "footer.php"; ?>
</div>	
<div id="oscura"></div>
</body>
</html>