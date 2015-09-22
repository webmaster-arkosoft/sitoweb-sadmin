<?php
// Tolgo tutti i tag tranne il tag "img"
$contenuto=strip_tags($contenuto,'<img>');
//Setto l'array contenente le immagini da eliminare
global $array;
$array=array();
//Ricerco il contenuto del pèarametro src in tutte le linee del contenuto HTML
$tok = strtok($contenuto,">\n");
while ($tok !== false) { //Finche esistono ricghe HTML cerco i tag img
	prelevaImg($tok);
    $tok = strtok(">\n");
}
/*Funz<ione di prelievo contenuto src*/
function prelevaImg($sorgente){
	global $array;
	//Se la righa contiene un tag img
	if(stristr($sorgente,'<img ')){ 
		$sorgente=stristr($sorgente,'src="'); //Escludo tutto il contenuto precedente a 'src="'
		$sorgente=substr($sorgente,5); //Tolgo 'src="' dalla sorgente
		$sorgente=substr($sorgente,0,strpos($sorgente,'"'));//Escludo il resto del contenuto dopo la chiusura delle virgolette
		array_push($array,$sorgente); //-inserisco ciò che ho trovato nell'array precedentemente dichiarato
	}
}
/*Funzione per ricavare il nome del file da un path*/
function ricavoNomeFile($source){
	$source=strrev($source);
	$source=substr($source,0,strpos($source,'/'));
	$source=strrev($source);
	return $source;
}
/*Funzione per eliminare le immagini*/
function eliminaImmagine($source){
	unlink("popups/immagini/".$source);
}
//Eseguo la funzione 'ricavoNomeFile' per ottenere solo il nome dei file
$array=array_map('ricavoNomeFile',$array);
//Eliomino le occorrenze uguali nell'array
$array=array_unique($array);
//Visualizzo l'array
print_r($array);
//Eseguo la funzione di 'unlink' (eliminazione file)  per ogni elemento dell'array
$array=array_map('eliminaImmagine',$array);
?>