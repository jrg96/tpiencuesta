<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema gestor de encuestas</title>
    <link href="{$base_url}bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="{$base_url}css/style.css" rel="stylesheet">
    <link href="{$base_url}font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
                {if $resultado_operacion neq 'ninguna'}
				<div class="alert alert-success">
					<strong>{$resultado_operacion}</strong> {$mensaje_operacion}
				</div>
				{/if}
                
			    {foreach item=materia from=$materias}
                    <!-- Lista informacion encuesta --->
                    <div class="panel panel-primary">
                        
                        <div class="panel-body">
                            <h3 class="underlined"><b>{$materia.codigo_materia}</b></h3>
                            <br />
                            <h4><b>Nombre:</b> {$materia.nombre_materia}</h4>
                        </div>
                        
                        <div class="panel-footer no-vertical-padding">
                            <div class="row">
                                <div class="col-sm-6 side-padding-zero">
                                    <a href="/tpiencuesta/index.php/editarmateria/index/{$materia.id_materia}" class="btn btn-primary btn-block btn-lg no-rounded-corner">Editar materia</a>
                                </div>
								<div class="col-sm-6 side-padding-zero">
                                    <a href="/tpiencuesta/index.php/eliminarmateria/index/{$materia.id_materia}" class="btn btn-warning btn-block btn-lg no-rounded-corner">Eliminar materia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Lista informacion encuesta --->
				{/foreach}
			</div>
		</div>
		<!-- Lista de enmcuestas disponibles --->
		
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{$base_url}js/jquery-3.2.1.min.js"></script>
    <script src="{$base_url}js/tether.js"></script>
    <script src="{$base_url}bootstrap/js/bootstrap.js"></script>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                animated : 'fade',
                container: 'body'
            });   
        });
    </script> 
  </body>
</html>