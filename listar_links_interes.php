<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

/* VARIABLES PARA EL PAGINADOR*/
 $_pagi_sql = "SELECT * FROM links_interes WHERE 1 ORDER BY id DESC";
 
 $_pagi_cuantos = CANT_LINKS_POR_PAGINA;
											
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

// SI ES ADMIN MOSTRAMOS EN TPL DE COMPLETOS, EL CUAL TIENE EL LINK PARA ELIMINARLOS

if ( (hay_alguien()) && (es_admin(getSessionId())) ) 
	$smarty->assign('template','links_completos.tpl');
else
		$smarty->assign('template','links_center.tpl');

$smarty->assign('links_completos',$arrd);
$smarty->assign('barra',$_pagi_navegacion);
$smarty->assign('titulo_pagina','Links De Inter&eacute;s');
$smarty->display('index.tpl');



?>
