<!-- FORM USADO PARA ENVIARLE UN MENSAJE A OTRO USUARIO-->
<form action="./post_mensaje.php" id="formulario_mensaje" method="POST" onsubmit="return validar_blancos('asunto|mensaje');">
	<div class="formulario" >
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
		<p>	<label for="asunto"> Asunto: </label>
			<input type="text" name="asunto" id="asunto" value="{$asunto}">
		</p>
		<p>	<label for="destinatario"> Para: </label>
			<select name="destinatario" id="destinatario" >
				{foreach from=$users item=actual}
					<option value="{$actual->username}">{$actual->username}</option>
				{/foreach}
			</select>
				
		</p>
	  <p> 
			<label for="mensaje"> Descripci&oacute;n Completa:</label>
		    <textarea name="mensaje" id="mensaje" cols="30" rows="10"  ></textarea>
	  </p>	
		<input type="submit" name="Submit" value="Enviar" id="Submit">
		<input type="reset" name="Reset" value="Restablecer" id="Reset">
	</div><!--formulario_mensaje-->
</form>