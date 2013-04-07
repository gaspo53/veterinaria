<?php
  //VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO AGREGA EL ARCHIVO AL ARTÍCULO
  include_once("DB.php");
  include_once("inicializar.php");
  include_once('./login_logout.php');

  //AGREGA EL ARCHIVO CON NOMBRE $nombre AL ARTÍCULO $id_articulo
  function agregarArchivo($id_articulo,$path,$nombre){
  	$con = conectar_DB();
  	$consulta ="INSERT INTO archivo_articulo (id ,file_path, id_articulo ,nombre)
  	VALUES (NULL , '$path', '$id_articulo', '$nombre')";
  	$resul=$con->query($consulta);
  	$con->disconnect();
  }

  //VERIFICA SI HAY ALGUIEN LOGUEADO
  if (hay_alguien()){

        //VALIDA QUE EL NOMBRE ESTÉ COMPLETO
  	if ( validarStrings(array($_POST['nombre'])) ){

  	                //VERIFICA QUE EL USUARIO LOGUEADO SEA EL DUEÑO DEL ARTÍCULO
  			if (es_duenio_del_articulo($_GET['id'])){
  				$status = "";
  					
                                        // OBTENEMOS LOS DATOS DEL ARCHIVO
  					$tamano = $_FILES["archivo"]['size'];
  					$tipo = $_FILES["archivo"]['type'];
  					$archivo = $_FILES["archivo"]['name'];
  					$prefijo = substr(md5(uniqid(rand())),0,6);

                                        //COMPRUEBA QUE EL NOMBRE HAGA REFERENCIA A UN ARCHIVO
  					if ($archivo != "") {
  						if (!(file_exists('./files'))){
  							mkdir("./files",0700); //Crea el directorio donde se guardaran las imágenes y archivos de los artículos
  						}
  					        
                                                // GUARDAMOS EL ARCHIVO EN LA CARPETA files
  						$destino =  "./files/".$prefijo."_".$archivo;
  						
  						//VERIFICA QUE SE HAYA GAURDADO EL ARCHIVO CORRECTAMENTE
  						if (copy($_FILES["archivo"]['tmp_name'],$destino)) {
  						   $status = "Archivo subido: <b>".$archivo."</b>";
  						   agregarArchivo($_GET['id'],$destino,$_POST['nombre']);
  						 } else {
  							$status = "Error al subir el archivo";
  					   }
  					} else {
  						$status = "Debe ingresar un archivo (Bot&oacute;n Examinar...)";
  				   }
  				$smarty->assign('error', $status);
  				$smarty->assign('desc_temp', "Ver Art&iacute;culo");
  				$smarty->assign('link_temp', "./ver_articulo.php?id=".$_GET['id']);
  			} else {
  				$smarty->assign('error', ARTICLE_OWN);
  				}
  	} else // SI NO CARGÓ EL NOMBRE DEL ARCHIVO
  		{
  			$status = "DEBE COMPLETAR EL TITULO DEL ARCHIVO";
  		}
  } else
  	{
  		$status = INICIAR_SESION;
  	}
  
  $smarty->assign('error', $status);
  $smarty->assign('desc_temp', "Ver Art&iacute;culo");
  $smarty->assign('link_temp', "./ver_articulo.php?id=".$_GET['id']);
  $smarty->assign('template','aviso.tpl');
  $smarty->display('index.tpl');
?>
