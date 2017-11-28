<?php
/* Smarty version 3.1.30, created on 2017-11-28 02:58:25
  from "H:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\editar_profesor.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1cd0d14c8d30_15392621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '598ea932ea044d4af8a7b74e96d1bba3cd708c3a' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\editar_profesor.php',
      1 => 1511837902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1cd0d14c8d30_15392621 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar profesor</title>
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
            
            <form action="/tpiencuesta/index.php/editarprofesor/procesar" method="POST">
                <input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $_smarty_tpl->tpl_vars['profesor']->value['id_profesor'];?>
">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar profesor</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">Nombre profesor:</label>
                            <input type="text" class="form-control" id="nombre_profesor" name="nombre_profesor" value="<?php echo $_smarty_tpl->tpl_vars['profesor']->value['nombre_profesor'];?>
">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Carrera:</label>
                            <input type="text" class="form-control" id="carrera_profesor" name="carrera_profesor" value="<?php echo $_smarty_tpl->tpl_vars['profesor']->value['carrera_profesor'];?>
">
                        </div>
						
                        <button type="submit" class="btn btn-success">Editar info basica</input>
                    </div>
                </div>
            </form>
			
			<form action="/tpiencuesta/index.php/editarprofesor/procesarmateria" method="POST">
                <input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $_smarty_tpl->tpl_vars['profesor']->value['id_profesor'];?>
">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar materias impartidas</div>
                    <div class="panel-body">
					
						<div class="form-group">
                            <label for="id_cuenta">Materia:</label>
							<select class="form-control" id="materia_agregar" name="materia_agregar">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['materias']->value, 'materia');
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
						
                        <button type="submit" class="btn btn-success">Agregar materia</button>
						
						<br />
						<br />
						
						<table class="table">
                            <thead>
                                <tr>
                                    <th><center>Codigo</center></th>
                                    <th><center>Nombre materia</center></th>
                                    <th><center>Accion</center></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['materias_impartidas']->value, 'materia');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['materia']->value) {
?>
                                <tr>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['materia']->value['codigo_materia'];?>
</center></th>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['materia']->value['nombre_materia'];?>
</center></th>
                                    <th><center><a href="/tpiencuesta/index.php/eliminarmateriaprofesor/index/<?php echo $_smarty_tpl->tpl_vars['materia']->value['id_detalle_materia_profesor'];?>
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
