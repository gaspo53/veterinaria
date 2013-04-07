<?php
//ESTE PHP MUESTRA EL MENSAJE ELEGIDO

include_once("inicializar.php");
include_once('./login_logout.php');


if (hay_alguien()){
	$con = conectar_DB();
	$id_mensaje=$_GET['id'];
	$user = getSessionUsername();
	$consulta ="SELECT * FROM mensajes WHERE (id = '$id_mensaje')";
	$resul=$con->query($consulta);
	if ($lineax = $resul->fetchRow(MDB2_FETCHMODE_OBJECT)){
		$linea->id = $lineax->id;
		$linea->asunto = pasarATexto($lineax->asunto);
		$linea->remitente = pasarATexto($lineax->remitente);
		$linea->destinatario = pasarATexto($lineax->destinatario);
		$linea->mensaje = pasarATexto($lineax->mensaje);
		if (($lineax->destinatario == $user)){
			//MARCO EL MENSAJE COMO LEIDO
			$msg_state = MENSAJE_LEIDO;
			$consulta ="UPDATE mensajes SET 
			leido = '$msg_state'
			WHERE (id = '$id_mensaje')";
			$con->query($consulta);
			$smarty->assign('mensaje',$linea);
			$smarty->assign('asunto_mensaje_link',blancosAHtml($linea->asunto));
			$smarty->assign('template','mensaje_entero.tpl');
			$smarty->assign('titulo_pagina','Ver mensaje:');
			$con-> disconnect();
		}else
			{	
				$smarty->assign('template','aviso.tpl');
				$smarty->assign('error', MESSAGE_OWN);
			}
	}
	else
		{	
			$smarty->assign('template','aviso.tpl');
			$smarty->assign('error', MESSAGE_NOT_EXISTS);
		}
}else
	{
		$smarty->assign('template','aviso.tpl');
		$smarty->assign('error', INICIAR_SESION);
   	}		
$smarty->display('index.tpl');
?>