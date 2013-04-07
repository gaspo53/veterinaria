<?php
include_once("DB.php");

if ( (file_exists('./site.conf.php')) | (!(isset($_POST['DB_USERNAME']))) ){ // SI NO EXISTE SITE.CONF O EL USUARIO DE LA DB
    header('Location: ./index.php');
} else {
		
		/// CREO EL ARCHIVO site.conf.php
		$site_conf = fopen("./site.conf.php", "w");
		fwrite($site_conf,"<?php\n");
		// DEFINO LAS CONSTANTES QUE CAMBIAN DEPENDIENDO DEL SERVIDOR DONDE SE INSTALE
		$site_conf_array_strings = array();
		$site_conf_array_strings[0]= 'define("DB_USERNAME","'.$_POST["DB_USERNAME"].'")'.";\n";
		$site_conf_array_strings[1]= 'define("DB_NAME","'.$_POST["DB_NAME"].'")'.";\n";
		$site_conf_array_strings[2]= 'define("DB_TYPE","'.$_POST["DB_TYPE"].'")'.";\n";
		$site_conf_array_strings[3]= 'define("DB_HOST","'.$_POST["DB_HOST"].'")'.";\n";
		$site_conf_array_strings[4]= 'define("LISTEN_PORT",'.$_SERVER['SERVER_PORT'].')'.";\n";
		$site_conf_array_strings[64]= 'define("DB_LISTEN_PORT",'.$_POST["DB_LISTEN_PORT"].')'.";\n";
		$site_conf_array_strings[65]= 'define("ROOT_FOLDER","'.substr(str_replace('setup_site.php','',$_SERVER['SCRIPT_NAME']),1,200).'")'.";\n";
		$site_conf_array_strings[5]= 'define("DB_PASSWORD","'.$_POST["DB_PASSWORD"].'")'.";\n";
		$site_conf_array_strings[6]= 'define("SMARTY_PATH","'.$_POST["SMARTY_PATH"].'")'.";\n";
		$site_conf_array_strings[7]= 'define("HOST_IP","'.$_SERVER['SERVER_NAME'].'")'.";\n";
		$site_conf_array_strings[8]= 'define("PAGINATOR_BASE","'.$_POST["PAGINATOR_BASE"].'")'.";\n";
		
		
		// DEFINO LAS CONSTANTES QUE NO SE CONFIGURAN DESDE EL SISTEMA (UNICAMENTE EDITANDO EL ARCHIVO)
		
		$site_conf_array_strings[9]= 'define ("ES_ADMIN", 1)'.";\n";
		$site_conf_array_strings[10]= 'define ("ES_PARTICIPANTE", 2)'.";\n";
		$site_conf_array_strings[11]= 'define ("USUARIO_DESACTIVADO", 2)'.";\n";
		$site_conf_array_strings[12]= 'define ("USUARIO_ACTIVADO", 1)'.";\n";
		$site_conf_array_strings[13]= 'define ("USUARIO_SUSPENDIDO", 3)'.";\n";
		
		$site_conf_array_strings[14]= 'define ("MENSAJE_LEIDO",1)'.";\n";
		$site_conf_array_strings[15]= 'define ("MENSAJE_NO_LEIDO",0)'.";\n";
		$site_conf_array_strings[16]= 'define ("MENSAJE_TODOS",2)'.";\n";
		
		// VALORES PARA PAGINATOR
		
		if ($_POST["PAGINATOR_BASE"] != "")
			$paginas_base= $_POST["PAGINATOR_BASE"];
		else	
			$paginas_base=5; // TOMO EL VALOR DEFAULT
		$site_conf_array_strings[17]= 'define ("CANT_NOVEDADES_POR_PAGINA",'.($paginas_base-2).')'.";\n";
		$site_conf_array_strings[18]= 'define ("CANT_LINKS_POR_PAGINA",'.($paginas_base+1).')'.";\n";
		$site_conf_array_strings[19]= 'define ("CANT_EVENTOS_POR_PAGINA",'.($paginas_base-2).')'.";\n";
		$site_conf_array_strings[20]= 'define ("CANT_ARTICULOS_POR_PAGINA",'.($paginas_base-3).')'.";\n";
		$site_conf_array_strings[21]= 'define ("CANT_MENSAJES_POR_PAGINA",'.($paginas_base).')'.";\n";
		$site_conf_array_strings[22]= 'define ("CANT_PARTICIPANTES_POR_PAGINA",'.($paginas_base-1).')'.";\n";
		$site_conf_array_strings[23]= 'define ("CANT_ACTIVACIONES_POR_PAGINA",'.($paginas_base).')'.";\n";
		$site_conf_array_strings[24]= 'define ("CANT_RESULTADOS_POR_PAGINA",'.($paginas_base).')'.";\n";
		$site_conf_array_strings[25]= 'define ("CANT_NOTAS_POR_PAGINA",'.($paginas_base).')'.";\n";
		
		// MENSAJES PREDEFINIDOS
		
		$site_conf_array_strings[26]= 'define ("NO_TIENE_PERMISOS","SOLO LOS ADMINISTRADORES PUEDEN ACCEDER A ESTA OPCION")'.";\n";
		
		$site_conf_array_strings[66]= 'define ("USER_NOT_ACTIVE","UD NO ESTA HABILITADO PARA FUNCIONAR COMO PARTICIPANTE ACTIVO, ESPERE LA ACTIVACION DEL ADMINISTRADOR")'.";\n";
		
		$site_conf_array_strings[27]= 'define ("INICIAR_SESION","PRIMERO INICIE SESION")'.";\n";
		
		$site_conf_array_strings[28]= 'define ("SALIR_DE_SESION","PRIMERO SALGA DE LA SESION")'.";\n";
		
		$site_conf_array_strings[29]= 'define ("ES_VISITANTE_ARTICULO","LOS VISITANTES NO PUEDEN ESPIAR ARTICULOS POR USUARIOS")'.";\n";
		
		$site_conf_array_strings[30]= 'define ("ES_VISITANTE_NOTICIA","LOS VISITANTES NO PUEDEN ESPIAR NOTICIAS POR USUARIOS")'.";\n";
		
		$site_conf_array_strings[31]= 'define ("ES_VISITANTE_EVENTOS","LOS VISITANTES NO PUEDEN ESPIAR EVENTOS POR USUARIOS")'.";\n";
		
		$site_conf_array_strings[32]= 'define ("ES_VISITANTE_LINK","LOS VISITANTES NO PUEDEN ESPIAR LINKS POR USUARIOS")'.";\n";
		
		$site_conf_array_strings[33]= 'define ("ARTICLE_NOT_EXISTS"," El art&iacute;culo no existe")'.";\n";
		
		$site_conf_array_strings[34]= 'define ("USER_NOT_EXISTS"," El usuario no existe")'.";\n";
		
		$site_conf_array_strings[35]= 'define ("DELETE_ARTICLE_SUCCESS"," Se elimin&oacute; correctamente el art&iacute;culo")'.";\n";
		
		$site_conf_array_strings[36]= 'define ("DELETE_ARTICLE_ERROR"," Se produjo un error al eliminar el art&iacute;culo")'.";\n";
		
		$site_conf_array_strings[37]= 'define ("DELETE_EVENT_SUCCESS"," Se elimin&oacute; correctamente el evento")'.";\n";
		
		$site_conf_array_strings[38]= 'define ("DELETE_EVENT_ERROR"," Se produjo un error al eliminar el evento")'.";\n";
		
		$site_conf_array_strings[39]= 'define ("EVENT_OWN","UD NO ES EL DUEÑO DE ESTE EVENTO")'.";\n";
		
		$site_conf_array_strings[40]= 'define ("DELETE_LINK_SUCCESS"," Se elimin&oacute; correctamente el link de inter&eacute;s")'.";\n";
		
		$site_conf_array_strings[41]= 'define ("DELETE_LINK_ERROR"," Se produjo un error al eliminar el link de inter&eacute;s")'.";\n";
		
		$site_conf_array_strings[42]= 'define ("LINK_OWN","UD NO ES EL DUEÑO DE ESTE LINK DE INTERES")'.";\n";
		
		$site_conf_array_strings[43]= 'define ("DELETE_IMAGE_SUCCESS"," Se elimin&oacute; correctamente la im&aacute;gen")'.";\n";
		
		$site_conf_array_strings[44]= 'define ("DELETE_IMAGE_ERROR"," Se produjo un error al eliminar la im&aacute;gen")'.";\n";
		
		$site_conf_array_strings[45]= 'define ("IMAGE_NOT_EXISTS"," La im&aacute;gen no existe")'.";\n";
		
		$site_conf_array_strings[46]= 'define ("EVENT_NOT_EXISTS"," El evento no existe")'.";\n";
		
		$site_conf_array_strings[47]= 'define ("ARTICLE_OWN","UD NO ES EL DUEÑO DE ESTE ARTICULO")'.";\n";
		
		$site_conf_array_strings[48]= 'define ("MESSAGE_OWN","UD NO ES EL DUEÑO DE ESTE MENSAJE")'.";\n";
		
		$site_conf_array_strings[49]= 'define ("MESSAGE_NOT_EXISTS","EL MENSAJE SOLICITADO NO EXISTE")'.";\n";
		
		$site_conf_array_strings[50]= 'define ("DELETE_MESSAGE_SUCCESS"," Se elimin&oacute; correctamente el mensaje")'.";\n";
		
		$site_conf_array_strings[51]= 'define ("DELETE_MESSAGE_ERROR"," Se produjo un error al eliminar el mensaje")'.";\n";
		
		$site_conf_array_strings[52]= 'define ("NEW_OWN","UD NO ES EL DUEÑO DE ESTA NOTICIA")'.";\n";
		
		$site_conf_array_strings[53]= 'define ("NEW_NOT_EXISTS","LA NOTICIA SOLICITADA NO EXISTE")'.";\n";
		
		$site_conf_array_strings[54]= 'define ("NOTE_NOT_EXISTS","LA NOTA SOLICITADA NO EXISTE")'.";\n";
		
		$site_conf_array_strings[55]= 'define ("LINK_NOT_EXISTS","EL LINK SOLICITADO NO EXISTE")'.";\n";
		
		$site_conf_array_strings[56]= 'define ("DELETE_NEW_SUCCESS"," Se elimin&oacute; correctamente la noticia")'.";\n";
		
		$site_conf_array_strings[57]= 'define ("DELETE_NEW_ERROR"," Se produjo un error al eliminar la noticia")'.";\n";
		
		$site_conf_array_strings[58]= 'define ("DELETE_NOTE_SUCCESS"," Se elimin&oacute; correctamente la nota")'.";\n";
		
		$site_conf_array_strings[59]= 'define ("DELETE_NOTE_ERROR"," Se produjo un error al eliminar la nota")'.";\n";
		
		$site_conf_array_strings[60]= 'define ("NOTE_OWN","UD NO ES EL DUEÑO DE ESTA NOTA")'.";\n";
		
		$site_conf_array_strings[61]= 'define ("UPDATE_USER_SUCCESS"," Se actualiz&oacute; correctamente el estado de")'.";\n";
		
		$site_conf_array_strings[62]= 'define ("UPDATE_USER_ERROR"," Se produjo un error en actualizar a")'.";\n";
		
		$site_conf_array_strings[63]= 'define ("LOGIN_INCORRECTO","USUARIO O PASSWORD INCORRECTOS, INTENTE NUEVAMENTE O CONTACTESE CON EL ADMINISTRADOR")'.";\n";
		
		foreach ($site_conf_array_strings as $linea)
			fwrite($site_conf,$linea);
		fwrite($site_conf,"?>");
		fclose($site_conf);
		include_once("./site.conf.php");
		//// CREO LA BD SI ES QUE HAY QUE HACERLO
		if (isset($_POST['DB_CREATE']))
			if ($_POST['DB_CREATE'] == "on"){
				$conexion = DB::connect(DB_TYPE."://".DB_USERNAME.":".DB_PASSWORD."@".DB_HOST.":".DB_LISTEN_PORT."/");
				if (DB::isError($conexion)){ // ME FIJO SI HAY ERROR EN LA CONEXION, ES LA MISMA SENTENCIA QUE LA QUE HAY ARRIBA AL CREAR LA BASE DE DATOS
					unlink('./site.conf.php'); // BORRO EL SITE.CONF SI SE PRODUJO ERROR
					header("Location: ./instalar.php?error=error");
				}
				$conexion->query("CREATE DATABASE ".$_POST['DB_NAME']);
				if (DB::isError($conexion))
								die("EL SERVIDOR DIJO: ".$conexion->getMessage());
			}
		/////////// ARMO LAS CONSULTAS, PERO TODAVIA NO LAS EJECUTO
		$arreglo_de_consultas = array();
		
		

		$arreglo_de_consultas[1] = "SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO'";
		
		//Estructura de tabla para la tabla 'archivo_articulo'
		$arreglo_de_consultas[2] = "CREATE TABLE `archivo_articulo` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `file_path` varchar(255) NOT NULL,
		  `id_articulo` int(4) unsigned NOT NULL,
		  `nombre` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1" ;
		//Estructura de tabla para la tabla 'articulos'
		
		$arreglo_de_consultas[3] = "CREATE TABLE `articulos` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `idUsuario` int(4) unsigned NOT NULL,
		  `titulo` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
		  `descripcion` text character set utf8 collate utf8_unicode_ci NOT NULL,
		  `usuario` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
		  `fecha` date NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1" ;
		
		
		//Estructura de tabla para la tabla `css_list`
		
		
		$arreglo_de_consultas[4] = "CREATE TABLE `css_list` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `nombre` varchar(20) collate utf8_unicode_ci NOT NULL,
		  `link` varchar(40) collate utf8_unicode_ci NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1" ;
		
		
		//Estructura de tabla para la tabla `eventos`
		
		$arreglo_de_consultas[5] = "CREATE TABLE `eventos` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `idUsuario` int(4) unsigned NOT NULL,
		  `titulo` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
		  `lugar` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
		  `fecha_comienzo` date NOT NULL,
		  `fecha_fin` date NOT NULL,
  		  `fecha` date NOT NULL,
		  `descripcion` text character set utf8 collate utf8_unicode_ci NOT NULL,
		  `usuario` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1" ;
		
		
		//Estructura de tabla para la tabla `imagen_articulo`
		
		$arreglo_de_consultas[6] = "CREATE TABLE `imagen_articulo` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `file_path` varchar(255) NOT NULL,
		  `id_articulo` int(4) unsigned NOT NULL,
		  `texto_altern` varchar(255) character set utf8 collate utf8_unicode_ci default NULL,
		  PRIMARY KEY  (`id`),
		  KEY `file_name` (`file_path`,`id_articulo`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1" ;
		
		
		//Estructura de tabla para la tabla `links_interes`
		
		$arreglo_de_consultas[7] ="CREATE TABLE `links_interes` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `nombre` varchar(60) collate utf8_unicode_ci NOT NULL,
		  `url` varchar(254) collate utf8_unicode_ci NOT NULL,
		  `descripcion` varchar(254) collate utf8_unicode_ci default NULL,
		  `idUsuario` int(1) unsigned NOT NULL,
		  `usuario` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
		  `fecha` date NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1" ;
		
		//Estructura de tabla para la tabla `mensajes`
		
		$arreglo_de_consultas[8] ="CREATE TABLE `mensajes` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `remitente` varchar(30) character set utf8 collate utf8_unicode_ci default NULL,
		  `destinatario` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
		  `mensaje` text character set utf8 collate utf8_unicode_ci NOT NULL,
		  `leido` int(1) unsigned NOT NULL default 0 COMMENT '0 = no leido ; 1 = leido',
		  `asunto` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '[Sin Asunto]',
		  PRIMARY KEY  (`id`),
		  KEY `remitente` (`remitente`,`destinatario`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
		
		
		//Estructura de tabla para la tabla `menu_items`
		
		$arreglo_de_consultas[9] = "CREATE TABLE `menu_items` (
		  `id` int(4) NOT NULL auto_increment,
		  `idUsuario` int(1) unsigned NOT NULL,
		  `titulo` varchar(40) collate utf8_unicode_ci NOT NULL,
		  `link` varchar(60) collate utf8_unicode_ci NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1" ;
		
		//Estructura de tabla para la tabla `novedades`
		
		$arreglo_de_consultas[10] = "CREATE TABLE `novedades` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `nombre_corto` text collate utf8_unicode_ci NOT NULL,
		  `desc_corta` text collate utf8_unicode_ci NOT NULL,
		  `desc_larga` longtext collate utf8_unicode_ci NOT NULL,
		  `fecha` date NOT NULL,
		  `nombre_largo` text collate utf8_unicode_ci NOT NULL,
		  `idUsuario` int(4) unsigned NOT NULL COMMENT 'Quien posteo la noticia',
		  `usuario` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1" ;
		
		//Estructura de tabla para la tabla `usuarios`
		$arreglo_de_consultas[11] = "CREATE TABLE `usuarios` (
		  `id` int(4) unsigned NOT NULL auto_increment,
		  `nombre` varchar(100) collate utf8_unicode_ci NOT NULL,
		  `apellido` varchar(50) collate utf8_unicode_ci NOT NULL,
		  `password` varchar(32) collate utf8_unicode_ci NOT NULL,
		  `username` varchar(16) collate utf8_unicode_ci NOT NULL,
		  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
		  `direccion` varchar(100) collate utf8_unicode_ci default NULL,
		  `telefono` varchar(13) collate utf8_unicode_ci default NULL,
		  `profesion` varchar(50) collate utf8_unicode_ci default NULL,
		  `tipo` int(1) NOT NULL default 2,
		  `css` int(4) NOT NULL default 1,
		  `estado` int(1) unsigned NOT NULL default 2 COMMENT '1 = activado ; 2 = desactivado ; 3 = suspendido',
		  PRIMARY KEY  (`id`),
		  UNIQUE KEY `username` (`username`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1" ;
		
		
		 $arreglo_de_consultas[12] = "CREATE TABLE `notas_recomendadas` (
						`id` INT( 4 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`idUsuario` INT( 4 ) UNSIGNED NOT NULL ,
						`titulo` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
						`nota` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
						`fecha` date NOT NULL,
						`usuario` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
						`link` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL
						) ENGINE = MYISAM";
		
		 $arreglo_de_consultas[21] = "CREATE TABLE `contacto` (
					`id` INT( 4 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`remitente` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
					`email` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
					`mensaje` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
					) ENGINE = MYISAM"; 
		
								
		// CREACION DE UN ADMINISTRADOR, SI NO SE RECIBIO NADA POR POST, CREO UN DEFAULT ADMIN, ADMIN
		if ( (trim($_POST['ADMIN_USERNAME'],' ') == "") || (trim($_POST['ADMIN_PASSWORD'],' ') == "") ){
			$_POST['ADMIN_USERNAME'] = "admin";
			$_POST['ADMIN_PASSWORD'] = "admin";
		}
		$arreglo_de_consultas[13] = "INSERT INTO usuarios (id, nombre, apellido, password, username, email, direccion, telefono, profesion, tipo, css, estado) VALUES
		(NULL, 'EDITAR_NOMBRE', 'EDITAR_APELLIDO', '".md5($_POST['ADMIN_PASSWORD'])."', '".$_POST['ADMIN_USERNAME']."', 'admin@localhost.com', 'EDITAR_CIUDAD', 'EDITAR_TELEFONO', 'EDITAR_PROFESION', 1, 2, 1)";
		
		// CREACION DE LOS CSS
		$arreglo_de_consultas[14] = "INSERT INTO css_list (id, nombre, link) VALUES
		(NULL, 'Default', './styles/default.css'),
		(NULL, 'Alternativo', './styles/alternativo.css'),
		(NULL, 'Ice Cream!', './styles/ice_cream.css')";
		
		// CREACION DEL MENU
		
		$arreglo_de_consultas[20] =	"INSERT INTO `menu_items` (`id`, `idUsuario`, `titulo`, `link`) VALUES
		(NULL, 1, 'Administrar Usuarios', './administrar_participantes.php'),
		(NULL, 0, 'Modificar datos', './modificar_datos.php'),
		(NULL, 0, 'Mis Novedades', './mis_novedades.php'),
		(NULL, 0, 'Agregar Novedad', './agregar_novedad.php'),
		(NULL, 1, 'Novedades De Usuarios', './elegir_usuario_novedades.php'),
		(NULL, 1, 'Activaciones Pendientes', './activaciones_pendientes.php'),
		(NULL, 0, 'Agregar Art&iacute;culo', './agregar_articulo.php'),
		(NULL, 0, 'Mis Art&iacute;culos', './mis_articulos.php'),
		(NULL, 0, 'Bandeja De Entrada', './bandeja_entrada.php'),
		(NULL, 0, 'Redactar Mensaje', './escribir_mensaje.php'),
		(NULL, 0, 'Agregar Evento', './agregar_evento.php'),
		(NULL, 1, 'Art&iacute;culos De Usuarios', './elegir_usuario_articulos.php'),
		(NULL, 0, 'Mis Eventos', './mis_eventos.php'),
		(NULL, 0, 'Mis Links De Inter&eacute;s', './mis_links.php'),
		(NULL, 0, 'Agregar Link De Inter&eacute;s', './agregar_link.php'),
		(NULL, 1, 'Links De Inter&eacute;s De Usuarios', './elegir_usuario_links.php'),
		(NULL, 1, 'Eventos De Usuarios', './elegir_usuario_eventos.php'),
		(NULL , 0, 'Mis Notas Recomendadas', './mis_notas.php'), 
		(NULL , 1, 'Notas De Usuarios', './elegir_usuario_notas.php'),
		(NULL , 0, 'Agregar Nota', './agregar_nota.php'),
		(NULL , 1, 'Mensajes De Contacto', './mensajes_de_contacto.php')";

		
		// CONFIGURACION DE LAS TABLAS PARA BUSQUEDAS
		
		$arreglo_de_consultas[15] = "ALTER TABLE links_interes ADD FULLTEXT (nombre,descripcion)";
		$arreglo_de_consultas[16] = "ALTER TABLE novedades ADD FULLTEXT (nombre_corto,nombre_largo,desc_corta,desc_larga)";
		$arreglo_de_consultas[17] = "ALTER TABLE articulos ADD FULLTEXT (titulo,descripcion)";
		$arreglo_de_consultas[18] = "ALTER TABLE eventos ADD FULLTEXT (titulo,lugar,descripcion)";
		$arreglo_de_consultas[19] = "ALTER TABLE notas_recomendadas ADD FULLTEXT (titulo,nota)";
		
		// CREO LA TABLA DE USUARIOS ONLIBE
		$arreglo_de_consultas[22] = "CREATE TABLE `usuarios_online` (
							  `id` int(8) unsigned NOT NULL auto_increment,
							  `date` int(64) NOT NULL,
							  `username` varchar(32) character set utf8 collate utf8_unicode_ci NOT NULL,
							  `idUsuario` int(4) unsigned NOT NULL,
							  PRIMARY KEY  (`id`),
							  UNIQUE KEY `username` (`username`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1"; 
		
		// Ejecuto las consultas antes definidas
		$arreglos_nombre_tablas = array("archivo_articulo","articulos","contacto","css_list","eventos","imagen_articulo","links_interes","mensajes","menu_items","novedades","notas_recomendadas","usuarios","usuarios_online"); // ARREGLO PARA COMPROBAR QUE SI EXISTE UNA TABLA BORRE LA MISMA
		
		$conexion = DB::connect(DB_TYPE."://".DB_USERNAME.":".DB_PASSWORD."@".DB_HOST.":".DB_LISTEN_PORT."/".DB_NAME);
		if (DB::isError($conexion)){ // ME FIJO SI HAY ERROR EN LA CONEXION, ES LA MISMA SENTENCIA QUE LA QUE HAY ARRIBA AL CREAR LA BASE DE DATOS
			unlink('./site.conf.php'); // BORRO EL SITE.CONF SI SE PRODUJO ERROR
			header("Location: ./instalar.php?error='Error en la conexion con la base de datos, compruebe los datos ingresados");
		}
		// BORRO LAS TABLAS SI ES QUE EXISTEN
		
		foreach ($arreglos_nombre_tablas as $tabla)
			$conexion->query("DROP TABLE ".$tabla);
			
		// EJECUTO LAS CONSULTAS
		for($x=1;$x<23;$x++){
			$resul= $conexion->query($arreglo_de_consultas[$x]);
		} // END FOR

		echo("EL SISTEMA SE INSTALO CORRECTAMENTE, PUEDE INGRESAR COMO ".$_POST['ADMIN_USERNAME'].", CONTRASE&Ntilde;A ".$_POST['ADMIN_PASSWORD']);
		echo("<br /><br /><br /><br /><a 'text-transform:uppercase; text-shadow:#990033' href='./index.php'> Comience a utilizar el sitio</a>");
		if (!(file_exists('./files'))){
			mkdir("./files",0700); //Creo el directorio donde se guardaran las imagenes y archivos de los articulos
		}
		$conexion->disconnect();
}
?>