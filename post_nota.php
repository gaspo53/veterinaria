<?php
  //VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO AGREGA LA NOTA RECOMENDADA
  
  include_once("inicializar.php");
  include_once('./login_logout.php');
  
  //VERIFICA SI HAY ALGUIEN LOGUEADO
  if (hay_alguien()){
  	$postParameters = array($_POST['titulo'], $_POST['link'], $_POST['nota'], $_GET['user_id']);
  	$postParameters = pasarAHtml($postParameters);
  	
  	//VALIDA QUE ESTEN COMPLETOS LOS CAMPOS
  	if (validarStrings($postParameters)){
  		$con = conectar_DB();
  		$fecha= date('Y')."-".date('m')."-".date('d');
  		$username = getSessionUsername();

  		//INSERTA LOS DATOS A LA TABLA notas_recomendadas
  		$consulta ="INSERT INTO notas_recomendadas (id ,titulo ,link ,nota ,idusuario ,usuario ,fecha)
  		VALUES (NULL , '$postParameters[0]', '$postParameters[1]', '$postParameters[2]', '$postParameters[3]', '$username', '$fecha')";
  		$resul=$con->query($consulta);
  		
  		if (MDB2::isError($resul)){
  				$smarty->assign('error','LA NOTA NO SE PUDO CARGAR');
  		} else {
  				$smarty->assign('link_temp','./listar_notas.php');
  				$smarty->assign('desc_temp','Ir a Notas Recomendadas');
  				$smarty->assign('error',$postParameters[0]." SE CARG&Oacute; CORRECTAMENTE");
  			}
  		$con-> disconnect();
  	}else	
  		{
  			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
  			$smarty->assign('desc_temp',"Volver a cargar la nota");
  			$smarty->assign('link_temp',"./agregar_nota.php");
  		}
  } else{
  	$smarty->assign('error',INICIAR_SESION);
  }
  include_once('./tomar_links.php');
  include_once('./tomar_novedades.php');
  $smarty->assign('template','aviso.tpl');
  $smarty->display('index.tpl');

?>
