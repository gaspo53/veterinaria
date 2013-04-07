<?php

include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
	$usuario = get_user_data_from_username($_GET['usuarios']);
	$id_usuario = $usuario->id;
	/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = "SELECT * FROM links_interes WHERE idusuario = '$id_usuario' ORDER BY id DESC";
		 
		 $_pagi_cuantos = CANT_LINKS_POR_PAGINA;
													
		 $_pagi_nav_num_enlaces = 5;
													
		 $_pagi_mostrar_errores = FALSE;
													
		 $_pagi_separador = ' ';
	
	/* FIN VARIS*/
	include_once('./paginator.inc.php');
	$arreglo= array();
	$cont=0;
	while ($lineax = $_pagi_result->fetchRow(MDB2_FETCHMODE_OBJECT)){
		$arreglo[$cont++]=$lineax;
	}	
	if ($cont == 0){
		$smarty->assign('info_user',"No hay links de ".$usuario->username." (".$usuario->nombre." ".$usuario->apellido.")");
	}else{
		$smarty->assign('info_user',"Links De ".$usuario->username." (".$usuario->nombre." ".$usuario->apellido.")");
		 }
	$smarty->assign('links_completos',$arreglo);
	$smarty->assign('barra',$_pagi_navegacion);
	$smarty->assign('template','links_completos.tpl');
}else{
		$smarty->assign('error',ES_VISITANTE_LINK);
		$smarty->assign('template','aviso.tpl');
	}
$smarty->display('index.tpl');
?>