<?php
/* Smarty version 3.1.30, created on 2017-11-16 02:59:46
  from "H:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\editar_materia.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0cff227b95a7_58284016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19b37e1896de0347e32fee9e45b9613e212b4d6e' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\editar_materia.php',
      1 => 1510801182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0cff227b95a7_58284016 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear materia</title>
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
            <br />
            <br />
            
            <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
            <div class="alert alert-success">
                <strong><?php echo $_smarty_tpl->tpl_vars['resultado_operacion']->value;?>
</strong> <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>

            </div>
            <?php }?>
            
            <form action="/tpiencuesta/index.php/editarmateria/procesar" method="POST">
                <input type="hidden" name="id_materia" id="id_materia" value="<?php echo $_smarty_tpl->tpl_vars['materia']->value['id_materia'];?>
">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar materia</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">Codigo materia:</label>
                            <input type="text" class="form-control" id="codigo_materia" name="codigo_materia" value="<?php echo $_smarty_tpl->tpl_vars['materia']->value['codigo_materia'];?>
">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Nombre materia:</label>
                            <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" value="<?php echo $_smarty_tpl->tpl_vars['materia']->value['nombre_materia'];?>
">
                        </div>
						
                        <button type="submit" class="btn btn-success">Editar materia</input>
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
