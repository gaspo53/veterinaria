<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

/* VARIABLES PARA EL PAGINADOR*/
 $_pagi_sql = "SELECT * FROM usuarios WHERE (estado = ".USUARIO_ACTIVADO.") ORDER BY nombre,tipo ASC";
 
 $_pagi_cuantos = CANT_PARTICIPANTES_POR_PAGINA;
											
 $_pagi_nav_num_enlaces = 5;
											
 $_pagi_mostrar_errores = FALSE;
											
 $_pagi_separador = ' ';

/* FIN VARIS*/

include_once('./paginator.inc.php');

$cont = 0;
$arrd = array();
while ($lineax = $_pagi_result->fetchRow(DB_FETCHMODE_OBJECT)){
	$arrd[$cont] = $lineax;
	$cont++;
}
$smarty->assign('admin2_array',$arrd);
$smarty->assign('template','participantes.tpl');
$smarty->assign('barra',$_pagi_navegacion);
include_once('./login_logout.php');
$smarty->assign('titulo_pagina','Participantes');
$smarty->display('index.tpl');



?>
