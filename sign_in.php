<?php
// ESTE PHP MUESTRA EL FORM DE REGISTRO

include_once("inicializar.php");
include_once('./login_logout.php');
if (!(hay_alguien())){
	$smarty->assign('css_list',listarCSS());
	$smarty->assign('titulo_pagina','Registraci&oacute;n');
	$smarty->assign('template','form_registro.tpl');
} else
	{
		$smarty->assign('error',"Primero salga de la sesi&oacute;n actual antes de efectuar un registro, sino quedar&aacute; ante la sociedad entera como un Spammer!!!!!!!!!!!!!!!!!!!!!");
		$smarty->assign('template','aviso.tpl');
	}
$smarty->display('index.tpl');
?>
