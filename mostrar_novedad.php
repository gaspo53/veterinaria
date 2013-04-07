<?php
//ESTE PHP MUESTRA LA NOVEDAD ELEGIDA, PERO SOLO PARA VERLA
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');
$con = conectar_DB();
$id_novedad=$_GET['id_novedad'];
$consulta ="SELECT * FROM novedades WHERE id = $id_novedad";
$resul=$con->query($consulta);
if ($lineax = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
	$lineax->fecha = convertirFecha($lineax->fecha);
	$lineax->nombre_corto = pasarATexto($lineax->nombre_corto);
	$lineax->nombre_largo = pasarATexto($lineax->nombre_largo);
	$lineax->desc_corta = pasarATexto($lineax->desc_corta);
	$lineax->desc_larga = pasarATexto($lineax->desc_larga);
	$smarty->assign('novedad',$lineax);
	$smarty->assign('titulo_pagina','Ver novedad:');
	$smarty->assign('template','novedad_entera_no_login.tpl');
	$con-> disconnect();
}else{
	$smarty->assign('template','aviso.tpl');
	$smarty->assign('error', NEW_NOT_EXISTS);
}
	$smarty->display('index.tpl');
?>