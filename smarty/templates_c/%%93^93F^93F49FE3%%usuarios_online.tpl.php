<?php /* Smarty version 2.6.19, created on 2013-04-07 15:40:06
         compiled from usuarios_online.tpl */ ?>
<!-- muestra un link al perfil de los usuarios online -->
<?php if ($this->_tpl_vars['usuarios_online']): ?>
	<?php $_from = $this->_tpl_vars['usuarios_online']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actual']):
?>
		<p>
		<a href="./mostrar_perfil.php?id=<?php echo $this->_tpl_vars['actual']->idusuario; ?>
"><?php echo $this->_tpl_vars['actual']->username; ?>
</a>
		</p>
	<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
	<h4>Nadie est&aacute; conectado al sistema. Adem&aacute;s debe iniciar sesi&oacute;n para poder ver los participantes online<br></h4>
<?php endif; ?>