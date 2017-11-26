<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear Evaluacion profesor</title>
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
            <br />
            <br />
            
            {if $resultado_operacion neq 'ninguna'}
            <div class="alert alert-success">
                <strong>{$resultado_operacion}</strong> {$mensaje_operacion}
            </div>
            {/if}
            
            <form action="/tpiencuesta/index.php/editarevaluacion/procesar" method="POST">
                <input type="hidden" name="id_profesor" id="id_profesor" value="{$profesor.id_profesor}">
				<input type="hidden" name="id_evaluacion" id="id_evaluacion" value="{$evaluacion.id_evaluacion}">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar Evaluacion</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">La evaluacion se realizará a: {$profesor.nombre_profesor}</label>
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Materia a evaluar:</label>
                            <select class="form-control" id="materia_evaluar" name="materia_evaluar">
								{foreach item=materia from=$materias_impartidas}
								<option value="{$materia.id_materia}">{$materia.codigo_materia} {$materia.nombre_materia}</option>
								{/foreach}
							</select>
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Nombre evaluacion:</label>
                            <input type="text" class="form-control" id="nombre_evaluacion" name="nombre_evaluacion" value="{$evaluacion.nombre_evaluacion}">
                        </div>
						
                        <button type="submit" class="btn btn-success">Editar Evaluacion</input>
                    </div>
                </div>
            </form>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Informacion general:</div>
				<div class="panel-body">
					
					<div class="form-group">
						<label for="id_cuenta">Link: <a href="{$base_url}index.php/mostrarevaluacion/index/{$evaluacion.id_evaluacion}">{$base_url}index.php/mostrarevaluacion/index/{$evaluacion.id_evaluacion}</a></label>
					</div>
					
					<a href="/tpiencuesta/index.php/vaciarevaluacion/index/{$evaluacion.id_evaluacion}" class="btn btn-danger" role="button">Vaciar encuesta</a>
				</div>
			</div>
        </div>



        <!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{$base_url}js/jquery-3.2.1.min.js"></script>
		<script src="{$base_url}bootstrap/js/bootstrap.js"></script>
    </body>
</html>