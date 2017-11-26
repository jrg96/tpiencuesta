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

			{foreach item=seccion from=$datos_desplegar}
			<div class="panel panel-primary">
				<div class="panel-heading">{$seccion.seccion.nombre_seccion}</div>
				<div class="panel-body">
					
					{foreach item=criterio from=$seccion.criterios}
					<div class="panel panel-primary">
						<div class="panel-heading">{$criterio.criterio.nombre_criterio}</div>
							<div class="panel-body">
								<input type="hidden" id="etiquetas_{$criterio.id_grafico}" value="{$criterio.valores}" />
								<input type="hidden" id="cuentas_{$criterio.id_grafico}" value="{$criterio.cuenta}" />
								<canvas id="grafico_{$criterio.id_grafico}" width="300" height="300"></canvas>
							</div>
					</div>
					{/foreach}
				</div>
			</div>
			{/foreach}

        </div>



        <!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{$base_url}js/jquery-3.2.1.min.js"></script>
		<script src="{$base_url}bootstrap/js/bootstrap.js"></script>
		<script src="{$base_url}chartsjs/Chart.js"></script>
		<script src="{$base_url}js/mostrar_estadisticas_evaluacion.js"></script>
    </body>
</html>