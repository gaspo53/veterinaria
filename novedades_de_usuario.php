<?php

include_once("inicializar.php");
include_once('./login_logout.php');


if ( (hay_alguien()) && (es_admin(getSessionId())) ){
	$usuario = get_user_data_from_username($_GET['usuarios']);
	$id_usuario = $usuario->id;
	/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = "SELECT * FROM novedades WHERE idusuario = '$id_usuario' ORDER BY id DESC";
		 
		 $_pagi_cuantos = CANT_NOVEDADES_POR_PAGINA;
													
		 $_pagi_nav_num_enlaces = 5;
													
		 $_pagi_mostrar_errores = FALSE;
													
		 $_pagi_separador = ' ';
	
	/* FIN VARIS*/
	include_once('./paginator.inc.php');
	$arreglo= array();
	$cont=0;
	while ($lineax = $_pagi_result->fetchRow(MDB2_FETCHMODE_OBJECT)){
		$lineax->fecha = convertirFecha($lineax->fecha);
		$arreglo[$cont++]=$lineax;
	}	
	if ($cont == 0){
		$smarty->assign('info_user',"No hay novedades de ".$usuario->username." (".$usuario->nombre." ".$usuario->apellido.")");
	}else{
		$smarty->assign('info_user',"Novedades De ".$usuario->username." (".$usuario->nombre." ".$usuario->apellido.")");
		 }
	$smarty->assign('novedades_completa',$arreglo);
	$smarty->assign('barra',$_pagi_navegacion);
	$smarty->assign('template','novedades_completa.tpl');
	$con-> disconnect();
}else{
		$smarty->assign('template','aviso.tpl');
		$smarty->assign('error',NO_TIENE_PERMISOS);
	}
$smarty->display('index.tpl');
?>