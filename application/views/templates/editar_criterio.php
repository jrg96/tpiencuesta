<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear cuenta</title>
        <link href="{$base_url}bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="{$base_url}css/style.css" rel="stylesheet">
		<link href="{$base_url}font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
            
            {if $resultado_operacion neq 'ninguna'}
            <div class="alert alert-success">
                <strong>{$resultado_operacion}</strong> {$mensaje_operacion}
            </div>
            {/if}
            
			<h2>{$evaluacion.nombre_evaluacion}</h2>

			<form action="/tpiencuesta/index.php/editarcriterio/procesar" method="POST">
                <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="{$evaluacion.id_evaluacion}">
				<input type="hidden" name="id_seccion" id="id_seccion" value="{$seccion_especifica.id_seccion_evaluacion}">
				<input type="hidden" name="id_criterio" id="id_criterio" value="{$criterio.id_criterio_seccion}">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar criterio</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">Nombre de criterio:</label>
                            <input type="text" class="form-control" id="nombre_criterio" name="nombre_criterio" value="{$criterio.nombre_criterio}">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">minimo:</label>
                            <input type="text" class="form-control" id="minimo" name="minimo" value="{$criterio.minimo}">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">maximo:</label>
                            <input type="text" class="form-control" id="maximo" name="maximo" value="{$criterio.maximo}">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Agregar a seccion:</label>
                            <select class="form-control" id="seccion_agregar" name="seccion_agregar">
								{foreach item=seccion from=$secciones}
								<option value="{$seccion.id_seccion_evaluacion}">{$seccion.nombre_seccion}</option>
								{/foreach}
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
		<script src="{$base_url}js/jquery-3.2.1.min.js"></script>
		<script src="{$base_url}bootstrap/js/bootstrap.js"></script>
    </body>
</html>