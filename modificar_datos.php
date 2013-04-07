<?php
//ESTE PHP MUESTRA EL FORM PARA MODIFICAR LOS DATOS DEL USUARIO LOGUEADO

include_once("inicializar.php");
include_once('./login_logout.php');
if (hay_alguien()){
	$logged_user = getSessionId();
	$smarty->assign("datos_usuario",get_user_data($logged_user));
	$smarty->assign('css_list',listarCSS());
	$smarty->assign('template','form_modificar.tpl');
	$smarty->assign('titulo_pagina','Modificar Datos');
}
else{
		$smarty->assign('template','aviso.tpl');
		$smarty->assign('error',INICIAR_SESION);
	}
$smarty->display('index.tpl');
?>