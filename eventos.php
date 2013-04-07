<?php
//ESTE PHP LISTA TODOS LOS EVENTOS
require_once('./inicializar.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
include_once('./login_logout.php');
/* VARIABLES PARA EL PAGINADOR*/
 $_pagi_sql = "SELECT * FROM eventos ORDER BY id DESC";
 
 $_pagi_cuantos = CANT_EVENTOS_POR_PAGINA;
											
 $_pagi_nav_num_enlaces = 5;
											
 $_pagi_mostrar_errores = FALSE;
											
 $_pagi_separador = ' ';

/* FIN VARIS*/
include_once('./paginator.inc.php');
$cont = 0;
$arrd = array();
while ($lineax = $_pagi_result->fetchRow(DB_FETCHMODE_OBJECT)){
	$arrd[$cont] = $lineax;
	$arrd[$cont]->fecha = convertirFecha($arrd[$cont]->fecha);
	$cont++;
}
$smarty->assign('titulo_pagina','Eventos');
$smarty->assign('barra',$_pagi_navegacion);
$smarty->assign('template','eventos.tpl');
$smarty->assign('eventos',$arrd);
$smarty->display('index.tpl');
$con-> disconnect();
?>
