<?php
/* Smarty version 3.1.30, created on 2017-11-28 04:04:12
  from "H:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\editar_evaluacion_profesor.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1ce03cd03184_01415890',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '996b9f85368bf6a5e701b4b7a99d980b9217d0fe' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\editar_evaluacion_profesor.php',
      1 => 1511840480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1ce03cd03184_01415890 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear Evaluacion profesor</title>
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
						<a class="navbar-brand font-big" href="/tpiencuesta/index.php/inicio">Evaluacion profesores</a>
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
            
            <form action="/tpiencuesta/index.php/editarevaluacion/procesar" method="POST">
                <input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $_smarty_tpl->tpl_vars['profesor']->value['id_profesor'];?>
">
				<input type="hidden" name="id_evaluacion" id="id_evaluacion" value="<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar Evaluacion</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">La evaluacion se realizará a: <?php echo $_smarty_tpl->tpl_vars['profesor']->value['nombre_profesor'];?>
</label>
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Materia a evaluar:</label>
                            <select class="form-control" id="materia_evaluar" name="materia_evaluar">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['materias_impartidas']->value, 'materia');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['materia']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['materia']->value['id_materia'];?>
"><?php echo $_smarty_tpl->tpl_vars['materia']->value['codigo_materia'];?>
 <?php echo $_smarty_tpl->tpl_vars['materia']->value['nombre_materia'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Nombre evaluacion:</label>
                            <input type="text" class="form-control" id="nombre_evaluacion" name="nombre_evaluacion" value="<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['nombre_evaluacion'];?>
">
                        </div>
						
                        <button type="submit" class="btn btn-success">Editar Evaluacion</input>
                    </div>
                </div>
            </form>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Informacion general:</div>
				<div class="panel-body">
					
					<div class="form-group">
						<label for="id_cuenta">Link: <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php/mostrarevaluacion/index/<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
"><?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php/mostrarevaluacion/index/<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
</a></label>
					</div>
					
					<a href="/tpiencuesta/index.php/vaciarevaluacion/index/<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
" class="btn btn-danger" role="button">Vaciar encuesta</a>
				</div>
			</div>
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
