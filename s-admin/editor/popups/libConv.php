<?
if(!function_exists('str_split')){
	function str_split($str) {
	   $arr = array();
	   if (is_string($str)) {
	      for ($i = 0; $i < strlen($str); $i++) {
            array_push($arr, $str[$i]);
	      }
	   }
	   return $arr;
	}          
}

function togliCaratteri($elemento){
	global $spazio;
	$comodo=ord($elemento);
	if($comodo==32){
		if($spazio===false)
			return $elemento;
		else		
			$spazio=true;
	}
	else
		if(($comodo>=45 && $comodo<46) || ($comodo>47 && $comodo<58) || ($comodo>64 && $comodo<91) || ($comodo>96 && $comodo<123)){
			$spazio=false;
			return $elemento;
		}
}

function spazio2tratto($string, $clear_enters = true) {
	$pattern = ($clear_enters == true) ? ("/\s+/") : ("/[ \t]+/");
	return preg_replace($pattern, "-", trim($string));
}

/*Filtro gli elementi vuoti*/
//La funzione elimina tutti gli elementi vuoti nell'array interessato
function elementiVuoti($var){
	if(strlen($var)){
		return $var;
	}
}

function convertiCaratteri($carattere){
	$com=ord($carattere);

	if($com>=168 and $com<=171)
		return 'e';
	if($com>=160 and $com<=165)
		return 'a';
	if($com==166)
		return 'ae';
	if($com==167)
		return 'c';
	if($com==176)
		return 'o';
	if($com==177)
		return 'n';
	if($com==189)
		return 'y';
	if($com>=172 and $com<=175)
		return 'i';
	if($com>=178 and $com<=182)
		return 'o';
	if($com>=185 and $com<=188)
		return 'u';
	return $carattere;
}

/*Funzione per ricavare l'estenzùsione del file da un path*/
function ricavoExtFile($source){
	$source=strrev($source);
	$source=substr($source,0,strpos($source,'.'));
	$source=strrev($source);
	return $source;
}

/*Funzione per ricavare il nome del file da un path*/
function ricavoNomeFile($source){
	$source=strrev($source);
	$source=substr($source,strpos($source,'.'));
	$source=strrev($source);
	return $source;
}

function virtualAddress($read){
	$buffer = "";
	$comodo = array();
	$ext = ".".ricavoExtFile($read);
	$read = ".".ricavoNomeFile($read); //Ricavo nome file

	$read = str_replace('"','',$read);
	$read = str_replace("'",'',$read);
	$comodo = str_split(strtolower($read));
	$comodo = array_map('convertiCaratteri',$comodo);
	$comodo = array_map('togliCaratteri',$comodo);
	$comodo = array_map('elementiVuoti',$comodo);
	$read = implode('',$comodo);

	return spazio2tratto($read).$ext;
}

//Uso
//print virtualAddress($_GET['titolo']);

?>
