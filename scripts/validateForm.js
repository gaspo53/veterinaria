// JavaScript Document
function validate() 
{
	if ((document.getElementById('nombre').value == '') || (document.getElementById('apellido').value == '') || (document.getElementById('direccion').value == '') || (document.getElementById('telefono').value == '') || (document.getElementById('username').value == '') || (document.getElementById('password').value == '') || (document.getElementById('email').value == '') || (document.getElementById('profesion').value == ''))
	{
		alert("FALTAN DATOS");
		return(false);
	} 
	else 
	{
		if (( document.getElementById('password').value) != (document.getElementById('passwordVerify').value))
		{
			alert("LAS CONTRASEÑAS NO CONCUERDAN");
			return(false);
		}
	}
}

function validateModify() {
	if (  (document.getElementById('nombre').value == '') || (document.getElementById('apellido').value == '') || (document.getElementById('direccion').value == '') || (document.getElementById('telefono').value == '') || (document.getElementById('email').value == '') || (document.getElementById('profesion').value == ''))
	{
		alert("FALTAN DATOS");
		return(false);
	} 
	else 
	{
		if ( (document.getElementById('oldPassword').value != '') || (document.getElementById('newPassword').value != '') || (document.getElementById('passwordVerify').value != ''))
		{	
			if ( (document.getElementById('oldPassword').value == '') || (document.getElementById('newPassword').value == '') || (document.getElementById('passwordVerify').value == ''))
			{		
				alert("TODAS LAS CONTRASEÑAS DEBEN ESTAR COMPLETAS");
				return(false);
			} 
			else
			{
				if ( ( document.getElementById('newPassword').value) != (document.getElementById('passwordVerify').value) )
				{
					alert("LAS NUEVAS CONTRASEÑAS NO CONCUERDAN");
					return(false);
				}
			}
		}
	}
}