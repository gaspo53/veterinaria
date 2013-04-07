<!-- FORM USADO PARA CARGAR UNA IMAGEN A UN ARTICULO-->
<form enctype="multipart/form-data" action="./post_imagen.php?id={$id_articulo}" method="post" onsubmit="return validar_blancos('imagen|altern');">
	<div class="formulario">
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
		<p><label for="imagen">Im&aacute;gen: </label><input name="imagen" id="imagen" type="file">
		<p><label for="altern">Texto Alternativo: </label><input name="altern" id="altern" type="text"></p>
		<input type="submit" value="Cargar Im&aacute;gen">
	</div>
</form>