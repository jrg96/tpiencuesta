<?php
/* Smarty version 3.1.30, created on 2017-11-17 00:19:02
  from "H:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\mostrar_evaluacion.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0e2af6bbfe67_38680838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17e6226c7272d4b11d634e7326a80bae738ccd6a' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\mostrar_evaluacion.php',
      1 => 1510877262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0e2af6bbfe67_38680838 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear cuenta</title>
        <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/style.css" rel="stylesheet">
		<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
font-awesome/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top navbar-md">
		<div class="container">
		    <div class="container-fluid">
		        <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-left navbar-brand navbar-logo" href="index.html">
						<img src="" alt="Dispute Bills">
						<a class="navbar-brand font-big" href="#">MiEncuesta</a>
					</a>
		        </div>
				
				<div id="navbar1" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a class="font-big" href="/tpiencuesta/index.php/inicio">Inicio</a></li>
						<li><a class="font-big" href="/tpiencuesta/index.php/logout">Cerrar sesión</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		<!--/.container-fluid -->
		</div>
    </nav>

        <div class="container">
            <br />
            
            <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
            <div class="alert alert-success">
                <strong><?php echo $_smarty_tpl->tpl_vars['resultado_operacion']->value;?>
</strong> <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>

            </div>
            <?php }?>
            
			<h2><?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['nombre_evaluacion'];?>
</h2>
			<form action="/tpiencuesta/index.php/mostrarevaluacion/procesar" method="POST">
			<input type="hidden" name="id_evaluacion" id="id_evaluacion" value="<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datos_desplegar']->value, 'seccion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['seccion']->value) {
?>
			<div class="panel panel-primary">
				<div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['seccion']->value['seccion']['nombre_seccion'];?>
</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th><center>Criterio</center></th>
								<th><center>Nota</center></th>
							</tr>
						</thead>
						
						<tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['seccion']->value['criterios'], 'criterio');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['criterio']->value) {
?>
							<tr>
								<th><?php echo $_smarty_tpl->tpl_vars['criterio']->value['criterio']['nombre_criterio'];?>
</th>
								<th><center>
									<select class="form-control" id="<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
_<?php echo $_smarty_tpl->tpl_vars['seccion']->value['seccion']['id_seccion_evaluacion'];?>
_<?php echo $_smarty_tpl->tpl_vars['criterio']->value['criterio']['id_criterio_seccion'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
_<?php echo $_smarty_tpl->tpl_vars['seccion']->value['seccion']['id_seccion_evaluacion'];?>
_<?php echo $_smarty_tpl->tpl_vars['criterio']->value['criterio']['id_criterio_seccion'];?>
">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['criterio']->value['valores'], 'valor');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['valor']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['valor']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['valor']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</select>
								</center></th>
							</tr>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</tbody>
					</table>
				</div>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			
			<br />
			
			<div class="panel panel-primary">
				<div class="panel-heading">Procesar</div>
				<div class="panel-body">
					<button type="submit" class="btn btn-success">Contestar evaluacion</input>
				</div>
			</div>
			</form>
        </div>



        <!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
