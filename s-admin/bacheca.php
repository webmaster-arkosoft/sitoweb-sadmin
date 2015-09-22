<?	session_start();
	if(isset($_SESSION['wadmin']) and $_SESSION['wadmin']=="1"){
		unset($_SESSION['lista']);
		unset($_SESSION['query']);
		include "inclusi/headerbacheca.php";	
?>
<html>
<head>
	<title>S-admin -- Bacheca</title>
	<!--STILE BACHECA-->
	<link rel="stylesheet" type="text/css" href="css/bacheca.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/stylemenu.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/sddm.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/style1.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/prototype.js"></script>
	<script type="text/javascript" src="js/scriptaculous.js"></script>
	<script type="text/javascript" src="js/unittest.js"></script>
	<!--FINE BACHECA-->
	
	<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://statistiche.arkosoft.it/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 17]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="http://statistiche.arkosoft.it/piwik.php?idsite=17" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

	
</head>
<body>
	<div class="box1">
<?		include "inclusi/header.php"?>
		<div class="box3">
			<table width="990px;" border="0" style="font-size: 30px; font-family: Monotype Corsiva;">
				<tr>
					<td width="215px;" valign="top">
						<div class="menusinistra">
							<? include "inclusi/menuleft.php"; ?>
						</div>
					</td>
					<td width="770px">
						<img src="immagini/icona_casa.gif">Bacheca
						<hr />
						<div class="statistiche">
							<? include "inclusi/statistiche.php"; ?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>
<? } else { 
	Header("Location: http://".$_SERVER['HTTP_HOST']."/");
 }
?>
