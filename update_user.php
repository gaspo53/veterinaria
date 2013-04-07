<?php

// ESTE PHP SE USA PARA ACTUALIZAR LOS DATOS DE UN USUARIO, PUEDE SER EL MISMO O UN ADMIN MODIFICANDO A OTROS
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
	if ( (getSessionUsername() == $_POST['user']) || ((es_admin(getSessionId()))) ){
		$postParameters = array($_POST['nombre'], $_POST['apellido'], $_POST['oldPassword'], $_POST['pass'], $_POST['email'], $_POST['direccion'], $_POST['telefono'], $_POST['profesion'], $_POST['CSS'], $_POST['user']);
		//Compruebo la contraseña
		$con = conectar_DB();
		$consulta = "SELECT password FROM usuarios WHERE username = '$postParameters[9]'";
		$resul=$con->query($consulta);
		$passwd = $resul->fetchRow(DB_FETCHMODE_OBJECT);
		
		if ( ($passwd->password != md5($postParameters[2])) && (validarStrings(array($postParameters[2]))) ){
			$smarty->assign('error',$postParameters[9]." LA CONTRASEÑA ANTERIOR NO CONCUERDA");
		} else
	      { 
			if (!validarStrings(array($postParameters[2]))) { // SI LA PASSWD ORIGINAL ESTABA EN BLANCO, NO LA ACTUALIZO
				$consulta ="UPDATE usuarios SET 
				nombre = '$postParameters[0]',
				apellido = '$postParameters[1]',
				email = '$postParameters[4]',
				direccion = '$postParameters[5]',
				telefono = '$postParameters[6]',
				profesion = '$postParameters[7]',
				css = '$postParameters[8]'
				WHERE username = '$postParameters[9]'";
				$resul=$con->query($consulta);
				if (!(DB::isError($resul))){
					if (getSessionUsername() == $postParameters[9]) // PREGUNTO SI UN ADMIN QUISO CAMBIAR A UN USUARIO O NO
						setSessionCSS($postParameters[8]); // SI EL USUARIO MODIFICA SUS PROPIOS DATOS, LE ACTUALIZO EL CSS
					$smarty->assign('error', $postParameters[9].' Se actualiz&oacute; correctamente');
				}
			}else
			{
				if ( validarStrings(array($postParameters[3])) ){ // SI LA PASSWD ORIGINAL NO ESTABA EN BLANCO, SE SETEA
					$md5Pass = md5($postParameters[3]);
					$consulta ="UPDATE usuarios SET 
					nombre = '$postParameters[0]',
					apellido = '$postParameters[1]',
					password = '$md5Pass',
					email = '$postParameters[4]',
					direccion = '$postParameters[5]',
					telefono = '$postParameters[6]',
					profesion = '$postParameters[7]',
					css = '$postParameters[8]'
					WHERE username = '$postParameters[9]'";
					$resul=$con->query($consulta);
					if (!(DB::isError($resul))){
						if ( (getSessionRememberUser() == "on") & (getSessionUsername() == $postParameters[9]) ) 
						// SI EL USUARIO SE LOGUEO CON LA OPCION DE RECORDAR Y UN ADMIN NO ESTA CAMBIANDO A OTRO USUARIO
							updateCookie($postParameters[9],$md5Pass);
						$smarty->assign('error', UPDATE_USER_SUCCESS.' '.$postParameters[9]);
						if (getSessionUsername() == $postParameters[9]) // PREGUNTO SI UN ADMIN QUISO CAMBIAR A UN USUARIO O NO
							setSessionCSS($postParameters[8]); // SI EL USUARIO MODIFICA SUS PROPIOS DATOS, LE ACTUALIZO EL CSS
					}
				} else
					  {
					  	$smarty->assign('error', 'LA CONTRASE&Ntilde;A NO DEBE ESTAR EN BLANCO SI INTRODUJO LA ANTERIOR');
					  }
			}
			$con-> disconnect();
		}
	}else
	 	{
			$smarty->assign('error', "UD NO PUEDE MODIFICAR A OTRO USUARIO, ".NO_TIENE_PERMISOS);
		}
}else
	{
		$smarty->assign('template','aviso.tpl');
		$smarty->assign('error', INICIAR_SESION);
	}
$smarty->assign('link_temp','./index.php');
$smarty->assign('desc_temp','Volver a Principal');
$smarty->assign('template','aviso.tpl');
$smarty->assign('titulo_pagina','Modificar Datos');
$smarty->display('index.tpl');

?>
