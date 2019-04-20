$(obtener_registros());

function obtener_registros(campa)
{
	$.ajax({
		url : 'index.php/welcome/buscampa',
		type : 'POST',
		dataType : 'html',
		data : { campa: campa },
		})

	.done(function(resultado){
		$("#resul").html(resultado);
	})
}

$(document).on('keyup', '#buscar', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});