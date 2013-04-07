<?php
// MUESTRA EL FORMLUARIO PARA VER LAS NOTAS DE UN USUARIO (SOLO ADMIN)

include_once("inicializar.php");
include_once('./login_logout.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
if ( (hay_alguien()) && (es_admin(getSessionId())) ){
	$smarty->assign('users_list',listarUsuarios());
	$smarty->assign('template','form_elegir_usuario.tpl');
	$smarty->assign('form_action','./notas_de_usuario.php');
	$smarty->assign('titulo_pagina','Notas De Inter&eacute;s Por Usuario');
}
else{
		$smarty->assign('error',NO_TIENE_PERMISOS);
		$smarty->assign('template','aviso.tpl');
	}
$smarty->display('index.tpl');
?>