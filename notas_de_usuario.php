<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');


if ( (hay_alguien()) && (es_admin(getSessionId())) ){
	$usuario = get_user_data_from_username($_GET['usuarios']);
	$id_usuario = $usuario->id;
	/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = "SELECT * FROM notas_recomendadas WHERE idUsuario = '$id_usuario' ORDER BY id DESC";
		 
		 $_pagi_cuantos = CANT_NOTAS_POR_PAGINA;
													
		 $_pagi_nav_num_enlaces = 5;
													
		 $_pagi_mostrar_errores = FALSE;
													
		 $_pagi_separador = ' ';
	
	/* FIN VARIS*/
	include_once('./paginator.inc.php');
	$arreglo= array();
	$cont=0;
	while ($lineax = $_pagi_result->fetchRow(DB_FETCHMODE_OBJECT)){
		$arreglo[$cont++]=$lineax;
	}	
	if ($cont == 0){
		$smarty->assign('info_user',"No hay notas de ".$usuario->username." (".$usuario->nombre." ".$usuario->apellido.")");
	}else{
		$smarty->assign('info_user',"Notas De ".$usuario->username." (".$usuario->nombre." ".$usuario->apellido.")");
		 }
	$smarty->assign('notas_completa',$arreglo);
	$smarty->assign('barra',$_pagi_navegacion);
	$smarty->assign('template','notas_completa.tpl');
	$con-> disconnect();
}else{
		$smarty->assign('template','aviso.tpl');
		$smarty->assign('error',NO_TIENE_PERMISOS);
	}		
$smarty->display('index.tpl');
?>