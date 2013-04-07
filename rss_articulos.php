<?php
// ARMA UN XML (RSS 2.0) CON LOS ULTIMOS 20 ARTICULOS
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

      // Definimos variables globales
      $rss_titulo = 'Ultimos Articulos De Veterinaria';
      $rss_url = 'http://'.HOST_IP.':'.LISTEN_PORT.'/'.ROOT_FOLDER.'ver_articulo.php?id=';
      $rss_descripcion = 'Articulos de Veterinaria';
      $rss_email = 'no-mail@localhost.com';
       
      // Conexion a la base de datos
      $conexion = conectar_DB();
      $sql = "SELECT * FROM articulos ORDER BY id DESC LIMIT 0,20";
      $result = $conexion->query($sql);
       
      // Header para escribir XML
      header('Content-type: text/xml; charset="iso-8859-1"', true);
       
      // Escribimos el archivo RSS
      echo '<?xml version="1.0" encoding="iso-8859-1"?>';
      echo
      '<rss version="2.0">
           <channel>
                <docs>'.$rss_descripcion.'.</docs>
                <title>'.$rss_titulo.'</title>
                <link>'.$rss_url.'</link>
                <description>'.$rss_descripcion.'</description>
                <language>es</language>
                <managingEditor>'.$rss_email.'</managingEditor>
                <webMaster>'.$rss_email.'</webMaster>';
       
	while ($item = $result->fetchRow(DB_FETCHMODE_OBJECT)){        
		   echo "<item>" ;
		   $tie = pasarAISO($item->titulo);
           echo "<title>$tie</title>" ;
           echo "<link>".$rss_url.$item->id."</link>";
		   $desc = pasarATexto($item->descripcion);
           echo "<description><![CDATA[$desc]]></description>";
           echo "</item>";
	}
      echo "</channel>";
      echo "</rss>";   
	 
?> 