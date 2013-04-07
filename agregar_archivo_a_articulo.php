<?php

// MUESTRA EL FORMLUARIO PARA AGREGAR UN ARCHIVO A UN ARTICULO EXISTENTE

include_once("inicializar.php");
include_once('./login_logout.php');
if (hay_alguien()){
	$id_articulo=$_GET['id'];
	$smarty->assign('template','form_archivo.tpl');
	$smarty->assign('id_articulo',$id_articulo);
}else{
	$smarty->assign('error',INICIAR_SESION);
	$smarty->assign('template','aviso.tpl');
}
$smarty->assign('titulo_pagina','Agregar archivo a art&iacute;culo');
$smarty->display('index.tpl');
?>