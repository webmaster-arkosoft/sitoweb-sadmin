<?

include('libConv.php');

function formtLocation($source){
	$source=strrev($source);
	$source=stristr($source,'/');
	$source=strrev($source);
	return $source;
}

$dimensione_massima=512000; //dimensione massima consentita per file in byte -> 1024 byte = 1 Kb
$dimensione_massima_Kb=$dimensione_massima/1024;
$cartella_upload="immagini/"; //cartella in cui eseguire l'upload (controllare permessi scrittura)
// percorso cartella relativo $cartella_upload="../public/";
$filtrare=1; //filtrare x estensioni ammesse? 1=si 0=no
$array_estensioni_ammesse=array('.jpg','.jpeg','.gif','.png'); //estensioni ammesse

if(!isset($_FILES['ilfile']) || $_FILES['ilfile']['size']==0)
	echo "Il file non &egrave; stato selezionato per l'upload";
elseif($_FILES['ilfile']['size']>$dimensione_massima)
	echo "Il file selezionato per l'upload supera dimensione massima di $dimensione_massima_Kb Kb";
else{
	if(isset($_GET['previous']))
		unlink(formtLocation($_SERVER['SCRIPT_FILENAME']).$_GET['previous']);
	$nome_file=$_FILES['ilfile']['name'];
	$errore="";
	if($filtrare==1){
		$estensione = strtolower(substr($nome_file, strrpos($nome_file, "."), strlen($nome_file)-strrpos($nome_file, ".")));
		if(!in_array($estensione,$array_estensioni_ammesse)){
			$errore.="Upload file non ammesso. Estensioni ammesse: ".implode(", ",$array_estensioni_ammesse)."<br/>";
		}
	}
	if(!file_exists($cartella_upload)){
		$errore.="La cartella di destinazione non esiste</br>";
	}
	
	if($errore==""){
		$file_path=$cartella_upload.virtualAddress($_FILES['ilfile']['name']);
		if(move_uploaded_file($_FILES['ilfile']['tmp_name'], $file_path)){
			chmod($file_path,0777); //permessi per poterci sovrascrivere/scaricare
			
			//Calcolo proporzioni immagine
			$css_="";
			list($width, $height, $type, $attr) = getimagesize($file_path);
			if($width>200){
				$css_="width:200px;";
				$alt_scala=($height*200)/$width;
				if($alt_scala>200)
					$css_="width:".($width*200)/$height."px;";
			}
			
			echo "<img src='".$file_path."' style=\"".$css_."padding:0px;margin:0px;border:0px;\"/>";
?>
			<script type="text/javascript">
				top.document.getElementById('formDiInvio').innerHTML="<input type=\"file\" name=\"ilfile\" onchange=\"micoxUpload(this.form,'upa.php?previous=<?print $cartella_upload.$_FILES['ilfile']['name'];?>','upload_2','<img src=loading.gif style=display:inline;/>','Errore nel caricamento')\"  style=\"font-size:10px;width:200px;padding:1px;margin:0px;\" />";
				top.document.getElementById('imageurl').value="popups/<?print $file_path;?>";
			</script>
<?
		}else{
			echo "Impossibile effettuare l'upload del file";
		}
	}else{
		echo $errore;
	}
}
?>
