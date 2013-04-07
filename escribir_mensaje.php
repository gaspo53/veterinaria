<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
	$smarty->assign('template','form_mensaje.tpl');
	$smarty->assign('user_id',getSessionUsername());
	if (!(isset($_GET['usuario_a_responder']))){ // PUEDE SER QUE HAYA PUESTO RESPONDER O CONTACTAR PARTICIPANTE
		$smarty->assign('users',listarUsuarios());
		$smarty->assign('titulo_pagina','Nuevo Mensaje');
	} else {
			$username = $_GET['usuario_a_responder'];
			if ( (getSessionUsername()) != $username ){
				$smarty->assign('users',array(get_user_data_from_username($username)));
			}else{	// SI SE QUIERE RESPONDER A EL MISMO O ESCRIBIR A EL MISMO
					$smarty->assign('error',' No puede enviarse un mensaje a s&iacute; mismo!');
					$smarty->assign('link_temp','./escribir_mensaje.php');
					$smarty->assign('desc_temp','Intentar redactar nuevamente el mensaje');
					$smarty->assign('template','aviso.tpl'); 
				 }
		$smarty->assign('titulo_pagina','Responder Mensaje A '.$username);
	}
	if (isset($_GET['asunto'])){
		$asunto = "RE: ".str_replace("\'",'',$_GET['asunto']); // LE QUITAMOS EL \' QUE LE AGREGA LA CONVERSION DE ESPACIOS A %20 del href Responder
		$smarty->assign('asunto',$asunto);
	}
}else{
	$smarty->assign('error',INICIAR_SESION);
	$smarty->assign('template','aviso.tpl');
}
$smarty->display('index.tpl');
?>
