<?php
/* Smarty version 3.1.30, created on 2017-11-28 03:16:21
  from "H:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\editar_contenido_evaluacion.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1cd505a41612_31469280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6dd9a2a3e0234da15e52640f97f1c4a9d99c0eb8' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\editar_contenido_evaluacion.php',
      1 => 1511838964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1cd505a41612_31469280 (Smarty_Internal_Template $_smarty_tpl) {
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
            <form action="/tpiencuesta/index.php/editarcontenidoevaluacion/procesarseccion" method="POST">
                <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
">
                <div class="panel panel-primary">
                    <div class="panel-heading">Crear seccion evaluacion</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">Nombre de seccion:</label>
                            <input type="text" class="form-control" id="nombre_seccion" name="nombre_seccion">
                        </div>
						
                        <button type="submit" class="btn btn-success">Crear seccion</button>
						
						<br />
						<br />
						
						<table class="table">
                            <thead>
                                <tr>
                                    <th><center>Nombre seccion</center></th>
                                    <th><center>Modificar</center></th>
                                    <th><center>Eliminar</center></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['secciones']->value, 'seccion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['seccion']->value) {
?>
                                <tr>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['seccion']->value['nombre_seccion'];?>
</center></th>
                                    <th><center><a href="/tpiencuesta/index.php/editarseccion/index/<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
/<?php echo $_smarty_tpl->tpl_vars['seccion']->value['id_seccion_evaluacion'];?>
">Modificar</a></center></th>
                                    <th><center><a href="/tpiencuesta/index.php/eliminarseccion/index/<?php echo $_smarty_tpl->tpl_vars['seccion']->value['id_seccion_evaluacion'];?>
">Eliminar</a></center></th>
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
            </form>
			
			<br />
			
			<form action="/tpiencuesta/index.php/editarcontenidoevaluacion/procesarcriterio" method="POST">
                <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
">
                <div class="panel panel-primary">
                    <div class="panel-heading">Crear criterio</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">Nombre de criterio:</label>
                            <input type="text" class="form-control" id="nombre_criterio" name="nombre_criterio">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">minimo:</label>
                            <input type="text" class="form-control" id="minimo" name="minimo">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">maximo:</label>
                            <input type="text" class="form-control" id="maximo" name="maximo">
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
						
                        <button type="submit" class="btn btn-success">Crear criterio</button>
                    </div>
                </div>
            </form>
			
			<br />
			
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
								<th><center>Min</center></th>
								<th><center>Max</center></th>
								<th><center>Modificar</center></th>
								<th><center>Eliminar</center></th>
							</tr>
						</thead>
						
						<tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['seccion']->value['criterios'], 'criterio');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['criterio']->value) {
?>
							<tr>
								<th><?php echo $_smarty_tpl->tpl_vars['criterio']->value['nombre_criterio'];?>
</th>
								<th><center><?php echo $_smarty_tpl->tpl_vars['criterio']->value['minimo'];?>
</center></th>
								<th><center><?php echo $_smarty_tpl->tpl_vars['criterio']->value['maximo'];?>
</center></th>
								<th><center><a href="/tpiencuesta/index.php/editarcriterio/index/<?php echo $_smarty_tpl->tpl_vars['evaluacion']->value['id_evaluacion'];?>
/<?php echo $_smarty_tpl->tpl_vars['seccion']->value['seccion']['id_seccion_evaluacion'];?>
/<?php echo $_smarty_tpl->tpl_vars['criterio']->value['id_criterio_seccion'];?>
">Modificar</a></center></th>
								<th><center><a href="/tpiencuesta/index.php/eliminarcriterio/index/<?php echo $_smarty_tpl->tpl_vars['criterio']->value['id_criterio_seccion'];?>
">Eliminar</a></center></th>
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
