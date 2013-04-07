<?php
//ESTE PHP MUESTRA EL FORM PARA ELGIR UN USUARIO A MODIFICAR, PERO SOLO PARA ADMIN
include_once("DB.php");
include_once("inicializar.php");
include_once("login_logout.php");

if (tiene_permisos()){
	$user = $_GET['id'];
	$smarty->assign("datos_usuario",get_user_data($user));
	$smarty->assign('css_list',listarCSS());
	$smarty->assign('template','form_modificar.tpl');
	$smarty->assign('titulo_pagina','Modificar Datos de usuario');
} else
	{
		$smarty->assign('error',NO_TIENE_PERMISOS);
		$smarty->assign('template','aviso.tpl');
		$smarty->assign('titulo_pagina','No tiene permisos');
	} 
$smarty->display('index.tpl');
?>