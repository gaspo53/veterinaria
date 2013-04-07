<?php /* Smarty version 2.6.19, created on 2013-04-07 15:26:20
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'index.tpl', 10, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="author" content="Agust&iacute;n Vosou, Daniel Gaspar Rajoy">
<meta name="description" content="Sitio de la Red Solidaria de Veterinarias">
<title>Red Solidaria Veterinaria</title>
<link rel="shortcut icon" href="./images/cruz.gif" type="image/x-icon">
<link rel="stylesheet" href="<?php echo ((is_array($_tmp=@$this->_tpl_vars['css']->link)) ? $this->_run_mod_handler('default', true, $_tmp, './styles/alternativo.css') : smarty_modifier_default($_tmp, './styles/alternativo.css')); ?>
" type="text/css" title="<?php echo ((is_array($_tmp=@$this->_tpl_vars['css']->nombre)) ? $this->_run_mod_handler('default', true, $_tmp, 'Alternativo') : smarty_modifier_default($_tmp, 'Alternativo')); ?>
" >
<script type="text/javascript" src="./scripts/validateForm.js"></script>
<script type="text/javascript" src="./scripts/AJAX_Functions.js"></script>
<script type="text/javascript" src="./scripts/funciones.js"></script>
<script type="text/javascript" src="./scripts/validador.js"></script>
	
</head>
<body onLoad="javascript:checkInbox()">
	<div id="contenedor_general">
	
		<div id="cabecera">
			<h1 id="nombre_sitio"></h1>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barra_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  		</div><!--cabecera-->
		
		<div id="contenedor_medio">
    		<div id="barra_lateral">
      			<div id="panel_login" style="<?php echo $this->_tpl_vars['login_display']; ?>
">
        			<form action="./validar.php" id="form_login" method="POST" onSubmit="return validar_blancos('username|password');">
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
							<input name="nombre" type="submit" value="Entrar" onClick="return checkCookies()"><br>
							<label>Recordarme<input type="checkbox" name="persistir_cookie"></label>
						</div><!--div-->
	
						<span id="bloq_login" class="mayus_advert"></span>
            	
						<div id="registracion">
							<a href="./sign_in.php">Registrarse</a>
						</div><!--registracion-->
    	    		</form>
				</div><!-- panel_login -->

				<div id="panel_logout" style="<?php echo $this->_tpl_vars['logout_display']; ?>
">
					<a href="./logout.php"> <?php echo ((is_array($_tmp=@$this->_tpl_vars['actual_user'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Logout') : smarty_modifier_default($_tmp, 'Logout')); ?>
<?php echo $this->_tpl_vars['exit']; ?>
 </a>
					<div id="ajax_result_inbox"></div>
				</div><!-- panel_logout -->

				<div id="links_laterales">
	    	   		<ul>
         				<li><span class="secciones">Inicio</span>
            				<ul>
              					<li><a href="./index.php">P&aacute;gina inicial</a></li>
            				</ul>
						</li>
						<li><span class="secciones">Institucional</span>
							<ul>
								<li><a href="./historia.php">Historia</a></li>
								<li><a href="./origen.php">El origen</a></li>
								<li><a href="./listar_participantes.php">Participantes</a></li>
							</ul>
						</li>
						<li><span class="secciones">Informaci&oacute;n general</span>
							<ul>
								<li><a href="./listar_articulos.php">Art&iacute;culos</a></li>
								<li><a href="./listar_notas.php">Notas Recomendadas</a></li>
								<li><a href="./eventos.php">Eventos</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- links_laterales -->

				<form action="./buscar.php" id= "form_busqueda" method="GET"  onsubmit="return validar_busqueda_comun(text_buscar.value);">
					<div id="busqueda">
						<h3>Buscador</h3>
						<input name="text_buscar" id="text_buscar" type="text" size="14">
						<input type="submit" id="submitButton" value="Buscar">
						
						<div id="busqueda_avanzada">
							<a href="./busqueda_avanzada.php">B&uacute;squeda avanzada </a>
						</div><!--busqueda_avanzada-->
        			</div><!--busqueda-->
      			</form>

				<div id="links_interes">
					<h3>Links de inter&eacute;s </h3>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "links.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<br>
					<div id="todos_links">
						<a href="./listar_links_interes.php">[ Todos ]</a>
					</div><!--todos_links-->
				</div><!--links_interes-->
				
				<div id="novedades">
					<h3>&Uacute;ltimas novedades </h3>
					<div id= "links_novedades">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "novedades.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>			
					</div><!--links_novedades-->
					
					<div id="todas_novedades">
						<a href="./listar_novedades.php">[ Todas ]</a>
					</div><!--todas_novedades-->
				</div><!-- novedades -->
				
				<br>
				
       			<div id= "usuarios_online">
					<h3>Usuarios Online </h3>
       				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "usuarios_online.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div><!--usuarios_online-->
				
			</div><!--barra_lateral-->
		
			<div id="contenido">
				<h2 id="titulo_pagina"><?php echo $this->_tpl_vars['titulo_pagina']; ?>
</h2>
				<div class="contenido_interior">
					<?php if ($this->_tpl_vars['template']): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['mapa_sitio']): ?>
						<?php echo $this->_tpl_vars['mapa_sitio']; ?>

					<?php endif; ?>
					
					<div id="errores_varios"></div>
					<NOSCRIPT>
						<P class="error">
						######################################################################################################<br>
						UD NO TIENE ACTIVADO JavaScript, SI NO LO ACTIVA NO PODRA NAVEGAR EL SITIO, CONSULTE EL MANUAL DE SU NAVEGADOR WEB Y HABILITE DICHA FUNCION.<br>
						######################################################################################################</P>
					</NOSCRIPT>			
				</div><!--contenido_interior-->
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "paginador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
			</div><!--contenido-->
			
		</div><!--contenedor_medio-->

		<div id="pie_pagina">
			<div id="links_pie">
    			<p><a href="./acerca_de.php">Acerca de</a> | <a href="./faq.php">FAQ's</a> | <a href="./mapa_sitio.php">Mapa del Sitio</a> | <a href="./contacto.php">Contacto</a> | <a href="./rss.php">Suscripci&oacute;n RSS <img alt="logoRSS" src="./images/logoRSS.gif"></a> | <a href="./manual/manual_usuario.pdf">Manual De Usuario</a> | &copy;<?php echo $this->_tpl_vars['year']; ?>
 Red Solidaria Veterinaria</p>
			</div><!--links_pie-->
			
			<div id="links_validadores">
				<p>
    				<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Transitional" height="31" width="88"></a>
					<a href="http://jigsaw.w3.org/css-validator/" target="_blank"><img style="border: 0pt none ; width: 88px; height: 31px;" src="images/vcss.png" alt="[¡CSS Válido!]" title="¡CSS V&aacute;lido!"></a>
  				</p> 
  			</div><!--links_validadores-->
  		</div><!-- pie_pagina-->
	</div><!--contenedor_general-->
</body>
</html>