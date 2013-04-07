<?php
  //VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO ENVÍA EL MENSAJE DE CONTACTO
  include_once("DB.php");
  include_once("inicializar.php");
  include_once('./login_logout.php');

  $postParameters = array($_POST['nombre'], $_POST['email'], $_POST['mensaje']);
  $postParameters = pasarAHtml($postParameters);

  //VALIDA QUE ESTEN COMPLETOS LOS CAMPOS
  if (validarStrings($postParameters)){
  	$con = conectar_DB();

  	//INSERTA LOS DATOS A LA TABLA contacto
  	$consulta ="INSERT INTO contacto (id ,remitente ,email, mensaje)
  	VALUES (NULL , '$postParameters[0]', '$postParameters[1]', '$postParameters[2]')";
  	$resul=$con->query($consulta);
  
  	if (DB::isError($resul)){
  			$smarty->assign('error','EL MENSAJE NO SE PUDO ENVIAR');
  	} else {
  			$smarty->assign('error',"EL MENSAJE SE ENVIO CORRECTAMENTE, A LA BREVEDAD SE COMUNICAR&Aacute;N CON UD.");
  		}
  	$con-> disconnect();
  }else
  		{
  			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
  			$smarty->assign('desc_temp',"Volver a enviar el mensaje");
  			$smarty->assign('link_temp',"./contacto.php");
  		}
  include_once('./tomar_links.php');
  include_once('./tomar_novedades.php');
  $smarty->assign('template','aviso.tpl');
  $smarty->display('index.tpl');
?>
