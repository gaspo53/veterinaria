<!-- FORM USADO PARA CARGAR UNA NOTA -->
<form action="./post_nota.php?user_id={$user_id}" id="formulario_nota" method="POST" onsubmit="return validar_blancos('titulo|link|nota');">
	<div class="formulario" >
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
		<p>	<label for="titulo"> Titulo: </label>
			<input type="text" name="titulo" id="titulo" >
		</p>

		<p>	<label for="link">Link: </label>
			<input type="text" name="link" id="link" value="http://">
		</p>		

	  <p> 
			<label for="nota" style="text-align:left"> Nota:</label>
		    <textarea name="nota" id="nota" cols="30" rows="10" ></textarea>
	  </p>	
		<input type="submit" name="Submit" value="Enviar" id="Submit">
		<input type="reset" name="Reset" value="Restablecer" id="Reset">
	</div><!--formulario_novedad-->
</form>