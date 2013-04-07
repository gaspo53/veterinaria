<?php
//ESTE PHP MUESTRA EL ARTICULO ELEGIDA, PERO SOLO PARA VERLA

include_once("inicializar.php");
include_once('./login_logout.php');

$con = conectar_DB();
$id_articulo=$_GET['id_articulo'];
$consulta ="SELECT * FROM articulos WHERE id = '$id_articulo'";
$resul=$con->query($consulta);
if ($lineax = $resul->fetchRow(MDB2_FETCHMODE_OBJECT)){
	$lineax->descripcion = pasarATexto($lineax->descripcion);
	$lineax->titulo = pasarATexto($lineax->titulo);
	$smarty->assign('articulo',$lineax);
	$smarty->assign('archivos_articulo',getFiles($id_articulo));
	$smarty->assign('imagenes_articulo',getImages($id_articulo));
	$smarty->assign('titulo_pagina','Ver art&iacute;culo: '.$lineax->titulo);
	$smarty->assign('template','articulo_entero_no_login.tpl');
	$con-> disconnect();
}else{
	$smarty->assign('template','aviso.tpl');
	$smarty->assign('error', ARTICLE_NOT_EXISTS);
}
$smarty->display('index.tpl');
?>