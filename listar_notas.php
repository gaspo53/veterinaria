<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');


/* VARIABLES PARA EL PAGINADOR*/
 $_pagi_sql = "SELECT * FROM notas_recomendadas WHERE 1 ORDER BY id DESC";
 
 $_pagi_cuantos = CANT_NOTAS_POR_PAGINA;
											
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
$smarty->assign('notas',$arrd);
$smarty->assign('barra',$_pagi_navegacion);
$smarty->assign('template','notas.tpl');
$smarty->assign('titulo_pagina','Notas Recomendadas');
$smarty->display('index.tpl');

 

?>
