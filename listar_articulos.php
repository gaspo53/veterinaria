<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

/* VARIABLES PARA EL PAGINADOR*/
 $_pagi_sql = "SELECT * FROM articulos WHERE 1 ORDER BY id DESC";
 
 $_pagi_cuantos = CANT_ARTICULOS_POR_PAGINA;
											
 $_pagi_nav_num_enlaces = 5;
											
 $_pagi_mostrar_errores = FALSE;
											
 $_pagi_separador = ' ';

/* FIN VARIS*/
include_once('./paginator.inc.php');

$cont = 0;
$arrd = array();

while ($lineax = $_pagi_result->fetchRow(DB_FETCHMODE_OBJECT)){
	$lineax->fecha = convertirFecha($lineax->fecha);
	$arrd[$cont] = $lineax;
	$cont++;
}

$smarty->assign('articulos_completo',$arrd);
$smarty->assign('barra',$_pagi_navegacion);

$con-> disconnect();
$smarty->assign('titulo_pagina','Art&iacute;culos');
$smarty->assign('template','articulos_completo.tpl');
$smarty->display('index.tpl');



?>
