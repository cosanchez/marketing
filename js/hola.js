$( document ).ready(function(){
    var tabla = $('#campana').DataTable({
        "columnDefs":[{
            "targets":[0],
            "visible":false
        }],
        "ajax":{
            url:"http://localhost:8080/marketing/index.php/welcome/llenatabale"
        },
        "columns":[
            {"data":"NombreCampana"},
            {"data":"Objetivo"},
            {"data":"NombreE"},
            {"data":"Representante"},
            {"data":"FechaInicio"},
            {"data":"FechaTermino"},
            {"data":"NombreU"},
            {"data":"Estado"},
            {
                "target":-1,
                "data":null,
                "defaultContent":"<button id='btn-edit' class='btn btn-primary btn-sm'>Editar</button>",
                "searchable":"false"
            }
        ],

    });
});