	<h1>{$articulo->titulo}</h1>
	<p>{$articulo->descripcion}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$articulo->idUsuario}">{$articulo->usuario}</a> el {$articulo->fecha}</p>
	{foreach from=$imagenes_articulo item=picture}
		<p>
		<img alt="{$picture->texto_altern}" src="{$picture->file_path}" width="60%" height="60%">
		</p>
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
	{/if}
