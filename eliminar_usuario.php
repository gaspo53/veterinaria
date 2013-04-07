<?php

include_once("inicializar.php");
include_once('./login_logout.php');


if (tiene_permisos()){
	$user = $_GET['id'];
	if ($user != getSessionId()){
			//SOLO LO PUEDE ELIMINAR SI ES UN ADMIN
		$con = conectar_DB();
		$consulta ="DELETE FROM usuarios WHERE id = '$user'";
		$resul=$con->query($consulta);
		$username = $_GET['username'];
		if (MDB2::isError($resul)){
			if ((MDB2::isError($resul))){
				$smarty->assign('error','EL USUARIO NO SE PUDO ELIMINAR');
			}
		} else {
				$smarty->assign('error', $username." SE ELIMINO CORRECTAMENTE");
				}
	} else {$smarty->assign('error',SALIR_DE_SESION);
			}
} else
	{
		$smarty->assign('error',NO_TIENE_PERMISOS);
	}
$smarty->assign('titulo_pagina','Eliminar Usuario');
$smarty->assign('link_temp','./administrar_participantes.php');
$smarty->assign('desc_temp','Volver a Administrar Participantes');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>