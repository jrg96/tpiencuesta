<?php
/* Smarty version 3.1.30, created on 2017-11-15 21:18:11
  from "E:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\login.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0caf13213593_47742766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34e2b491683cd1fce2304a1b0fc19de701caed08' => 
    array (
      0 => 'E:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\login.php',
      1 => 1510780690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0caf13213593_47742766 (Smarty_Internal_Template $_smarty_tpl) {
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
						<li><a class="font-big" href="/tpiencuesta/index.php/registro">Registrarse</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		<!--/.container-fluid -->
		</div>
    </nav>

    <div class="container">
	
	<form action="/tpiencuesta/index.php/login/procesar" method="post">
        
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
            
                <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
				<div class="alert alert-success">
					<strong><?php echo $_smarty_tpl->tpl_vars['resultado_operacion']->value;?>
</strong> <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>

				</div>
				<?php }?>
                
                
				<!--Panel de inicio de sesion-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<center class="panel-title">
							Inicio de sesión
						</center>
					</div>
					
					<br />
					
					<div class="panel-body">
					    <div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="row">
								    <div class="col-xs-1">
									    <i class="fa fa-user fa-3x"></i>
									</div>
									<div class="col-xs-11">
									    <input type="text" class="form-control input-lg" placeholder="example@email.com" id="txtEmail" name="txtEmail"/>
									</div>
								</div>
								
								<br />
								
								<div class="row">
								    <div class="col-xs-1">
									    <i class="fa fa-lock fa-3x"></i>
									</div>
									<div class="col-xs-11">
									    <input type="password" class="form-control input-lg" placeholder="Contraseña" id="txtContrasenia" name="txtContrasenia"/>
									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>
					
					<br />
					<br />
					
					<div class="panel-footer no-vertical-padding">
					    <div class="row">
						    <div class="col-xs-12 side-padding-zero">
							    <input type="submit" class="btn btn-success btn-block btn-lg no-rounded-corner" value="Iniciar sesión"></input>
							</div>
						</div>
					</div>
				</div>
				<!--Panel de inicio de sesion-->
			</div>
			<div class="col-md-2"></div>
		</div>
		
    </form>
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
bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
