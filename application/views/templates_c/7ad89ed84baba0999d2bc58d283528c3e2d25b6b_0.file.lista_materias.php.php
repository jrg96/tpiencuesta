<?php
/* Smarty version 3.1.30, created on 2017-11-28 02:49:22
  from "H:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\lista_materias.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1cceb2ed0ed6_03801187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ad89ed84baba0999d2bc58d283528c3e2d25b6b' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\lista_materias.php',
      1 => 1511837362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1cceb2ed0ed6_03801187 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema gestor de encuestas</title>
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/style.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
    <!-- Barra de navegacion de sistema gestor -->
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
	
	    <!-- encabezado de mis encuestas + boton -->
		<div class="row">
			<div class="col-md-3 col-xs-0">
			    <h4>
                    <b data-toggle="tooltip" data-placement="right" title="En este espacio se muestran las encuestas creadas">
                        Profesores
                        <i class="fa fa-question-circle fa-1x"></i>
                    </b>
                </h4>
			</div>
			<div class="col-md-3 col-xs-6">
				<a href="/tpiencuesta/index.php/miespacio/index" class="btn btn-success btn-block btn-md">Listado de profesores</a>
			</div>
			<div class="col-md-3 col-xs-6">
				<a href="/tpiencuesta/index.php/crearmateria" class="btn btn-success btn-block btn-md">Nueva materia</a>
			</div>
			<div class="col-md-3 col-xs-6">
			    <a href="/tpiencuesta/index.php/crearprofesor" class="btn btn-success btn-block btn-md">Nuevo profesor</a>
			</div>
		</div>
		<!-- encabezado de mis encuestas + boton -->
		
		<br />
		
		<!-- Lista de enmcuestas disponibles --->
		<div class="row">
			<div class="col-md-12">
                <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
				<div class="alert alert-success">
					<strong><?php echo $_smarty_tpl->tpl_vars['resultado_operacion']->value;?>
</strong> <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>

				</div>
				<?php }?>
                
			    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['materias']->value, 'materia');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['materia']->value) {
?>
                    <!-- Lista informacion encuesta --->
                    <div class="panel panel-primary">
                        
                        <div class="panel-body">
                            <h3 class="underlined"><b><?php echo $_smarty_tpl->tpl_vars['materia']->value['codigo_materia'];?>
</b></h3>
                            <br />
                            <h4><b>Nombre:</b> <?php echo $_smarty_tpl->tpl_vars['materia']->value['nombre_materia'];?>
</h4>
                        </div>
                        
                        <div class="panel-footer no-vertical-padding">
                            <div class="row">
                                <div class="col-sm-6 side-padding-zero">
                                    <a href="/tpiencuesta/index.php/editarmateria/index/<?php echo $_smarty_tpl->tpl_vars['materia']->value['id_materia'];?>
" class="btn btn-primary btn-block btn-lg no-rounded-corner">Editar materia</a>
                                </div>
								<div class="col-sm-6 side-padding-zero">
                                    <a href="/tpiencuesta/index.php/eliminarmateria/index/<?php echo $_smarty_tpl->tpl_vars['materia']->value['id_materia'];?>
" class="btn btn-warning btn-block btn-lg no-rounded-corner">Eliminar materia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Lista informacion encuesta --->
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</div>
		</div>
		<!-- Lista de enmcuestas disponibles --->
		
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/tether.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                animated : 'fade',
                container: 'body'
            });   
        });
    <?php echo '</script'; ?>
> 
  </body>
</html><?php }
}
