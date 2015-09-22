var a=0;
var a1=0;
var apparizionediv=30;


function oscura() {   
	if (navigator.appVersion.indexOf("MSIE")!=-1){         
		document.getElementById("oscura1").style.width = screen.width;         
		document.getElementById("oscura1").style.height = screen.height+100;    
	}    
	document.getElementById("oscura1").style.display = "block";
	dissolvenza();
}


function dissolvenza(){
	var t=setTimeout("sfuma()", apparizionediv);
}
function sfuma(){
	a=a+0.1;
	a1=a1+10;
	if(a<=0.9){
		document.getElementById('oscura1').style.opacity=a;
		document.getElementById('oscura1').style.filter="alpha(opacity="+a1+")"; 
		dissolvenza();
	}else{
		document.getElementById('oscura1').style.opacity='0.8';
		caricabenvenuto();
	}
}


function caricabenvenuto(){
	document.body.innerHTML+="<div name='scrivipaginab' id='scrivipaginab'><iframe name='iframeb' id='iframeb' style='display:visible;position:absolute; top: 200px; right: 200px;' src='../benvenuto.php' height='163px' width='549px' FRAMEBORDER='0' SCROLLING='no'></div>";		
	return false;
}

function chiudibenvenuto(){
	top.document.getElementById("iframeb").style.display='none';
	top.document.getElementById('oscura1').style.display='none';
}
	
