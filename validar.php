<?php

include_once("inicializar.php");

// PRIMERO ME FIJO SI HAY COOKIES SETEADAS Y SI EL USUARIO 
if (hay_cookies()){
		$login = $_COOKIE['red_veterinaria_user'];
		$password = $_COOKIE['red_veterinaria_pass'];
}
else{
	   		$login = $_POST['username'];
			$password = md5($_POST['password']);
	}
// AHORA HAYA PASADO CUALQUIERA DE LAS DOS COSAS, LAS VALIDO EN LA DB
if (validarStrings(array($login,$password))){	  
 	$cont = conectar_DB();
	$consu = "SELECT * FROM usuarios WHERE username = '$login' AND password = '$password'";
	$re=$cont->query($consu);
	if ($linea = $re->fetchRow(MDB2_FETCHMODE_OBJECT)){
		if ($linea->estado != USUARIO_ACTIVADO){
		 	  $smarty->assign('error', USER_NOT_ACTIVE);
		 } else 
		 	{		
			  $_SESSION['tipo_usuario_veterinaria'] = $linea->tipo;
			  $_SESSION['css_usuario_veterinaria'] = $linea->css;
			  $_SESSION['id_usuario_veterinaria'] = $linea->id;
			  $_SESSION['username_usuario_veterinaria'] = $linea->username;
			  $_SESSION['al_final_se_logueo'] = $linea->id;
			  $_SESSION['remember_user'] = "off";
			  if ($_POST['persistir_cookie'] == "on"){ // SE ELIGIO LA OPCION RECORDAR EN EL LOGIN
				  updateCookie($login,$password);
				  $_SESSION['remember_user'] = "on";
			  }else
			  	if (hay_cookies()) //QUIERE DECIR QUE EL LOGIN FUE EXITOSO YCON COOKIES
					$_SESSION['remember_user'] = "on";
			  header("Location: ./index.php?inicio_de_sesion='ok'");
			  
	    	}
	} else { // NO SE OBTUVO NINGUNA TUPLA DE LA BD
			if (!hay_cookies()){ // SI NO HAY COOKIES QUIERE DECIR QUE SE INGRESARON DATOS POR EL FORM
				$smarty->assign('error', LOGIN_INCORRECTO);
	        }else
				{  // SINO; QUIERE DECIR QUE LAS COOKIES TIENEN DATOS INVALIDOS
					header("Location: ./logout.php?cookie_error='inconsistent'");
				}
	}
	$cont->disconnect();
}else
		{	
			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
			$smarty->assign('desc_temp',"Volver a iniciar sesion");
			$smarty->assign('link_temp',"./index.php");
		}
require_once('./login_logout.php');
require_once("./usuarios_online.php");
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');
?>