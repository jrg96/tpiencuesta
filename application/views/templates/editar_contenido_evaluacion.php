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
            
            {if $resultado_operacion neq 'ninguna'}
            <div class="alert alert-success">
                <strong>{$resultado_operacion}</strong> {$mensaje_operacion}
            </div>
            {/if}
            
			<h2>{$evaluacion.nombre_evaluacion}</h2>
            <form action="/tpiencuesta/index.php/editarcontenidoevaluacion/procesarseccion" method="POST">
                <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="{$evaluacion.id_evaluacion}">
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
                                {foreach item=seccion from=$secciones}
                                <tr>
                                    <th><center>{$seccion.nombre_seccion}</center></th>
                                    <th><center><a href="/tpiencuesta/index.php/editarseccion/index/{$evaluacion.id_evaluacion}/{$seccion.id_seccion_evaluacion}">Modificar</a></center></th>
                                    <th><center><a href="/sic115/index.php/">Eliminar</a></center></th>
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
			
			<br />
			
			<form action="/tpiencuesta/index.php/editarcontenidoevaluacion/procesarcriterio" method="POST">
                <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="{$evaluacion.id_evaluacion}">
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
								{foreach item=seccion from=$secciones}
								<option value="{$seccion.id_seccion_evaluacion}">{$seccion.nombre_seccion}</option>
								{/foreach}
							</select>
                        </div>
						
                        <button type="submit" class="btn btn-success">Crear criterio</button>
                    </div>
                </div>
            </form>
			
			<br />
			
			{foreach item=seccion from=$datos_desplegar}
			<div class="panel panel-primary">
				<div class="panel-heading">{$seccion.seccion.nombre_seccion}</div>
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
							{foreach item=criterio from=$seccion.criterios}
							<tr>
								<th>{$criterio.nombre_criterio}</th>
								<th><center>{$criterio.minimo}</center></th>
								<th><center>{$criterio.maximo}</center></th>
								<th><center><a href="/tpiencuesta/index.php/editarcriterio/index/{$evaluacion.id_evaluacion}/{$seccion.seccion.id_seccion_evaluacion}/{$criterio.id_criterio_seccion}">Modificar</a></center></th>
								<th><center><a href="/sic115/index.php/">Eliminar</a></center></th>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
			{/foreach}
        </div>



        <!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{$base_url}js/jquery-3.2.1.min.js"></script>
		<script src="{$base_url}bootstrap/js/bootstrap.js"></script>
    </body>
</html>