/////////////////// FUNCION PARA VALIDAR COOKIES
function checkCookies(){
	var cookieEnabled=(navigator.cookieEnabled)? true : false
	
	//if not IE4+ nor NS6+
	if (typeof(navigator.cookieEnabled)=="undefined" && !cookieEnabled){ 
	document.cookie="testcookie"
	cookieEnabled=(document.cookie.indexOf("testcookie")!=-1)? true : false;
	}
	if (!cookieEnabled){
		alert("Si no habilitas las COOKIES de su navegador, no podra iniciar sesion en el sitio");
		document.getElementById('errores_varios').innerHtml= "<b> NO TIENE COOKIES HABILITADAS, HABILITELAS!!!!!!!!!!!!!!</b>";
		return false;
	}
	return true;
}
////////////////////////////////////////////////

function trim(str) {

 res="";

 for(var i=0; i< str.length; i++) {
   if (str.charAt(i) != " ") {
     res +=str.charAt(i);
  }
 }   
 return res;
}

function validar_blancos(items){
	arreglito = items.split("|");
	for ( indice in arreglito){
		pal = document.getElementById(arreglito[indice]).value;
		if ( trim(pal).length == 0 ) {
			alert('Por favor complete todos los datos');
			return false;
		}		
	}
	return true;
}

function validar_mail(emailStr) {

	emailStr = document.getElementById(emailStr).value;
	var emailPat=/^(.+)@(.+)$/;
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	var quotedUser="(\"[^\"]*\")";
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;

	var atom=validChars + '+';
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
	
	
	var matchArray=emailStr.match(emailPat);
	
	if (matchArray==null) {
		alert("La dirección de email es inválida.");
		return false;
	}
	
	var user=matchArray[1];
	var domain=matchArray[2];
	
	// Si el user "user" es valido 
	if (user.match(userPat)==null) {
		// Si no
		alert("El nombre de usuario no es válido.");
		return false;
	}
	
	/* Si la dirección IP es válida */
	var IPArray=domain.match(ipDomainPat);
	if (IPArray!=null) {
		for (var i=1;i<=4;i++) {
			if (IPArray[i]>255) {
				alert("IP de destino inválida");
				return false;
			}
		}
		return true;
	}
	
	var domainArray=domain.match(domainPat);
	if (domainArray==null) {
		alert("El dominio parece no ser válido.");
		return false;
	}
	
	var atomPat=new RegExp(atom,"g");
	var domArr=domain.match(atomPat);
	var len=domArr.length;
	if ( (domArr[domArr.length-1].length<2) || (domArr[domArr.length-1].length>3) ) {
		alert('La dirección debe tener 3 letras si es .com o 2 si en de algún pais.');
		return false;
	}
	
	if (len<2) {
		var errStr="La dirección de email es inválida.";
		alert(errStr);
		return false;
	}
	return true;
}

function validar_registro(nuevo_registro){

	if (document.getElementById('pass').value != document.getElementById('passVerify').value ){
		alert('Las contraseñas no coinciden');
		return false;
	}else{
		if (nuevo_registro == 'TRUE'){
			return ( (validar_blancos('nombre|apellido|direccion|telefono|user|pass|passVerify|profesion')) && (validar_mail('email')) );
		}else{
			//controla que se haya ingresado alguna de las contraseñas
			if ( (trim(document.getElementById('oldPassword').value).length != 0) || ( trim(document.getElementById('pass').value).length != 0) || ( trim(document.getElementById('passVerify').value).length != 0) ){
				return ((validar_blancos('nombre|apellido|direccion|telefono|profesion|pass|oldPassword|passVerify'))&&(validar_mail('email')));
			}else{				
				return ((validar_blancos('nombre|apellido|direccion|telefono|profesion'))&&(validar_mail('email')));
			}
		}
	}
}

function validar_busqueda_avanzada(){
	alguna = trim(document.getElementById('alguna_palabra').value);
	todas = trim(document.getElementById('todas_palabras').value);
	ninguna = trim(document.getElementById('sin_palabras').value);
	ch1 = document.getElementById('bus_articulos').checked;
	ch2 = document.getElementById('bus_eventos').checked;
	ch3 = document.getElementById('bus_links').checked;		
	ch4 = document.getElementById('bus_notas').checked;
	ch5 = document.getElementById('bus_novedades').checked;

	if ( (alguna.length == 0)&&(todas.length == 0)&&(ninguna.length == 0) ){
		alert('Por favor ingrese al menos una palabra a buscar');
		return false;
	}else{
		if (!( (ch1)||(ch2)||(ch3)||(ch4)||(ch5) )){
			alert('Por favor seleccione al menos una categoría donde buscar');
			return false;
		}else{ return true; }
	}	
}

function validar_busqueda_comun(str){
	if ( trim(str).length == 0 ){
		alert('Por favor ingrese la(s) palabra(s) a buscar');
		return false;
	}
	return true;
}

function validar_contacto(){
	return ( validar_blancos('nombre|mensaje')&&(validar_mail('email')) );
}