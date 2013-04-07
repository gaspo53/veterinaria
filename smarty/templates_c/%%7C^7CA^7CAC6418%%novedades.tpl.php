<?php /* Smarty version 2.6.19, created on 2013-04-07 15:40:06
         compiled from novedades.tpl */ ?>
<!--si hay alguna novedad en novex, muestra una pequenia descripcion de cada una, se usa para la barra lateral -->
<?php if ($this->_tpl_vars['novex']): ?>
	<?php $_from = $this->_tpl_vars['novex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actual']):
?>
		<p> <?php echo $this->_tpl_vars['actual']->nombre_corto; ?>
:
		<a href="./ver_novedad.php?id=<?php echo $this->_tpl_vars['actual']->id; ?>
">[m&aacute;s...] </a>
		</p>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>