<?php
// MUESTRA EL FORMLUARIO PARA AGREGAR UN LINK

include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
	$smarty->assign('titulo_pagina','Agregar Link de Inter&eacute;s');
	$smarty->assign('template','form_link.tpl');
	$smarty->assign('user_id',getSessionId());
}else{
	$smarty->assign('error',INICIAR_SESION);
	$smarty->assign('template','aviso.tpl');
}
$smarty->display('index.tpl');
?>
