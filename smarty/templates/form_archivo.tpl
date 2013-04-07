<form enctype="multipart/form-data" action="./post_archivo.php?id={$id_articulo}" method="POST" onsubmit="return validar_blancos('nombre|archivo');">
	<div class="formulario">
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
		<p><label for="nombre">Nombre: </label><input name="nombre" id="nombre" type="text"></p>
		<p><label for="archivo">Archivo: </label><input  name="archivo" id="archivo" type="file"></p>
		<p><input type="submit" value="Cargar Archivo"></p>
	</div>
</form>