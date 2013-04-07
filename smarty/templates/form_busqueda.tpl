<form name="formulario_busqueda_avanzada" action="./buscar_avanzada.php" method="GET" onsubmit="return validar_busqueda_avanzada();">
	<div class="formulario">
	<h4>Complete al menos un criterio de b&uacute;squeda</h4>
		<br>
		<br>
	
		<p>
		  <label for="todas_palabras">Con todas las palabras :  </label>
		<input name="todas_palabras" type="text" id="todas_palabras">
		</p>
		<p>
		  <label for="alguna_palabra">Con alguna de las palabras :  </label>
		<input type="text" name="alguna_palabra" id="alguna_palabra">
		</p>
		<p>
		  <label for="sin_palabras">Sin las palabras:  </label>
		<input type="text" name="sin_palabras" id="sin_palabras">
		</p>
		<div>
			<h3>Buscar en:</h3>
			<p><input name="bus_novedades" type="checkbox" id="bus_novedades" value="checkbox">
			  <label for="bus_novedades">Novedades</label></p>
			<p><input type="checkbox" name="bus_articulos" value="checkbox" id="bus_articulos">
			<label for="bus_articulos">Art&iacute;culos</label>
			</p>					  
			<p><input type="checkbox" name="bus_eventos" value="checkbox" id="bus_eventos">
			<label for="bus_eventos">Eventos</label>
			</p>					  
			<p><input type="checkbox" name="bus_links" value="checkbox" id="bus_links">
			<label for="bus_links">Links de inter&eacute;s </label>
			</p>
			<p><input type="checkbox" name="bus_notas" value="checkbox" id="bus_notas">
			<label for="bus_notas">Notas recomendadas </label>
			</p>	
			<input type="submit" name="Submit" value="Buscar">
			<input type="reset" name="Reset" value="Restablecer">							
		</div>
	</div><!--formulario-->				
</form>