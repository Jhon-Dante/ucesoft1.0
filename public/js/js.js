function verificarPadre(str){

	var xmlhttp;
	if (str=="")
	{
		document.getElementById("cedulaP").innerHTML="";
		return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("cedulaP").innerHTML=xmlhttp.responseText;		
		}
	}
	xmlhttp.open("GET", "admin/DatosBasicos/{"+str+"}/verificarPadre",true);
	xmlhttp.send();
}