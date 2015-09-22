<ul id="sliding-navigation">
	<li class="sliding-element">
		<div class="contenutobutton">
			<a href="">
			<form action="bacheca1.php?att=<? print $_SESSION['prof']; ?>&ac=<? print $_SESSION['id']; ?>" method="post">
				<input type="image" src="http://www.softwarearredamento.com/s-admin/immagini/titolomenu.jpg" name="wp-submit" id="wp-submit" value="Collegati"/>
			</form>	
			</a>
		</div>	
	</li>
	<hr>
</ul>
<ul id="sliding-navigationaa">
	<li class="sliding-element">
		<a href="/index.html">
			<div class="testobacheca">Torna al Sito</div>
		</a>
	</li>
</ul>
<ul id="sliding-navigation1">
	<li class="sliding-element">
		<a href="profilo1.php?prof=<? print $_SESSION['id']; ?>">
			<div class="testobacheca">Modifica Profilo</div>
		</a>
	</li>
</ul>
<ul id="sliding-navigation2">
	<li class="sliding-element">
		<a href="/contattaci.html">
			<div class="testobacheca">Effettua una richiesta</div>
		</a>
	</li>
</ul>
