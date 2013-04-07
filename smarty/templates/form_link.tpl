<!-- FORM USADO PARA CARGAR UN LINK-->
<form action="./post_link.php?user_id={$user_id}" id="formulario_link" method="POST" onsubmit="return validar_blancos('titulo|url|descripcion');">
	<div class="formulario" >
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
		<p>	<label for="titulo"> T&iacute;tulo Completo: </label>
			<input type="text" name="titulo" id="titulo" >
		</p>

		<p>	<label for="url">Link: </label>
			<input type="text" name="url" id="url" value="http://">
		</p>	
		
		<p>	<label for="descripcion">Descripci&oacute;n: </label>
			<input type="text" name="descripcion" id="descripcion">
		</p>	
			
		<input type="submit" name="Submit" value="Publicar" id="Submit">
		<input type="reset" name="Reset" value="Restablecer" id="Reset">
	</div><!--formulario_link-->
</form>