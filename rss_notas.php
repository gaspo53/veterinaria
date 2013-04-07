<?php
// ARMA UN XML (RSS 2.0) CON LAS ULTIMAS 20 NOTAS
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

      // Definimos variables globales
      $rss_titulo = 'Ultimas Notas Recomendadas De Veterinaria';
      $rss_url = 'http://'.HOST_IP.':'.LISTEN_PORT.'/'.ROOT_FOLDER.'ver_nota.php?id=';
      $rss_descripcion = 'Notas Recomendadas de Veterinaria';
      $rss_email = 'no-mail@localhost.com';
       
      // Conexion a la base de datos
      $conexion = conectar_DB();
      $sql = "SELECT * FROM notas_recomendadas ORDER BY id DESC LIMIT 0,20";
      $result = $conexion->query($sql);
       
      // Header para escribir XML
      header('Content-type: text/xml; charset="iso-8859-1"', true);
       
      // Escribimos el archivo RSS
      echo '<?xml version="1.0" encoding="iso-8859-1"?>';
      echo
      '<rss version="2.0">
           <channel>
                <docs>http://blog.unijimpe.net/rss</docs>
                <title>'.$rss_titulo.'</title>
                <link>'.$rss_url.'</link>
                <description>'.$rss_descripcion.'</description>
                <language>es</language>
                <managingEditor>'.$rss_email.'</managingEditor>
                <webMaster>'.$rss_email.'</webMaster>
      ';
       
	while ($item = $result->fetchRow(DB_FETCHMODE_OBJECT)){        
		   echo "<item>" ;
           echo "<title>".pasarAISO($item->titulo)."</title>" ;
           echo "<link>".$rss_url.$item->id."</link>";
           echo "<description>".pasarAISO($item->nota)."</description>";
           echo "</item>";
	}
      echo "</channel>";
      echo "</rss>";   
	 
?> 