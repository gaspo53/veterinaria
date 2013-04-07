<?php /* Smarty version 2.6.19, created on 2008-02-27 12:38:21
         compiled from novedades.tpl */ ?>
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