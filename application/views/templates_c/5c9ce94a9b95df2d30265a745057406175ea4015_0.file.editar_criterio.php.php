<?php
/* Smarty version 3.1.30, created on 2017-11-16 21:48:24
  from "H:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\editar_criterio.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0e07a8d1bcc3_25641712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9ce94a9b95df2d30265a745057406175ea4015' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\editar_criterio.php',
      1 => 1510868902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0e07a8d1bcc3_25641712 (Smarty_Internal_Template $_smarty_tpl) {
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

			<form action="/tpiencuesta/index.php/editarcriterio/procesar" method="POST">
                <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
">
				<input type="hidden" name="id_seccion" id="id_seccion" value="<?php echo $_smarty_tpl->tpl_vars['seccion_especifica']->value['id_seccion_evaluacion'];?>
">
				<input type="hidden" name="id_criterio" id="id_criterio" value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value['id_criterio_seccion'];?>
">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar criterio</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">Nombre de criterio:</label>
                            <input type="text" class="form-control" id="nombre_criterio" name="nombre_criterio" value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value['nombre_criterio'];?>
">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">minimo:</label>
                            <input type="text" class="form-control" id="minimo" name="minimo" value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value['minimo'];?>
">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">maximo:</label>
                            <input type="text" class="form-control" id="maximo" name="maximo" value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value['maximo'];?>
">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Agregar a seccion:</label>
                            <select class="form-control" id="seccion_agregar" name="seccion_agregar">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['secciones']->value, 'seccion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['seccion']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['seccion']->value['id_seccion_evaluacion'];?>
"><?php echo $_smarty_tpl->tpl_vars['seccion']->value['nombre_seccion'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
                        </div>
						
                        <button type="submit" class="btn btn-success">Editar criterio</button>
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
