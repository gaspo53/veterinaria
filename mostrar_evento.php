<?php
//ESTE PHP MUESTRA EL VENENTO ELEGIDA, PERO SOLO PARA VERLA
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');
$con = conectar_DB();
$id_evento=$_GET['id'];
$consulta ="SELECT * FROM eventos WHERE id = $id_evento";
$resul=$con->query($consulta);
if ($lineax = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
	$lineax->fecha_comienzo = convertirFecha($lineax->fecha_comienzo);
	$lineax->fecha_fin = convertirFecha($lineax->fecha_fin);
	$lineax->fecha = convertirFecha($lineax->fecha);
	$lineax->titulo = pasarATexto($lineax->titulo);
	$lineax->descripcion = pasarATexto($lineax->descripcion);
	$lineax->lugar = pasarATexto($lineax->lugar);
	$smarty->assign('titulo_pagina','Ver evento: '.$lineax->titulo);
	$smarty->assign('evento_entero_no_login',$lineax);
	$smarty->assign('template','evento_entero_no_login.tpl');
	$con-> disconnect();
}else{
	$smarty->assign('template','aviso.tpl');
	$smarty->assign('error', NEW_NOT_EXISTS);
}
	$smarty->display('index.tpl');
?>