<!-- FORM USADO PARA UN NUEVO REGISTRO DE USUARIO -->
<form action="./save_user.php" name="form_registro" method="POST" onsubmit="return validar_registro('TRUE')">
			<div class="formulario">
				<h4> Todos los datos son obligatorios</h4>
				<p><label for>Nombre</label> 
					<input type="text" name="nombre" id="nombre" value="">
				</p>
				<p><label for="apellido">Apellido</label>
						<input type="text" name="apellido" id="apellido">
					
				</p>
				<p>
					<label>Direcci&oacute;n</label>
						<input type="text" name="direccion" id="direccion">
				</p>
				<p>
					<label>Tel&eacute;fono</label>
						<input type="text" name="telefono" id="telefono">
				</p>
				<p>
					<label>Nombre de Usuario</label>
						<input type="text" name="user" id="user" onblur="javascript:checkUsername()">
				</p>
				<div id="ajax_result_username">
				</div>
				<p>
					<label>Contrase&ntilde;a</label>
						<input name="pass" type="password" id="pass">
				</p>
				<span id="bloq" class="mayus_advert"></span>
				<p>
					<label>Confirmar Contrase&ntilde;a</label>
						<input name="passVerify" type="password" id="passVerify">
				</p>
				<p>
					<label>E-Mail</label>
						<input type="text" name="email" id="email">
				</p>
				<p>
					<label>Profesi&oacute;n</label>
						<input type="text" name="profesion" id="profesion">

				</p>
				<p>
					<label>Estilo de P&aacute;gina</label>
						<select name="CSS" size="1">
						{foreach from=$css_list item=actual}
							<option value="{$actual->id}">{$actual->nombre}</option>
						{/foreach}
						</select>  
						<input name="preview_style" id="preview_style" type="submit" value="Ver (Pop-Up)" onclick="javascript:openCssWindow('form_registro');return false">
				</p>
				<input name="enviar_registro" id="enviar_registro" type="submit" value="Enviar">
			</div>
	</form>
