<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar profesor</title>
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
            <br />
            <br />
            
            {if $resultado_operacion neq 'ninguna'}
            <div class="alert alert-success">
                <strong>{$resultado_operacion}</strong> {$mensaje_operacion}
            </div>
            {/if}
            
            <form action="/tpiencuesta/index.php/editarprofesor/procesar" method="POST">
                <input type="hidden" name="id_profesor" id="id_profesor" value="{$profesor.id_profesor}">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar profesor</div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label for="id_cuenta">Nombre profesor:</label>
                            <input type="text" class="form-control" id="nombre_profesor" name="nombre_profesor" value="{$profesor.nombre_profesor}">
                        </div>
						
						<div class="form-group">
                            <label for="id_cuenta">Carrera:</label>
                            <input type="text" class="form-control" id="carrera_profesor" name="carrera_profesor" value="{$profesor.carrera_profesor}">
                        </div>
						
                        <button type="submit" class="btn btn-success">Editar info basica</input>
                    </div>
                </div>
            </form>
			
			<form action="/tpiencuesta/index.php/editarprofesor/procesarmateria" method="POST">
                <input type="hidden" name="id_profesor" id="id_profesor" value="{$profesor.id_profesor}">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar materias impartidas</div>
                    <div class="panel-body">
					
						<div class="form-group">
                            <label for="id_cuenta">Materia:</label>
							<select class="form-control" id="materia_agregar" name="materia_agregar">
								{foreach item=materia from=$materias}
								<option value="{$materia.id_materia}">{$materia.codigo_materia} {$materia.nombre_materia}</option>
								{/foreach}
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
                                {foreach item=materia from=$materias_impartidas}
                                <tr>
                                    <th><center>{$materia.codigo_materia}</center></th>
                                    <th><center>{$materia.nombre_materia}</center></th>
                                    <th><center><a href="/tpiencuesta/index.php/eliminarmateriaprofesor/index/{$materia.id_detalle_materia_profesor}">Eliminar</a></center></th>
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
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