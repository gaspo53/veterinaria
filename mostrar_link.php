<?php
//ESTE PHP MUESTRA EL LINK ELEGIDA, PERO SOLO PARA VERLA

include_once("inicializar.php");
include_once('./login_logout.php');
$con = conectar_DB();
$id_link=$_GET['id'];
$consulta ="SELECT * FROM links_interes WHERE id = $id_link";
$resul=$con->query($consulta);
if ($lineax = $resul->fetchRow(MDB2_FETCHMODE_OBJECT)){
	$lineax->fecha = convertirFecha($lineax->fecha);
	$lineax->descripcion = pasarATexto($lineax->descripcion);
	$lineax->nombre = pasarATexto($lineax->nombre);
	$smarty->assign('link_entero_no_login',$lineax);
	$smarty->assign('titulo_pagina','Link de inter&eacute;s: '.$lineax->nombre);
	$smarty->assign('template','link_entero_no_login.tpl');
	$con-> disconnect();
}else{
	$smarty->assign('template','aviso.tpl');
	$smarty->assign('error', LINK_NOT_EXISTS);
}
$smarty->display('index.tpl');
?>