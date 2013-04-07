<?php
  //VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO AGREGA EL LINK DE INTER�S
  
  include_once("inicializar.php");
  include_once('./login_logout.php');

  //VERIFICA SI HAY ALGUIEN LOGUEADO
  if (hay_alguien()){
  	$postParameters = array($_POST['titulo'], $_POST['url'], $_GET['user_id'] ,$_POST['descripcion']);
  	$postParameters = pasarAHtml($postParameters);

        //VALIDA QUE ESTEN COMPLETOS LOS CAMPOS
  	if (validarStrings($postParameters)){
  		$con = conectar_DB();
  		$fecha= date('Y')."-".date('m')."-".date('d');
  		$username = getSessionUsername();

  		//INSERTA LOS DATOS A LA TABLA links_interes
  		$consulta ="INSERT INTO links_interes (id ,nombre ,url ,idusuario ,descripcion ,usuario ,fecha)
  		VALUES (NULL , '$postParameters[0]', '$postParameters[1]', '$postParameters[2]', '$postParameters[3]', '$username', '$fecha')";
  		$resul=$con->query($consulta);

  		if (MDB2::isError($resul)){
  				$smarty->assign('error','EL LINK NO SE PUDO CARGAR');
  		} else {
  				$smarty->assign('link_temp','./listar_links_interes.php');
  				$smarty->assign('desc_temp','Ir a Links de Inter&eacute;s');
  				$smarty->assign('error',$postParameters[0]." SE CARG&Oacute; CORRECTAMENTE");
  			}
  		$con-> disconnect();
  	}else
  		{
  			$smarty->assign('error',"NO DEBE HABER CAMPOS SIN LLENAR");
  			$smarty->assign('desc_temp',"Volver a cargar el link");
  			$smarty->assign('link_temp',"./agregar_link.php");
  		}
  } else{
  	$smarty->assign('error',INICIAR_SESION);
  }
  include_once('./tomar_links.php');
  include_once('./tomar_novedades.php');
  $smarty->assign('template','aviso.tpl');
  $smarty->display('index.tpl');
?>
