<?php
  //VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO AGREGA EL EVENTO
  include_once("DB.php");
  include_once("inicializar.php");
  include_once('./login_logout.php');

  //VERIFICA SI HAY ALGUIEN LOGUEADO
  if (hay_alguien()){
  	$postParameters = array($_POST['titulo'], $_POST['descripcion'], $_POST['lugar'], $_POST['fecha_comienzo'],$_GET['user_id'],$_POST['fecha_fin']);
  	$postParameters = pasarAHtml($postParameters);
  
  	//VALIDA QUE ESTEN COMPLETOS LOS CAMPOS
  	if (validarStrings($postParameters)){
  		$con = conectar_DB();
  		$fecha= date('Y')."-".date('m')."-".date('d');
  		$username = getSessionUsername();
  
  		//INSERTA LOS DATOS A LA TABLA eventos
  		$consulta ="INSERT INTO eventos (id ,titulo ,descripcion, lugar ,fecha_comienzo ,idUsuario, fecha_fin ,usuario ,fecha)
  		VALUES (NULL , '$postParameters[0]', '$postParameters[1]', '$postParameters[2]', '$postParameters[3]','$postParameters[4]','$postParameters[5]', '$username', '$fecha')";
  		$resul=$con->query($consulta);
  
  		if (DB::isError($resul)){
  				$smarty->assign('error','EL EVENTO NO SE PUDO CARGAR');
  		} else {
  				$smarty->assign('link_temp','./eventos.php');
  				$smarty->assign('desc_temp','Ir a Eventos');
  				$smarty->assign('error',$postParameters[0]." SE CARG&Oacute; CORRECTAMENTE");
  			}
  		$con-> disconnect();
  	}else	
  		{
  			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
  			$smarty->assign('desc_temp',"Volver a cargar el evento");
  			$smarty->assign('link_temp',"./agregar_evento.php");
  		}
  } else{
  	$smarty->assign('error',INICIAR_SESION);
  }
  include_once('./tomar_links.php');
  include_once('./tomar_novedades.php');
  $smarty->assign('template','aviso.tpl');
  $smarty->display('index.tpl');
?>
