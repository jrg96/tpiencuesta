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
			<form action="/tpiencuesta/index.php/mostrarevaluacion/procesar" method="POST">
			<input type="hidden" name="id_evaluacion" id="id_evaluacion" value="{$evaluacion.id_evaluacion}">
			{foreach item=seccion from=$datos_desplegar}
			<div class="panel panel-primary">
				<div class="panel-heading">{$seccion.seccion.nombre_seccion}</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th><center>Criterio</center></th>
								<th><center>Nota</center></th>
							</tr>
						</thead>
						
						<tbody>
							{foreach item=criterio from=$seccion.criterios}
							<tr>
								<th>{$criterio.criterio.nombre_criterio}</th>
								<th><center>
									<select class="form-control" id="{$evaluacion.id_evaluacion}_{$seccion.seccion.id_seccion_evaluacion}_{$criterio.criterio.id_criterio_seccion}" name="{$evaluacion.id_evaluacion}_{$seccion.seccion.id_seccion_evaluacion}_{$criterio.criterio.id_criterio_seccion}">
										{foreach item=valor from=$criterio.valores}
											<option value="{$valor}">{$valor}</option>
										{/foreach}
									</select>
								</center></th>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
			{/foreach}
			
			<br />
			
			<div class="panel panel-primary">
				<div class="panel-heading">Procesar</div>
				<div class="panel-body">
					<button type="submit" class="btn btn-success">Contestar evaluacion</input>
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