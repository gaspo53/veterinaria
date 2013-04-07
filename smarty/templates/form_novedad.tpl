<!-- FORM USADO PARA CARGAR UNA NOVEDAD -->
<form action="./post_novedad.php?user_id={$user_id}" id="formulario_novedad" method="post" onsubmit="return validar_blancos('nombre_corto|nombre_largo|desc_corta|desc_larga');">
	<div class="formulario">
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
		<p>	<label for="nombre_largo"> Nombre Completo: </label>
			<input type="text" name="nombre_largo" id="nombre_largo" >
		</p>

		<p>	<label for="nombre_corto">Nombre Corto: </label>
			<input type="text" name="nombre_corto" id="nombre_corto">
		</p>		

	  <p> 
			<label for="dec_corta"> Breve Descripci&oacute;n:</label>
		    <textarea name="desc_corta" id="desc_corta" cols="30" rows="10" ></textarea>
	  </p>	
	  <p> 
			<label for="desc_larga" style="text-align:left"> Descripci&oacute;n Completa:</label>
		    <textarea name="desc_larga" id="desc_larga" cols="30" rows="10"  ></textarea>
	  </p>	
		<input type="submit" name="Submit" value="Enviar" id="Submit">
		<input type="reset" name="Reset" value="Restablecer" id="Reset">
	</div><!--formulario_novedad-->
</form>