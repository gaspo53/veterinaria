<?php
//PHP USADO APRA CAMBIAR EL ESTADO DE UN PARTICIPANTE (ACTIVARLO, DESACTIVARLO O SUSPENDERLO) UN ADMIN
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');
$activacion = $_GET['estado'];
if (tiene_permisos()){
	$user = $_GET['username'];
	if (getSessionUsername() != $user){ // PARA QUE NO SE CAMBIE LOS PERMISOS A SI MISMO
			$con = conectar_DB();
			$resul=$con->query($consulta);
			$estado = $_GET['estado'];
			$consulta ="UPDATE usuarios SET 
					estado = '$estado'
					WHERE username = '$user'";
			$resul=$con->query($consulta);
			if (!(DB::isError($resul))){
						$smarty->assign('error',UPDATE_USER_SUCCESS.' '.$user);
			}else
			{ 
					$smarty->assign('error',UPDATE_USER_ERROR.' '.$user);
		
			}
			$smarty->assign('link_temp','./administrar_participantes.php');
			$smarty->assign('desc_temp','Volver a Administrar Participantes');
	}else
		{
			$smarty->assign('error', "UD NO SE PUEDE CAMBIAR LOS PERMISOS A SI MISMO");
		}
}else
	{
		$smarty->assign('error', NO_TIENE_PERMISOS);
	}
$con-> disconnect();
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');
/// DEPENDIENDO COMO SE MODIFICO EL USUARIO, LE ENVIO UN MAIL
//// PARA PODER ENVIAR ESTE MAIL, EL SERVIDOR DEBE TENER HABILITADO SMTP (EL DE LA FACU LO TIENE, POR ESO LO PUSIMOS
//// TENER EN CUENTA QUE CUANDO SE SELECCIONA ESTE LINK, SE PUEDEN NOTAR RETRASOS EN LA CONFIRMACION, PERO ES PROBLEMA DEL ENVIO DE MAILS
$user= get_user_data_from_username($_GET['username']);
if ($activacion == 1){
	$cuerpo ='<h1>Bienvenido a Red Solidaria Veterinaria</h1><br>
				Su cuenta <strong>'.$user->username.'</strong> ha sido activada.
				Atte., el equipo de Red Solidaria Veterinaria';
	$asunto = "Confirmacion de cuenta de Red Solidaria Veterinaria";
}else
	if ($activacion == 2){
		$cuerpo ='<h1>Desactivacion de cuenta de Red Solidaria Veterinaria</h1><br>
			Su cuenta <strong>'.$user->username.'</strong> ha sido desactivada por razones del grupo de administradores de la Red.
			Atte., el equipo de Red Solidaria Veterinaria';
		$asunto = "Desactivacion de cuenta de Red Solidaria Veterinaria";
}else
	if ($activacion == 3){
		$cuerpo ='<h1>Suspencion de cuenta de Red Solidaria Veterinaria</h1><br>
			Su cuenta <strong>'.$user->username.'</strong> ha sido suspendida, el grupo de administradores lo ha decidido.
			Atte., el equipo de Red Solidaria Veterinaria';
		$asunto = "Suspencion de cuenta de Red Solidaria Veterinaria";
	}
$name_to = $user->nombre." ".$user->apellido;
$hacia = $user->email;
$from_link = getSessionUsername();
enviarMail($hacia,$cuerpo,$asunto,$from_link,$name_to);
?>
