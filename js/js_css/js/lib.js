$(document).ready(function(){

    var tabla = $('#categorias').DataTable({
        "columnDefs":[{
            "targets":[0],
            "visible":false
        }],
        "ajax":{
            url:"http://localhost:8080/ventas/Dashboard/get_Categorias"
        },
        "columns":[
            {"data":"id_categoria"},
            {"data":"nombre"},
            {"data":"descripcion"},
            {"data":"status"},
            {
                "target":-1,
                "data":null,
                "defaultContent":"<button id='btn-edit' class='btn btn-primary btn-sm'>Editar</button>",
                "searchable":"false"
            }
        ],

    });
    $("#categorias tbody").on('click','[id=btn-edit]',function(){
        data=tabla.row($(this).parents('tr')).data();
        //alert(data.id_categoria);
        $("#idc").val(data.id_categoria);
        $("#nom").val(data.nombre);
        $("#descrip").val(data.descripcion);
        if(data.status=="Activa"){
            $("#act").prop('selected',true);
        }else{
            $("#inact").prop('selected',true);
        }
      
        $('#editar_cat').modal('show')
        })
});

function guardar(){
    var tabla = $('#categorias').DataTable();
    $.post("Dashboard/mod_categorias",$('#edita_cat').serialize(),function(respuesta){
        //alert(respuesta);
        tabla.ajax.reload();
    });
    $('#editar_cat').modal('hide');
}
