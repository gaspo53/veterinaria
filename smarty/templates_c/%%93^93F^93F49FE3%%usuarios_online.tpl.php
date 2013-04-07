<?php /* Smarty version 2.6.19, created on 2008-02-27 12:38:21
         compiled from usuarios_online.tpl */ ?>
<?php if ($this->_tpl_vars['usuarios_online']): ?>
	<?php $_from = $this->_tpl_vars['usuarios_online']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actual']):
?>
		<p>
		<a href="./mostrar_perfil.php?id=<?php echo $this->_tpl_vars['actual']->idUsuario; ?>
"><?php echo $this->_tpl_vars['actual']->username; ?>
</a>
		</p>
	<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
	<h4>Nadie est&aacute; conectado al sistema. Adem&aacute;s debe iniciar sesi&oacute;n para poder ver los participantes online<br></h4>
<?php endif; ?>