<?php
  //VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO AGREGA LA NOVEDAD
  
  include_once("inicializar.php");
  include_once('./login_logout.php');
  
  //VERIFICA SI HAY ALGUIEN LOGUEADO
  if (hay_alguien()){
  	$postParameters = array($_POST['nombre_corto'], $_POST['nombre_largo'], $_POST['desc_corta'], $_POST['desc_larga'], $_GET['user_id']);
  	$postParameters = pasarAHtml($postParameters);
  
  	//VALIDA QUE ESTEN COMPLETOS LOS CAMPOS
  	if (validarStrings($postParameters)){
  		$con = conectar_DB();
  		$fecha= date('Y')."-".date('m')."-".date('d');
  		$username = getSessionUsername();
  
  		//INSERTA LOS DATOS A LA TABLA novedades
  		$consulta ="INSERT INTO novedades (id ,nombre_corto ,nombre_largo ,desc_corta ,desc_larga, idusuario, fecha, usuario)
  		VALUES (NULL , '$postParameters[0]', '$postParameters[1]', '$postParameters[2]', '$postParameters[3]','$postParameters[4]','$fecha','$username')";
  		$resul=$con->query($consulta);
  
  		if (MDB2::isError($resul)){
  				$smarty->assign('error','LA NOVEDAD NO SE PUDO CARGAR');
  		} else {
  				$smarty->assign('link_temp','./listar_novedades.php');
  				$smarty->assign('desc_temp','Ir a Novedades');
  				$smarty->assign('error',$postParameters[0]." SE CARG&Oacute; CORRECTAMENTE");
  			}
  		$con-> disconnect();
  	}else
  		{
  			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
  			$smarty->assign('desc_temp',"Volver a cargar la novedad");
  			$smarty->assign('link_temp',"./agregar_novedad.php");
  		}
  } else{
  	$smarty->assign('error',INICIAR_SESION);
  }
  include_once('./tomar_links.php');
  include_once('./tomar_novedades.php');
  $smarty->assign('template','aviso.tpl');
  $smarty->display('index.tpl');
?>
