<?php
// ESTE PHP SETEA EL PASSWORD DE UN USUARIO A 123456, SOLO POR UN ADMIN

include_once("inicializar.php");
include_once('./login_logout.php');

if (tiene_permisos()){
	$user = $_GET['username'];
	if (getSessionUsername() != $user){
		$con = conectar_DB();
		$resul=$con->query($consulta);
		$id = $_GET['id'];
		$password = md5("123456");
		$consulta ="UPDATE usuarios 
					SET password = '$password'
					WHERE username = '$user'";
		$resul=$con->query($consulta);
		if (!(MDB2::isError($resul))){
					$smarty->assign('error',' Se actualiz&oacute; correctamente el password de'.' '.$user.', ahora su nuevo password es "123456".');
		}else
		{ 
				$smarty->assign('error',' Se produjo un error en actualizar a'.' '.$user);
		}
	}else
		{
			$smarty->assign('error', "UD NO SE PUEDE CAMBIAR LOS PERMISOS A SI MISMO");
		}
	$smarty->assign('link_temp','./administrar_participantes.php');
	$smarty->assign('desc_temp','Volver a Administrar Participantes');
}else
	{$smarty->assign('error', NO_TIENE_PERMISOS);}
$con-> disconnect();
/// LE ENVIO UN MAIL DICIENDOLE QUE SE RESETEO SU PASSWROD
//// PARA PODER ENVIAR ESTE MAIL, EL SERVIDOR DEBE TENER HABILITADO SMTP (EL DE LA FACU LO TIENE, POR ESO LO PUSIMOS
//// TENER EN CUENTA QUE CUANDO SE SELECCIONA ESTE LINK, SE PUEDEN NOTAR RETRASOS EN LA CONFIRMACION, PERO ES PROBLEMA DEL ENVIO DE MAILS
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');
$user= get_user_data_from_username($_GET['username']);
$cuerpo ='<h1>Cambio de contrase&ntilde;a de la Red Solidaria Veterinaria</h1><br>
			Su password de la cuenta <strong>'.$user->username.'</strong> ha sido modificado a 123456.
			Atte., el equipo de Red Solidaria Veterinaria';
$asunto = "Cambio de passwrod de Red Solidaria Veterinaria";
$name_to = $user->nombre." ".$user->apellido;
$hacia = $user->email;
$from_link = getSessionUsername();
enviarMail($hacia,$cuerpo,$asunto,$from_link,$name_to);

?>
