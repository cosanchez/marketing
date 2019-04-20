$(document).ready(function(){
    var tabla = $('#cam').DataTable({
        "columnDefs":[{
            "targets":[0],
            "visible":false
        }],
        "ajax":{
            url:"http://localhost:8080/marketing/welcome/GetCamapanas"
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
/*    $("#categorias tbody").on('click','[id=btn-edit]',function(){
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
        })*/
/*                             <?php  
                    foreach ($campañas as $cpanas) {
                      ?>
                      <tr>
                        <td ><?php echo $cpanas['NombreCampana'];?> </td>
                        <td ><?php echo $cpanas['Objetivo'];?> </td>
                        <td ><?php echo $cpanas['NombreE'];?> </td>
                        <td ><?php echo $cpanas['Representante'];?> </td>
                        <td ><?php echo $cpanas['FechaInicio'];?> </td>
                        <td ><?php echo $cpanas['FechaTermino'];?> </td>
                        <td ><?php echo $cpanas['NombreU'];?> </td>
                        <td ><?php echo $cpanas['Estado'];?> </td>
                        <td ><a onclick="showcm(<?php echo $cpanas['cm']?>)" data-toggle="modal" data-target="#myModal" 
                          data-idcamp ="<?php echo $cpanas['IdCampana']; ?>" 
                          data-idnomcamp="<?php echo $cpanas['NombreCampana']; ?>" 
                          data-idobj="<?php echo $cpanas['Objetivo']; ?>" 
                          data-idempresa="<?php echo $cpanas['NombreE']; ?>" 
                          data-idresponsable="<?php echo $cpanas['Representante']; ?>"  
                          data-idfechaini="<?php echo $cpanas['FechaInicio']; ?>" 
                          data-idfechafin="<?php echo $cpanas['FechaTermino']; ?>" 
                          data-idselectcm="<?php echo $cpanas['NombreU']; ?>"><span class="fa fa-edit" aria-hidden="true" style="color: black" title='Editar Campaña'></span></a><button id="btn-edit">cm</button></td>
                        <?php echo "<td><a href='index.php/welcome/borra_campana/".$cpanas['IdCampana']."'><span class='fa fa-trash' onclick='showEliminar()' title='Eliminar Campaña' style='color: black'  ></span></a></td>";
            ?>
                      </tr>
                   <?php } ?>*/
