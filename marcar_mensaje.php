<?php

// ESTE PHP SE UTULIZA PARA MARCAR UN MESAJE (COMO LEIDO, NO LEIDO)
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if ( es_duenio_del_mensaje($_GET['id']) ){
	$con = conectar_DB();
	$resul=$con->query($consulta);
	$user = getSessionUsername();
	$leido = $_GET['leido'];
	$id = $_GET['id'];
	$consulta ="UPDATE mensajes SET 
			leido = '$leido'
			WHERE (id = '$id')";
	$resul=$con->query($consulta);
	if (!(DB::isError($resul))){
				$smarty->assign('error',' Se actualizó correctamente el estado del mensaje');
	}else
	{ 
			$smarty->assign('error',' Se produjo un error en actualizar el mensaje');

	}
	$smarty->assign('link_temp','./ver_mensaje.php?id='.$_GET['id']);
	$smarty->assign('desc_temp','Volver al Mensaje');
	$smarty->assign('link_temp2','./bandeja_entrada.php');
	$smarty->assign('desc_temp2','Volver a la Bandeja de Entrada');
}else
	{$smarty->assign('error', MESSAGE_OWN);}
$con-> disconnect();
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>
