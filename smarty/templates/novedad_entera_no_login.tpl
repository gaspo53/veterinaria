<!-- lista los datos de la novedad solo para verla -->
<h2>{$novedad->nombre_largo}</h2>
<p>{$novedad->nombre_corto}</p>
<p>{$novedad->desc_corta}</p>
<p>{$novedad->desc_larga}</p>
<p>Posteada por <a href="./mostrar_perfil.php?id={$novedad->idUsuario}">{$novedad->usuario}</a> el {$novedad->fecha}</p>
