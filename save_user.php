<?php
// ESTE PHP GUARDA EL REGISTRO DE UN NUEVO USUARIO

include_once("inicializar.php");
include_once('./login_logout.php');

$postParameters = array($_POST['nombre'], $_POST['apellido'], $_POST['pass'], $_POST['user'], $_POST['email'], $_POST['direccion'], $_POST['telefono'], $_POST['profesion'], $_POST['CSS']);
$postParameters = pasarAHtml($postParameters);
if (validarStrings($postParameters)){ // SI NO VINO NADA EN BLANCO
	//Convierto a MD5 el password
	$postParameters[2] = md5($postParameters[2]);
	$con = conectar_DB();
	$consulta ="INSERT INTO usuarios (id ,nombre ,apellido ,password ,username ,email ,direccion ,telefono ,profesion ,tipo ,css)
	VALUES (NULL , '$postParameters[0]', '$postParameters[1]', '$postParameters[2]', '$postParameters[3]', '$postParameters[4]', '$postParameters[5]', '$postParameters[6]', '$postParameters[7]', 2 , '$postParameters[8]')";
	$resul=$con->query($consulta);
	if (MDB2::isError($resul)){
		if ((MDB2::isError($resul)) == -5){
			$smarty->assign('error','EL USUARIO YA EXISTE');
		}
	} else {
			// ACA LE "ENVIAMOS" UN MENSAJE DE BIENVENIDA, NO HICIMOS UNA FUNCION PORQUE SE USA ACA NADA AMAS
			$asunto = "Bienvenido a Red Solidaria Veterinaria";
			$msj= "Nos pone muy contentos que forme parte de esta red. T&oacute;mese unos momentos para navegar por ella y conocer todas sus posibilidades.<br>
			Atte., el equipo de Red Solidaria Veterinaria";
			$admin = obtenerAdminUsername();
			$smarty->assign('error',$postParameters[3]." SE REGISTR&Oacute; CORRECTAMENTE");
			$consulta ="INSERT INTO mensajes (id ,asunto ,mensaje ,destinatario, remitente, leido)
			VALUES (NULL , '$asunto', '$msj', '$postParameters[3]', '$admin', 0)";
			$resul=$con->query($consulta);
	}
	$con-> disconnect();
}else	
		{
			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
			$smarty->assign('desc_temp',"Volver a registrarse");
			$smarty->assign('link_temp',"./sign_in.php");
		}	
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');
?>
