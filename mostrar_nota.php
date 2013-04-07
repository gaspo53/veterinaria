<?php
//ESTE PHP MUESTRA LA NOTA ELEGIDA, PERO SOLO PARA VERLA
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');
$con = conectar_DB();
$id_nota=$_GET['id'];
$consulta ="SELECT * FROM notas_recomendadas WHERE id = $id_nota";
$resul=$con->query($consulta);
if ($lineax = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
	$lineax->fecha = convertirFecha($lineax->fecha);
	$lineax->nota = pasarATexto($lineax->nota);
	$lineax->titulo = pasarATexto($lineax->titulo);
	$smarty->assign('nota_entera_no_login',$lineax);
	$smarty->assign('titulo_pagina','Ver nota: '.$lineax->titulo);
	$smarty->assign('template','nota_entera_no_login.tpl');
	$con-> disconnect();
}else{
	$smarty->assign('template','aviso.tpl');
	$smarty->assign('error', NOTE_NOT_EXISTS);
}
$smarty->display('index.tpl');
?>