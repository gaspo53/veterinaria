<form action="./post_articulo.php?user_id={$user_id}" id="formulario_articulo" method="POST" onsubmit="return validar_blancos('titulo|descripcion');">
	<div class="formulario" id="formulario_novedad">
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>

		<p><label for="titulo"> Titulo: </label>
			<input type="text" name="titulo" id="titulo" >
		</p>
	  	<p> 
			<label for="descripcion"> Descripci&oacute;n Completa:</label>
		    <textarea id="descripcion" name="descripcion" cols="30" rows="10"  ></textarea>
	  	</p>	
		<input type="submit" name="Submit" value="Enviar" id="Submit">
		<input type="reset" name="Reset" value="Restablecer" id="Reset">
	</div><!--formulario_novedad-->
</form>