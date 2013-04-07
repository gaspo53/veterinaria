<?php

/// ESTE PHP (LLAMANDO CASI EN TODOS) ARMA EL MENU DE USUARIO Y EL ESTILO QUE ESTE ELIGIO (GUARDADO EN LA BD)
require_once('./inicializar.php');
if (!(hay_alguien()))
{ 
		$smarty-> assign('login_display','display:block');
		$smarty-> assign('logout_display','display:none');
} else {
		$smarty-> assign('login_display','display:none');
		$smarty-> assign('logout_display','display:block');
		$smarty-> assign('css',asignarCSS());
		$smarty-> assign('menu_items',asignarMenu());
		$user = getSessionUsername();
		$smarty-> assign('actual_user', $user);
		$smarty-> assign('exit', ' (Salir)');
	}
	
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
?>