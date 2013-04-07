<?php

include_once("inicializar.php");
include_once('./login_logout.php');

if ( (hay_alguien()) && (es_admin(getSessionId())) ){
		
	$usuario = get_user_data_from_username($_GET['usuarios']);

	$id_usuario = $usuario->id;
	/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = "SELECT * FROM articulos WHERE idusuario = '$id_usuario' ORDER BY id DESC";
		 
		 $_pagi_cuantos = CANT_ARTICULOS_POR_PAGINA;
													
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
	if ($cont == 0){ // NO HUBO COINCIDENCIAS (EL USUARIO NO TIENE ARTICULOS)
		$smarty->assign('info_user',"No hay articulos de ".$usuario->username." (".$usuarionombre." ".$usuario->apellido.")");
	}else{
		$smarty->assign('info_user',"Articulos De ".$usuario->username." (".$usuario->nombre." ".$usuario->apellido.")");
		 }
	$smarty->assign('articulos_completo',$arreglo);
	$smarty->assign('barra',$_pagi_navegacion);
	$smarty->assign('template','articulos_completo.tpl');
}else{
		$smarty->assign('error',NO_TIENE_PERMISOS);
		$smarty->assign('template','aviso.tpl');
	}
$smarty->display('index.tpl');
?>