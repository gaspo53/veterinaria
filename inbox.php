<?php

// ESTE PHP ES UTILIZADO POR LA FUNCION "checkInbox()" de JAVASCRIPT (AJAX) PARA COMPROBAR SI EL USUARIO TIENE MENSAJES NUEVOS
include_once("DB.php");
include_once("inicializar.php");
if (hay_alguien()){
		$idUser = getSessionUsername(); //El usuario quiere ver su Bandeja de Entrada
		$con = conectar_DB();
		$msg_state = MENSAJE_NO_LEIDO;
		$consulta ="SELECT * FROM mensajes WHERE (destinatario = '$idUser') AND (leido = '$msg_state') ORDER BY id DESC";
		$resul=$con->query($consulta);
		$cont = 0;
		$arrd = array();
		while ($lineax = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
			$cont++;
		}
		$con-> disconnect();
		print $cont;
} else
	{
		header("Location: index.php"); //ACA NOS VAMOS POR SI LLAMAN AL PHP POR GET
	}
?>
