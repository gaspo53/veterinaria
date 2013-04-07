<!-- pagina ejemplo al index, con contenido de muestra. Solo para mostrar el formato del estilo -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="author" content="Agust&iacute; Vosou, Daniel Gaspar Rajoy">
<meta name="description" content="Sitio de la Red Solidaria de Veterinarias">
<title>Red Solidaria Veterinaria</title>
<link rel="shortcut icon" href="./images/cruz.gif" type="image/x-icon">
<link rel="stylesheet" href="{$css->link|default:'./styles/default.css'}" type="text/css" title="{$css->nombre|default:'Default'}" >

</head>
<body>
<div id="contenedor_general">
	<div id="cabecera">
		<div id="barra_admin">
			<h1 id="nombre_sitio"></h1>
			<form name="menu_items" action="" method="post">
			<select name="url" size="1">
				<option value="choose">Elija opci&oacute;n</option>
								<option value="#">Agregar Art&iacute;culo</option>
								<option value="#">Agregar Evento</option>
								<option value="#">Agregar Link De Inter&eacute;s</option>
								<option value="#">Agregar Nota</option>
								<option value="#">Agregar Novedad</option>
								<option value="#">Bandeja De Entrada</option>
								<option value="#">Mensajes De Contacto</option>
								<option value="#">Redactar mensaje</option>
						</select>
	
		</form>
	</div>
  	</div><!--cabecera-->
	<div id="contenedor_medio">
    	<div id="barra_lateral">
      		<div id="panel_login" style="display:none">
        		<form action="" id="form_login" method="POST" onSubmit="return false">
					<div class="login_form_label">
              			<label for="username">Nombre de usuario</label>
            		</div><!--login_form_label-->

            		<div>
              			<input name="username" id="username" size="15" value="" type="text">
					</div><!--div-->

            		<div class="login_form_label">
						<label for="password">Contrase&ntilde;a</label>
					</div><!--login_form_label-->
	
					<div>
						<input name="password" id="password" size="15" type="password">
						<input name="nombre" type="submit" value="Entrar" onClick="return false">
					</div><!--div-->

            		<div id="registracion">
						<a href="#">Registrarse</a>
					</div><!--registracion-->
        		</form>
		</div><!-- panel_login -->

		<div id="panel_logout">
			<a href="#"> usuario (salir)</a>
			<div id="ajax_result_inbox"></div>
		</div><!-- panel_logout -->

		<div id="links_laterales">
	       		<ul>
         			<li><span class="secciones">Inicio</span>
            			<ul>
              				<li><a href="#">P&aacute;gina inicial</a></li>
            			</ul>
          			</li>
          			<li><span class="secciones">Institucional</span>
            			<ul>
              				<li><a href="#">Historia</a></li>
              				<li><a href="#">El origen</a></li>
              				<li><a href="#">Participantes</a></li>
            			</ul>
          			</li>
          			<li><span class="secciones">Informaci&oacute;n general</span>
            			<ul>
              				<li><a href="#">Art&iacute;culos</a></li>
							<li><a href="#">Notas Recomendadas</a></li>
							<li><a href="#">Eventos</a></li>
            			</ul>
          			</li>
        		</ul>
		</div><!-- links_laterales -->

			<form action="#" id= "form_busqueda" method="GET"  onsubmit="return false">
				<div id="busqueda">
					<h3>Buscador</h3>
					<input name="text_buscar" id="text_buscar" type="text" size="14">
          				<input type="submit" id="submitButton" value="Buscar" onClick="return false">
          				<div id="busqueda_avanzada">
						<a href="#">B&uacute;squeda avanzada </a>
					</div><!--busqueda_avanzada-->
        			</div><!--busqueda-->
      			</form>

		<div id="links_interes">
        		<h3>Links de inter&eacute;s </h3>
          			<ul>
						 <li><a href="#" >Videos de vacas</a></li>
						 <li><a href="#" >Un buscador</a></li>
						 <li><a href="#" >Una facultad linda</a></li>
					</ul>
				<br>
			<div id="todos_links">
				<a href="#">[ Todos ]</a>
			</div><!--todas_novedades-->
			</div><!--links_interes-->
      		<div id="novedades">
        		<h3>&Uacute;ltimas novedades </h3>
        		<div id= "links_novedades">
          			<p> Conflicto lechero:
						<a href="#">[m&aacute;s...] </a>
					</p>
					<p> Es inminente un acuerdo por el conflicto lechero:
						<a href="#">[m&aacute;s...] </a>
			
					</p>
					<p> Problemas con el tambo:
						<a href="#">[m&aacute;s...] </a>
					</p>
					<p> La fuga en VACA Mayor, BWV 5214:
						<a href="#">[m&aacute;s...] </a>
					</p>

					
				</div><!--links_novedades-->
			<div id="todas_novedades">
				<a href="#">[ Todas ]</a>
			</div><!--todas_novedades-->
		</div><!-- novedades -->
		<br>
       		<div id= "usuarios_online">
				<h3>Usuarios Online </h3>
       			<p>
					<a href="#">admin</a>
				</p>
				<p>
					<a href="#">usuario_X</a>
				</p>
			</div><!--usuarios_online-->
	</div><!--barra_lateral-->
		<div id="contenido">
			<h2 id="titulo_pagina">{$titulo_pagina}</h2>
			<div class="contenido_interior">
			{if $template}
				{include file=$template}
			{/if}
			{if $mapa_sitio}
				{$mapa_sitio}
			{/if}
			<NOSCRIPT>
				 <P class="error">
				 	######################################################################################################<br>
					UD NO TIENE ACTIVADO JavaScript, SI NO LO ACTIVA NO PODRA NAVEGAR EL SITIO, CONSULTE EL MANUAL DE SU NAVEGADOR WEB Y HABILITE DICHA FUNCION.<br>
					######################################################################################################</P>
			</NOSCRIPT>

			</div><!--contenido_interior-->
			{include file="paginador.tpl"}
		</div><!--contenido-->
	</div><!--contenedor_medio-->

	<div id="pie_pagina">
		<div id="links_pie">
    	<p><a href="#">Acerca de</a> | <a href="#">FAQ's</a> | <a href="#">Mapa del Sitio</a> | <a href="#">Contacto</a> | <a href="#">Suscripci&oacute;n RSS <img alt="logoRSS" src="./images/logoRSS.gif"></a> | <a href="#">Manual De Usuario</a> | &copy;{$year} Red Solidaria Veterinaria</p>
		</div>
		<div id="links_validadores"><p>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-html401"
        alt="Valid HTML 4.01 Transitional" height="31" width="88"></a>
		<a href="http://jigsaw.w3.org/css-validator/" target="_blank"><img style="border: 0pt none ; width: 88px; height: 31px;" src="images/vcss.png" alt="[¡CSS Válido!]" title="¡CSS V&aacute;lido!"></a>
  </p>
  
  </div>
  	</div><!-- pie_pagina-->
</div><!--contenedor_general-->
</body>
</html>
