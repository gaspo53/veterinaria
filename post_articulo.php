<?php
  //VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO AGREGA EL ARTÍCULO
  include_once("DB.php");
  include_once("inicializar.php");
  include_once('./login_logout.php');

  //VERIFICA SI HAY ALGUIEN LOGUEADO
  if (hay_alguien()){
  	$postParameters = array($_POST['titulo'], $_POST['descripcion'], $_GET['user_id']);
  	$postParameters = pasarAHtml($postParameters);
  	
  	//VALIDA QUE ESTEN COMPLETOS LOS CAMPOS
  	if (validarStrings($postParameters)){
  		$con = conectar_DB();
  		$fecha= date('Y')."-".date('m')."-".date('d');
  		$username = getSessionUsername();
  		
  		//INSERTA LOS DATOS A LA TABLA articulos
  		$consulta ="INSERT INTO articulos (id , titulo ,descripcion, idUsuario ,usuario ,fecha)
  								VALUES (NULL , '$postParameters[0]', '$postParameters[1]', '$postParameters[2]', '$username', '$fecha')";
  		$resul=$con->query($consulta);

  		if (DB::isError($resul)){
  				$smarty->assign('error','EL ARTICULO NO SE PUDO CARGAR');
  		} else {
  				$smarty->assign('link_temp','./listar_articulos.php');
  				$smarty->assign('desc_temp','Ir a Art&iacute;culos');
  				$smarty->assign('error',$postParameters[0]." SE CARG&Oacute; CORRECTAMENTE");
  			}
  		$con-> disconnect();
  	}else	
  		{
  			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
  			$smarty->assign('desc_temp',"Volver a cargar el art&iacute;culo");
  			$smarty->assign('link_temp',"./agregar_articulo.php");
  		}
  } else{
  	$smarty->assign('error',INICIAR_SESION);
  }
  include_once('./tomar_links.php');
  include_once('./tomar_novedades.php');
  $smarty->assign('template','aviso.tpl');
  $smarty->display('index.tpl');
?>
