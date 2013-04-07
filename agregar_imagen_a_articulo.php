<?php
// MUESTRA EL FORMLUARIO PARA AGREGAR UNA IMAGEN A UN ARTICLO EXISTENTE

include_once("inicializar.php");
include_once('./login_logout.php');
if (hay_alguien()){
	$id_articulo=$_GET['id'];
	$smarty->assign('template','form_imagen.tpl');
	$smarty->assign('id_articulo',$id_articulo);
}else{
	$smarty->assign('error',INICIAR_SESION);
	$smarty->assign('template','aviso.tpl');
}
$smarty->assign('titulo_pagina','Agregar im&aacute;gen a art&iacute;culo');
$smarty->display('index.tpl');
?>