<form action="./post_contacto.php" id="formulario_contacto" method="POST" onSubmit="return validar_contacto();">
	<div class="formulario">
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
		
		<p>	<label for="nombre"> Nombre: </label>
			<input type="text" name="nombre" id="nombre">
		</p>

		<p>	<label for="email">E-Mail: </label>
			<input type="text" name="email" id="email">
		</p>		

		<p> 
			<label for="mensaje" style="text-align:left"> Consulta:</label>
			<textarea name="mensaje" id="mensaje" cols="30" rows="10" ></textarea>
		</p>					
		<input type="submit" name="Submit" value="Enviar" id="Submit">
		<input type="reset" name="Reset" value="Restablecer" id="Reset">
	</div><!--formulario_contacto-->
</form>