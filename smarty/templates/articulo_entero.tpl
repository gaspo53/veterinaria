	<h1>{$articulo->titulo}</h1>
	<p>{$articulo->descripcion}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$articulo->idUsuario}">{$articulo->usuario}</a> el {$articulo->fecha}</p>
	<a href="./eliminar_articulo.php?id={$articulo->id}"> Eliminar </a>
	|
	<a href="./agregar_imagen_a_articulo.php?id={$articulo->id}"> Agregar Imagen </a>
	|
	<a href="./agregar_archivo_a_articulo.php?id={$articulo->id}"> Agregar Archivo </a>
	{foreach from=$imagenes_articulo item=picture}
		<div>
		<img alt="{$picture->texto_altern}" src="{$picture->file_path}" width="60%" height="60%">
		<a href="./eliminar_imagen.php?id_imagen={$picture->id}&amp;file_path={$picture->file_path}&amp;id_articulo={$articulo->id}">Eliminar im&aacute;gen</a>
		</div>
	{/foreach}
	<br>	
	<br>	
	<hr>
	{if $archivos_articulo}
		<!-- ESTA VARIALBE PUEDE NO ESTAR SETEADA YA QUE EL ARTICULO PUEDE NO TENER ARCHIVOS
			   ESTE ES EL TPL QUE SE MUESTRA PARA LOS NO LOGUEDAOS, SIN LINKS DE ELIMINAR -->
		<h2>Archivos relacionados:</h2>
			{foreach from=$archivos_articulo item=archivito}
				<a href="{$archivito->file_path}">{$archivito->nombre}</a>
				|
			{/foreach}
		<br>	
		<br>	
	{/if}
