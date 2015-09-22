<div class="box2">
	<div class="header">
		<a href="http://www.softwarearredamento.com" title="S-Admin">
			<img src="immagini/s-admin.jpg" border="0">
		</a>	
	</div>
	<div class="header1">
		<div class="testoheader1">
			Benvenuto <b><? print $_SESSION['prof']; ?></b> | <a href="http://<? print $_SERVER['HTTP_HOST']."/tema/esci.php?esci=1";?>" style="color:#fff;"><u>[Esci dall'account]</u></a>
		</div>	
		<div class="profilo">
			<a href="profilo1.php?prof=<? print $_SESSION['id']; ?>">
				<img src="immagini/freccia.jpg" border="0"> Profilo
			</a>
		</div>
	</div>
</div>