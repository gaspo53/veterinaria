<?php

include_once("inicializar.php");
include_once('./login_logout.php');


/* VARIABLES PARA EL PAGINADOR*/
 $_pagi_sql = "SELECT * FROM novedades WHERE 1 ORDER BY id DESC";
 
 $_pagi_cuantos = CANT_NOVEDADES_POR_PAGINA;
											
 $_pagi_nav_num_enlaces = 5;
											
 $_pagi_mostrar_errores = FALSE;
											
 $_pagi_separador = ' ';

/* FIN VARIS*/
include_once('./paginator.inc.php');
$cont = 0;
$arrd = array();

while ($lineax = $_pagi_result->fetchRow(MDB2_FETCHMODE_OBJECT)){
	$lineax->fecha = convertirFecha($lineax->fecha);
	$arrd[$cont] = $lineax;
	$cont++;
}
$smarty->assign('news_array',$arrd);
$smarty->assign('barra',$_pagi_navegacion);
$smarty->assign('template','novedades_center.tpl');
$smarty->assign('titulo_pagina','Novedades');
$smarty->display('index.tpl');
?>
