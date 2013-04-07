
///////////////////// VALIDACION DEL NOMBRE DE USUARIO ELEGIDO PARA REGISTRARSE
function checkUsername() {
  var form = document.forms['form_registro'];
  var resultado = document.getElementById('ajax_result_username');
  var contenttype = 'application/x-www-form-urlencoded';
  var req;

if (window.XMLHttpRequest) {
    req = new XMLHttpRequest();
  } else {
    req = new ActiveXObject("Microsoft.XMLHTTP");
  }
  req.open('POST', './username_availability.php', true);
  req.setRequestHeader('Content-Type', contenttype);
  req.onreadystatechange =
    function() {
      if ( (req.readyState == 4) && (req.responseText == 0) ) {
        resultado.innerHTML = '<p style="color:orange; text-align:right">Nombre De Usuario No Disponible<p>';
		document.getElementById('enviar_registro').disabled="disabled";
	  } else 	
	  		{ resultado.innerHTML = '<p style="color:green; text-align:right">Nombre De Usuario Disponible<p>';
	          document.getElementById('enviar_registro').disabled="";
			}
    }
  req.send('username=' + escape(form.user.value));
}
////////////////// MENSAJES NUEVOS
function checkInbox() {
  var resultado = document.getElementById('ajax_result_inbox');
  resultado.innerHTML="<img id='ajax_wait' src='./images/ajax-loader.gif'>";
  var contenttype = 'application/x-www-form-urlencoded';
  var req;

if (window.XMLHttpRequest) {
    req = new XMLHttpRequest();
  } else {
    req = new ActiveXObject("Microsoft.XMLHTTP");
  }
  req.open('POST', './inbox.php', true);
  req.setRequestHeader('Content-Type', contenttype);
  req.onreadystatechange =
    function() {
      if ( (req.readyState == 4) && (req.responseText != 0) )
        resultado.innerHTML = "<a href='./bandeja_entrada.php?leido=0' style='color:#CC9933'> Ud. Tiene "+req.responseText+" Mensaje/s Nuevo/s";
	  else
	  	resultado.innerHTML="";
    }
  req.send('leido=' + '0');
}