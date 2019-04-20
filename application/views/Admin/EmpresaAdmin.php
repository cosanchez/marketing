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
    <script src="https://unpkg.com/sweetalert2@7.22.0/dist/sweetalert2.all.js"></script>
    <title>Empresas</title>
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
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
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
          <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_empre_modal" class="btn btn-primary"><i class="fa fa-calendar-plus-o" aria-hidden="true" ></i> AGREGAR EMPRESA</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button disabled="true" type="button" name="age" id="age" data-toggle="modal" data-target="#add_empre_repre" class="btn btn-primary"><i class="fa fa-calendar-plus-o" aria-hidden="true" ></i> AGREGAR REPRESENTANTE</button>
          </div>
           <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Empresas</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" style="text-align: center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Responsable</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Responsable</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
foreach ($empresas as $empre) {
    ?>
                      <tr>
                        <td ><?php echo $empre['Nombre']; ?> </td>
                        <td ><?php echo $empre['Representante']; ?> </td>
                        <td ><?php echo $empre['Telefono']; ?> </td>
                        <td ><?php echo $empre['Correo']; ?> </td>
                        <td ><a data-toggle="modal" data-target="#myModal"
                          data-idempresaeditar="<?php echo $empre['IdEmpresa']; ?>"
                          data-idnomempresa="<?php echo $empre['Nombre']; ?>"
                          data-idrepre="<?php echo $empre['Representante']; ?>"
                          data-idemptel="<?php echo $empre['Telefono']; ?>"
                          data-idempcorreo="<?php echo $empre['Correo']; ?>"><span style="color: rgb(0,123,255);" class="fa fa-edit" aria-hidden="true" title="Editar Empresa"></span></a></td>
                        <?php echo "<td><a href='index.php/welcome/borra_empresa/" . $empre['IdEmpresa'] . "'><span class='fa fa-trash' onclick='showEliminar()' title='Eliminar Campaña'   ></span></a></td>";
    ?>
                      </tr>
                   <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
      <!-- /.content-wrapper -->

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

    <!--Modal Agregar Empresa-->
<div id="add_empre_modal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content" style="background-color: rgba(117, 172, 174, 1);">
   <div class="modal-header">
    <h4 class="modal-title">Agregar Empresa</h4>
    <button  type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
          <form method="post" id="add_empre">
            <div class="row">
                <div class="col form-group"> <!--nombre-->
                  <label for="nomempresa">Nombre de la Empresa</label>
                  <input class="form-control" onkeyup="return mayus('idnomempresa')"       id="idnomempresa" type="text" name="nomempresa" required="true"  value="<?php echo set_value('nomempresa'); ?>">
                </div>
                <div class="col form-group"><!--Usuario-->
                  <label for="representante">Representante</label>
                  <input class="form-control" onkeyup="return mayus('idrepre')" id="idrepre" type="text" name="representante" required="true" value="<?php echo set_value('representante'); ?>">
                </div>
              </div>
              <div class="row">
               <div class="col form-group"><!--Rol-->
                  <label for="emptel">Telefono</label>
                  <input class="form-control" onkeyup="return mayus('idemptel')" id="idemptel" type="text" name="emptel" required="true" value="<?php echo set_value('emptel'); ?>">
                </div>
                <div class="col form-group"><!--Contraseña-->
                  <label for="empcorreo">Correo</label>
                  <input class="form-control" id="idempcorreo" type="text" name="empcorreo" required="true" value="<?php echo set_value('empcorreo'); ?>">
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

    <!--Modal Editar Empresa-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content" style="background-color: rgba(117, 172, 174, 1);">
   <div class="modal-header">
    <h4 class="modal-title">Editar Empresa</h4>
    <button  type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
          <form method="post"  action="index.php/welcome/edit_Empresa">
            <div class="row">
              <input hidden="true" class="form-control" id="idempresaeditar" name="idempresa" type="text" ></input>
                <div class="col form-group"> <!--nombre-->
                  <label for="nomempresa">Nombre de la Empresa</label>
                  <input class="form-control" onkeyup="return mayus('idnomempresa')"       id="idnomempresa" type="text" name="nomempresa" required="true"  value="<?php echo set_value('nomempresa'); ?>">
                </div>
                <div class="col form-group"><!--Usuario-->
                  <label for="representante">Representante</label>
                  <input class="form-control" onkeyup="return mayus('idrepre')" id="idrepre" type="text" name="representante" required="true" value="<?php echo set_value('representante'); ?>">
                </div>
              </div>
              <div class="row">
               <div class="col form-group"><!--Rol-->
                  <label for="emptel">Telefono</label>
                  <input class="form-control" onkeyup="return mayus('idemptel')" id="idemptel" type="text" name="emptel" required="true" value="<?php echo set_value('emptel'); ?>">
                </div>
                <div class="col form-group"><!--Contraseña-->
                  <label for="empcorreo">Correo</label>
                  <input class="form-control" id="idempcorreo" type="text" name="empcorreo" required="true" value="<?php echo set_value('empcorreo'); ?>">
                </div>
              </div>
            <button type="submit"  onclick="showE()" class="btn btn-success">Actualizar</button>
          </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>

    <!--Modal Agregar Representante-->
<div id="add_empre_repre" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content" style="background-color: rgba(117, 172, 174, 1);">
   <div class="modal-header">
    <h4 class="modal-title">Agregar Representante</h4>
    <button  type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
          <form method="post" id="add_empre" action="index.php/welcome/addRepre">
            <div class="row">
                <div class="col form-group"><!--Usuario-->
                  <label for="representante">Representante</label>
                  <input class="form-control"  onkeyup="return mayus('idrepre')" id="idrepre" type="text" name="representante" required="true" value="<?php echo set_value('representante'); ?>">
                </div>
                            <div class="col form-group"><!--Rol-->
                  <label for="emptel">Telefono</label>
                  <input class="form-control" onkeyup="return numeros('idemptel')" id="idemptelR" type="text" name="emptelR" required="true" value="<?php echo set_value('emptel'); ?>">
                </div>
              </div>
              <div class="row">
                 <div class="col form-group"><!--Contraseña-->
                  <label for="empcorreo">Correo</label>
                  <input class="form-control" id="idempcorreoR" type="text" name="empcorreoR" required="true" value="">
                </div>
                 <div class="col form-group"> <!--nombre-->
                  <label for="nomempresa">Empresas</label>
                <select class="form-control" name="idempresaR">
                  <option>Seleccionar</option>
                                   <?php
foreach ($empresas as $key => $values) {?>
                      <option  id="idcm" value="<?php echo $values['IdEmpresa']; ?>"><?php echo $values['Nombre']; ?></option>
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
 $('#add_empre').on("submit", function(event){
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
    url:"index.php/welcome/add_Empre",
    method:"POST",
    data:$('#add_empre').serialize(),
    beforeSend:function(){
     $('#insert').val("Agregar");
    },
    success:function(data){
    $('#add_empre')[0].reset();
    $('#add_empre_modal').modal('hide');
    location.reload();
    $(this).removeData('add_empre_modal');
    }
   });
  }
 });
});
 </script>

 <!--script para  Editar empresa con el modal-->
 <script>
   $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient0 = button.data('idnomempresa')
      var recipient1 = button.data('idrepre')
      var recipient2 = button.data('idemptel')
      var recipient3 = button.data('idempcorreo')
      var recipient4 = button.data('idempresaeditar')

       // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

      var modal = $(this)
      modal.find('.modal-body #idnomempresa').val(recipient0)
      modal.find('.modal-body #idrepre').val(recipient1)
      modal.find('.modal-body #idemptel').val(recipient2)
      modal.find('.modal-body #idempcorreo').val(recipient3)
      modal.find('.modal-body #idempresaeditar').val(recipient4)
    });
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
  title: 'Empresa Registrada',
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
 </script>
  </body>

</html>
