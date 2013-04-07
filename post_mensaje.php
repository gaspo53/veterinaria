<?php
  //VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO AGREGA EL MENSAJE
  include_once("DB.php");
  include_once("inicializar.php");
  include_once('./login_logout.php');

  //VERIFICA SI HAY ALGUIEN LOGUEADO
  if (hay_alguien()){
  	$postParameters = array($_POST['asunto'], $_POST['mensaje'], $_POST['destinatario'], getSessionUsername());
  	$postParameters = pasarAHtml($postParameters);
  	
        //VALIDA QUE ESTEN COMPLETOS LOS CAMPOS
  	if (validarStrings($postParameters)){
  		$con = conectar_DB();
  		
  		//INSERTA LOS DATOS A LA TABLA mensajes
  		$consulta ="INSERT INTO mensajes (id ,asunto ,mensaje ,destinatario, remitente, leido)
  		VALUES (NULL , '$postParameters[0]', '$postParameters[1]', '$postParameters[2]', '$postParameters[3]', 0)";
  		$resul=$con->query($consulta);
  		
  		if (DB::isError($resul)){
  				$smarty->assign('error','EL MENSAJE NO SE PUDO ENVIAR');
  		} else {
  				$smarty->assign('error',$postParameters[0]." SE ENVIO CORRECTAMENTE");
  				$smarty->assign('link_temp','./escribir_mensaje.php');
  				$smarty->assign('desc_temp','Redactar otro mensaje');
  			}
  		$con-> disconnect();
  	}else
  		{
  			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
  			$smarty->assign('desc_temp',"Volver a redactar el mensaje");
  			$smarty->assign('link_temp',"./escribir_mensaje.php");
  		}
  } else{
  	$smarty->assign('error',INICIAR_SESION);
  }
  include_once('./tomar_links.php');
  include_once('./tomar_novedades.php');
  $smarty->assign('template','aviso.tpl');
  $smarty->display('index.tpl');

?>
