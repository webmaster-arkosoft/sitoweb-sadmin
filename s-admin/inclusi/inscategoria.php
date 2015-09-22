<?
	if(strlen($_POST['newcat'])>0){
		$newcat=$_POST['newcat'];
		$query="select * from categorie where nome='".mysql_real_escape_string($newcat)."'";
		$ris=mysql_query($query) or die ("Query: ".$query." non eseguita!");
		$cat=@mysql_result($ris,0,0);
		if(strlen($cat)==0){
			mysql_query("insert into categorie values(default,'".mysql_real_escape_string($newcat)."')");
			echo "<div class='messaggio'><strong>Categoria inserita correttamente!</strong></div>";		
		}else{
			echo "<div class='erroremsg'><strong>Categoria gi&agrave; esistente!</strong></p></div>";		
		}
	}else{
		echo "<div class='erroremsg'><strong>Inserisci il nome di una categoria!</strong></div>";		
	}
?>