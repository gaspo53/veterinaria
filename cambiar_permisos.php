<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');
$flag_action = FALSE; /// FLAG PARA SABER SI SE PRODUJERON CAMBIOS Y ASI ENVIAR EL MAIL
if (tiene_permisos()){
	$user = $_GET['username'];
	if (getSessionUsername() != $user){
		$con = conectar_DB();
		$resul=$con->query($consulta);
		$tipo = $_GET['tipo'];
		$consulta ="UPDATE usuarios 
					SET tipo = '$tipo'
					WHERE username = '$user'";
		$resul=$con->query($consulta);
		$con-> disconnect();
		if (!(DB::isError($resul))){
					$flag_action = TRUE;
					$smarty->assign('error',UPDATE_USER_SUCCESS.' '.$user);
		}else
		{
				$smarty->assign('error',UPDATE_USER_ERROR.' '.$user);

		}
	}else
		{
			$smarty->assign('error', "UD NO SE PUEDE CAMBIAR LOS PERMISOS A SI MISMO");
		}
}else
	{
		$smarty->assign('error', NO_TIENE_PERMISOS);
	}
$smarty->assign('link_temp','./administrar_participantes.php');
$smarty->assign('desc_temp','Volver a Administrar Participantes');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');
//// ENVIO UN MAIL SI HUBO EXITO
if ($flag_action){
	if ($_GET['tipo'] == 1)
		$tipo_usuario = "ADMINISTRADOR";
	else
		$tipo_usuario = "PARTICIPANTE";
	
	$user= get_user_data_from_username($_GET['username']);
	$cuerpo ='<h1>Cambio de permisos de la Red Solidaria Veterinaria</h1><br>
				Su tipo de cuenta <strong>'.$user->username.'</strong> ha sido modificado a '.$tipo_usuario.'
				Atte., el equipo de Red Solidaria Veterinaria';
	$asunto = "Cambio de passwrod de Red Solidaria Veterinaria";
	$name_to = $user->nombre." ".$user->apellido;
	$hacia = $user->email;
	$from_link = getSessionUsername();
	enviarMail($hacia,$cuerpo,$asunto,$from_link,$name_to);
}
?>

