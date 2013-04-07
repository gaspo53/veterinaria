<?php
//ESTE PHP MUESTRA LA NOTA ELEGIDA, PERO CON LINKS DE AMIN PARA ELIMINARLA

include_once("inicializar.php");
include_once('./login_logout.php');


if (hay_alguien()){
	$con = conectar_DB();
	$id_nota=$_GET['id'];
	$user = getSessionId();
	$consulta ="SELECT * FROM notas_recomendadas WHERE (id = '$id_nota')";
	$resul=$con->query($consulta);
	if ($lineax = $resul->fetchRow(MDB2_FETCHMODE_OBJECT)){
		$linea= $lineax;
		$con-> disconnect();
		if (($lineax->idusuario == $user) || (es_admin(getSessionId()))){
			$linea->fecha = convertirFecha($linea->fecha);
			$linea->nota = pasarATexto($linea->nota);
			$linea->titulo = pasarATexto($linea->titulo);
			$smarty->assign('nota_entera',$linea);
			$smarty->assign('template','nota_entera.tpl');
			$smarty->assign('titulo_pagina','Ver nota: '.$linea->titulo);
			$smarty->display('index.tpl');
		}else
			{   /// AL IGUAL QUE EN TODOS LOS "ver_*.php", SI HAY ALGUIEN PERO NO ES EL DUE�O, SOLO LO MOSTRAMOS
				header("Location: mostrar_nota.php?id=".$id_nota);
			}
	}
	else
		{
			$smarty->assign('template','aviso.tpl');
			$smarty->assign('error', NOTE_NOT_EXISTS);
			$smarty->display('index.tpl');
		}
}else
	{
		header("Location: mostrar_nota.php?id=".$_GET['id']);
   	}
?>