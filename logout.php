<?php
	session_start();
	session_destroy();
	session_unset();
	require_once('./login_logout.php');
	setcookie('red_veterinaria_user',"",time()-3600);
	setcookie('red_veterinaria_pass',"",time()-3600);
	if ($_GET['cookie_error']) // ESTE PARAMETRO LO SETEA VALIDAR.PHP SI EXISTIA LA COOKIE PERO TENIA DATOS INVALIDOS
		$smarty->assign('error',"Su cookie ha vencido o est&aacute; corrupta, debe iniciar sesi&oacute;n nuevamente para renovarla");
	else
			$smarty->assign('titulo_pagina','Su sesi&oacute;n ha sido cerrada exitosamente');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');
	
?>