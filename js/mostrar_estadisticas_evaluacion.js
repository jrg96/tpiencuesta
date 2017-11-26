$(document).ready(function() {
	var i = 0;
	var nombre_completo = '#grafico_' + i;
	
	while($(nombre_completo).length){
		//desempaquetamos informacion
		var etiquetas = $('#etiquetas_' + i).val().split(',');
		var cuentas = $('#cuentas_' + i).val().split(',');
		
		crear_grafico('grafico_' + i, etiquetas, cuentas);
		i++;
		nombre_completo = '#grafico_' + i;
	}
});

function random_rgba() 
{
    return 'rgba(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + 0.5 + ')';
}

function crear_grafico(id_grafico, etiquetas, cuentas)
{
	var ctx = document.getElementById(id_grafico).getContext('2d');
	var colores = [];
	
	for (var i=0; i<etiquetas.length; i++)
	{
		colores.push(random_rgba());
	}
	
	console.log(colores);
	
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: etiquetas,
			datasets: [{
				label: 'Valoracion',
				data: cuentas,
				backgroundColor: colores,
				borderColor: colores,
				borderWidth: 1
			}]
		},
		options: {
			maintainAspectRatio: false,
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
}