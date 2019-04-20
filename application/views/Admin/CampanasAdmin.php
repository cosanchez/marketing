<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Campañas</title>
    <script src="https://unpkg.com/sweetalert2@7.22.0/dist/sweetalert2.all.js"></script>
   <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top ">
      <label class="navbar-brand mr-1">Bienvenido <?php echo $_SESSION['usuario']; ?></label>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>

          <!--regresar una paguina atras-->
         <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle"  href="index.php/welcome/Back" id="messagesDropdown" role="button"  aria-expanded="false">
            <i class="fa fa-chevron-circle-left" ></i>
          </a>
        </li>

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
          </div>
        </li>
      </ul>

    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php/welcome/Back">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
       <li class="nav-item ">
          <a class="nav-link" href="index.php/welcome/GetCamapanas" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Campañas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php/welcome/GetUsuarios">
            <i class="fa fa-users"></i>
            <span>Usuarios</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php/welcome/AdminEmpresas">
            <i class="fas fa-fw fa-table"></i>
            <span>Empresas</span></a>
        </li>
      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">
          <div class="breadcrumb">
              <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> AGREGAR CAMPAÑA</button>
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              <label >Campañas </label>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped"  id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Campaña</th>
                      <th>Objetivo</th>
                      <th>Empresa</th>
                      <th>Responsable</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>CM Asignado</th>
                      <th>Estado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Campaña</th>
                      <th>Objetivo</th>
                      <th>Empresa</th>
                      <th>Responsable</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>CM Asignado</th>
                      <th>Estado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody id="cam">
                     <?php
foreach ($campañas as $cpanas) {
    ?>
                      <tr>
                        <td ><?php echo $cpanas['NombreCampana']; ?> </td>
                        <td ><?php echo $cpanas['Objetivo']; ?> </td>
                        <td ><?php echo $cpanas['NombreE']; ?> </td>
                        <td ><?php echo $cpanas['Representante']; ?> </td>
                        <td ><?php echo $cpanas['FechaInicio']; ?> </td>
                        <td ><?php echo $cpanas['FechaTermino']; ?> </td>
                        <td ><?php echo $cpanas['NombreU']; ?> </td>
                        <td ><?php echo $cpanas['des']; ?> </td>
                        <!-- <td ><a  data-toggle="modal" data-target="#myModal"
                          data-idcamp ="<?php echo $cpanas['IdCampana']; ?>"
                          data-idnomcamp="<?php echo $cpanas['NombreCampana']; ?>"
                          data-idobj="<?php echo $cpanas['Objetivo']; ?>"
                          data-idempresa="<?php echo $cpanas['NombreE']; ?>"
                          data-idresponsable="<?php echo $cpanas['Representante']; ?>"
                          data-idfechaini="<?php echo $cpanas['FechaInicio']; ?>"
                          data-idfechafin="<?php echo $cpanas['FechaTermino']; ?>"
                          data-idselectcm="<?php echo $cpanas['NombreU']; ?>"><span class="fa fa-edit" aria-hidden="true" style="color: black" title='Editar Campaña'></span></a></td> -->
                          <td><a href="javascript:;" class=" item-edit-campa" data="<?php echo $cpanas['IdCampana']; ?>"><span class="fa fa-edit" aria-hidden="true" title="Editar Campaña"></span></a></td>
                        <?php echo "<td><a href='index.php/welcome/borra_campana/" . $cpanas['IdCampana'] . "'><span class='fa fa-trash' onclick='showEliminar()' title='Eliminar Campaña'   ></span></a></td>"; ?>
                      </tr>
                   <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
             </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


       <!-- Logout Modal-->
    <!-- Modal para el cierre de sesion-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Listo para Salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Estas Seguro de Salir, Selecciona"Logout".</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php/welcome/LogOut">Logout</a>
          </div>
        </div>
      </div>
    </div>

<!--Modal Agregar Campaña-->
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content" style="background-color: rgba(117, 172, 174, 1);">
   <div class="modal-header">
    <h4 class="modal-title">Agregar Campaña</h4>
    <button  type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
          <form method="post" id="add_campa">
            <div class="row">
                <div class="col form-group"> <!--nombre-->
                  <label for="campañanom">Nombre de Campaña</label>
                  <input class="form-control" onkeyup="return mayus('idnomcamp')" id="idnomcamp" type="text" name="campañanomADD" required="true"  value="">
                </div>
                <div class="col form-group"><!--Usuario-->
                  <label for="obj">Objetivo</label>
                  <input class="form-control" onkeyup="return mayus('idobj')" id="idobj" type="text" name="objADD" required="true" value="">
                </div>
              </div>
              <div class="row">
               <div class="col form-group"><!--Rol-->
                  <label for="empresa">Empresa</label>
                  <select class="form-control" id="idempresa" name="empresaADD">
                    <option value="0"> Seleccionar </option>
                    <?php
foreach ($empresa as $key => $values) {?>
                      <option  id="idcm" value="<?php echo $values['IdEmpresa']; ?>"><?php echo $values['Nombre']; ?></option>
                    }
                   <?php }?>
                  </select>
                </div>
                <div class="col form-group"><!--Contraseña-->
                  <label for="responsable">Responsable</label>
                  <input class="form-control" onkeyup="return mayus('idresponsable')" id="idresponsable" type="text" name="responsableADD" required="true" value="">
                </div>
              </div>
              <div class="row">
                <div class="col form-group"><!--Rol-->
                  <label for="namRoles">Fecha Inicio</label>
                  <input class="form-control" type="date" name="f_iniADD"  min="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col form-group"><!--Rol-->
                  <label for="namRoles">Fecha Fin</label>
                  <input class="form-control" type="date" name="f_finADD" min="<?php echo date('Y-m-d') ?>">
                </div>
              </div>
              <div class="row">
                <div class="col form-group"><!--Rol-->
                  <label for="cm">CM Asignado</label>
                 <!-- <input type="text" id="cmnombre" name="cmnombre" hidden="true" value=" ">-->
                  <select class="form-control" id="selectCM" name="selectCMADD">
                    <option value="0"> Seleccionar </option>
                    <?php
foreach ($cm as $key => $values) {?>
                      <option  id="idcm" value="<?php echo $values['IdUsuario']; ?>"><?php echo $values['Nombre']; ?></option>
                    }
                   <?php }?>
                  </select>
              </div>
              <div class="col form-group"><!--Rol-->
                  <label for="namRoles">Estado</label>
                   <select class="form-control" name="estadoADD">
                    <option value="0"> Seleccionar </option>
                    <?php
foreach ($estado as $key => $values) {?>
                      <option  id="idcm" value="<?php echo $values['IdEstado']; ?>"><?php echo $values['Descripcion']; ?></option>
                    }
                   <?php }?>
                  </select>
              </div>
            </div>
            <button type="submit"  onclick="showM()" class="btn btn-success">Agregar</button>
          </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>

 <!--Modal Editar Campaña-->
<div  class="modal" id="myModalEdit" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="background-color: rgba(117, 172, 174, 1);">
      <div class="modal-header" >
        <h4>Editar Campaña</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
          <form method="post"  action="index.php/welcome/edit_Campana">
               <div class="row">
                  <input  class="form-control" id="idcamp" name="idcampa" type="text" hidden="true"></input>
                  <div class="col form-group"> <!--nombre-->
                    <label for="campañanom">Nombre de Campaña</label>
                    <input class="form-control" onkeyup="return mayus('idnomcamp')" id="idnomcamp" type="text" name="campañanom" required="true"  value="<?php echo set_value('campañanom'); ?>">
                  </div>
                  <div class="col form-group"><!--Usuario-->
                    <label for="obj">Objetivo</label>
                    <input class="form-control" onkeyup="return mayus('idobj')" id="idobj" type="text" name="obj" required="true" value="<?php echo set_value('obj'); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group"><!--Rol-->
                    <label for="empresa">Empresa</label>
                    <select class="form-control" id="idempresa" name="idempresa">
                      <option value="0"> Seleccionar </option>
                      <?php
foreach ($empresa as $key => $values) {?>
                        <option value="<?php echo $values['IdEmpresa']; ?>"><?php echo $values['Nombre']; ?></option>
                     <?php }?>
                    </select>
                  </div>
                  <div class="col form-group"><!--Contraseña-->
                    <label for="responsable">Responsable</label>
                    <input class="form-control" onkeyup="return mayus('idresponsable')" id="idresponsable" type="text" name="responsable" required="true" value="<?php echo set_value('responsable'); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group"><!--Rol-->
                    <label for="namRoles">Fecha Inicio</label>
                    <input class="form-control" type="date" name="f_ini" id="idfechaini">
                  </div>
                  <div class="col form-group"><!--Rol-->
                    <label for="namRoles">Fecha Fin</label>
                    <input class="form-control" type="date" name="f_fin" id="idfechafin">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group"><!--Rol-->
                    <label for="cm">CM Asignado</label>
                    <select class="form-control" id="idselectcm" name="cm">
                      <option value="0"> Seleccionar </option>
                      <?php
foreach ($cm as $key => $values) {?>
                        <option   value="<?php echo $values['IdUsuario']; ?>"><?php echo $values['Nombre']; ?></option>
                      }
                     <?php }?>
                    </select>
                  </div>
                  <div class="col form-group"><!--Rol-->
                    <label for="namRoles">Estado</label>
                    <select class="form-control" name="estado">
                      <option value="0"> Seleccionar </option>
                      <?php
foreach ($estado as $key => $values) {?>
                        <option   value="<?php echo $values['IdEstado']; ?>"><?php echo $values['Descripcion']; ?></option>
                      }
                     <?php }?>
                  </select>
              </div>
                </div>
                <input type="submit" class="btn btn-success" onclick="showE()" value="Actualizar">
            </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="js/Chart.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>



 <!--script para  insertar empresa con el modal-->
<script>
  $(document).ready(function(){
    $(this).removeData('add_data_Modal');
   $('#add_campa').on("submit", function(event){
    event.preventDefault();
    if($('#nomempresa').val() == "")
    {
     alert("Nombre  requerido");
    }
    else if($('#representante').val() == "")
    {
     alert("Representante requerido");
    }
    else if($('#emptel').val() == "")
    {
     alert("Telefono Requerido");
    }
     else if($('#empcorreo').val() == "")
    {
     alert("Correo Requerida");
    }
    else
    {
     $.ajax({
      url:"index.php/welcome/add_campana",
      method:"POST",
      data:$('#add_campa').serialize(),
      beforeSend:function(){
       $('#insert').val("Agregar");
      },
      success:function(data){
      $('#add_campa')[0].reset();
      $('#add_data_Modal').modal('hide');
      location.reload();
      $(this).removeData('add_data_Modal');
      }
     });
    }
   });
  });
  //modal Editar
      $('#cam').on('click', '.item-edit-campa', function(){
          var idc = $(this).attr('data');
          $('#myModalEdit').modal('show');
          $('#myModalEdit').find('.modal-title').text('Editar Campaña ');
          //$('#myModalEdit').find('.modal-header').css('background-color', '#FE2E2E');
        $.ajax({
              type: 'ajax',
              method: 'get',
              url: 'index.php/welcome/MostrarCampana',
              data: {idc:idc},
              async: false,
              dataType: 'json',
              success: function(data){
                  $('input[name=campañanom]').val(data.NombreCampana);
                  $('input[name=obj]').val(data.Objetivo);
                  $('select[name=idempresa]').val(data.empresa);
                  $('input[name=responsable]').val(data.Representante);
                  $('input[name=f_ini]').val(data.FechaInicio);
                  $('input[name=idcampa]').val(data.IdC);
                  $('input[name=f_fin]').val(data.FechaTermino);
                  $('select[name=cm]').val(data.cm);
                  $('select[name=estado]').val(data.Estado);
         },
              error: function(){
                  alert('No se puede editar, el dato');
              }
          });
      });

</script>
 <!-- <td ><a  data-toggle="modal" data-target="#myModal"
                          data-idcamp ="<?php echo $cpanas['IdCampana']; ?>"
                          data-idnomcamp="<?php echo $cpanas['NombreCampana']; ?>"
                          data-idobj="<?php echo $cpanas['Objetivo']; ?>"
                          data-idempresa="<?php echo $cpanas['NombreE']; ?>"
                          data-idresponsable="<?php echo $cpanas['Representante']; ?>"
                          data-idfechaini="<?php echo $cpanas['FechaInicio']; ?>"
                          data-idfechafin="<?php echo $cpanas['FechaTermino']; ?>"
                          data-idselectcm="<?php echo $cpanas['NombreU']; ?>"><span class="fa fa-edit" aria-hidden="true" style="color: black" title='Editar Campaña'></span></a></td> -->
 <script type="text/javascript">
 </script>
 <script type="text/javascript">
 function mayus(element){
    var x =document.getElementById(element);
    x.value = x.value.toUpperCase();
   }

   function numeros(evt){
    var tecla = (evt.which) ? evt.which : event.keyCode
    if(tecla > 31 && (tecla < 48 || tecla > 57 )){
      return false;
    return true;
    }
   }

function showM(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Campaña Registrada',
  showConfirmButton: false,
  timer: 1500
})
   }
    function showD(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Dependiente Guardado',
  showConfirmButton: false,
  timer: 1500
})
   }
        function showE(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Actualizacion Exitosa',
  showConfirmButton: false,
  timer: 1500
})
   }
        function showEliminar(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Representante Eliminado',
  showConfirmButton: false,
  timer: 1500
})
   }
 </script>
  </body>
</html>
<!--
<script> era para editar pero no llenava los select
   $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient0 = button.data('idnomcamp')
      var recipient1 = button.data('idobj')
      var recipient2 = button.data('idempresa')
      alert(recipient2);
      var recipient3 = button.data('idresponsable')
      var recipient4 = button.data('idfechaini')
      var recipient5 = button.data('idfechafin')
      var recipient6 = button.data('idselectcm')
      var recipient7 = button.data('idcamp')
       // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-body #idnomcamp').val(recipient0)
      modal.find('.modal-body #idobj').val(recipient1)
      modal.find('.modal-body #idempresa').val(recipient2)
      modal.find('.modal-body #idresponsable').val(recipient3)
      modal.find('.modal-body #idfechaini').val(recipient4)
      modal.find('.modal-body #idfechafin').val(recipient5)
      modal.find('.modal-body #idselectcm').val(recipient6)
      modal.find('.modal-body #idcamp').val(recipient7)
    });
 </script> -->