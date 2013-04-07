<!-- FORM USADO PARA MODIFICAR UN USUARIO-->
<form  name="form_modificar"action="./update_user.php" onSubmit="return validar_registro('FALSE');" method="POST" >
			<div class="formulario">
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
				<p>
					<label for="user">Nombre de Usuario</label>
					<input type="text"   name="user" readonly="" id="user" value="{$datos_usuario->username}">
				</p>
				<p>
				<label>Nombre
					<input type="text" name="nombre" id="nombre" value="{$datos_usuario->nombre}">
				</label> 
				</p>
				<p>
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" id="apellido" value="{$datos_usuario->apellido}">
				</p>
				<p>
					<label for="direccion">Direcci&oacute;n</label>
					<input type="text" name="direccion" id="direccion" value="{$datos_usuario->direccion}">
				</p>
				<p>
					<label for="telefono">Tel&eacute;fono</label>
					<input type="text" name="telefono" id="telefono" value="{$datos_usuario->telefono}">
				</p>
				<p>
					<label for="oldPassword">Contrase&ntilde;a Anterior</label>
					<input name="oldPassword" type="password" id="oldPassword">
				</p>
				<p>
					<label for="pass">Contrase&ntilde;a Nueva</label>
					<input name="pass" type="password" id="pass">
				</p>
				<span id="bloq" class="mayus_advert"></span>
				<p>
					<label for="passVerify">Confirmar Contrase&ntilde;a Nueva</label>
					<input name="passVerify" type="password" id="passVerify" >
				</p>
				
				<p>
					<label for="email">E-Mail</label>
					<input type="text" name="email" id="email" value="{$datos_usuario->email}">
				</p>
				<p>
					<label for="profesion">Profesi&oacute;n</label>
					<input type="text" name="profesion" id="profesion" value="{$datos_usuario->profesion}"> 
				</p>
				<p>
					<label for="CSS">Estilo de P&aacute;gina</label>
						<select name="CSS" size="1">
						{foreach from=$css_list item=actual}
							{if $actual->id == $datos_usuario->css}
								<option value="{$actual->id}" selected="selected">{$actual->nombre}</option>
							{else}
								<option value="{$actual->id}">{$actual->nombre}</option>
							{/if}
						{/foreach}
						</select>  
						<input name="preview_style" id="preview_style" type="submit" value="Ver (Pop-Up)" onclick="javascript:openCssWindow('form_modificar');return false">
				</p>
				<input name="enviar" type="submit" value="Actualizar Datos">
			</div>
	</form>
