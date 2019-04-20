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
    <title>Usuarios</title>
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
          <!-- Breadcrumbs
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="">Agregar Usuario</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>-->
          <div class="breadcrumb">
          <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_usuario_Modal" class="btn btn-primary"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> AGREGAR USUARIO</button>
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Usuarios Registrados</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" style="text-align: center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NOMBRE</th>
                      <th>ROL ASIGNADO</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NOMBRE</th>
                      <th>ROL ASIGNADO</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody id="usuarios">
                  <?php //print_r($tabla_contactos);
foreach ($usuarios as $users) {
    ?>
                      <tr>
                        <td ><?php echo $users['Nombre']; ?> </td>
                        <td ><?php echo $users['RolNombre']; ?> </td>
                        <!--<td ><a data-toggle="modal" data-target="#myModal"
                          data-ideditauser="<?php echo $users['IdUsuario']; ?>"
                          data-idnomuser="<?php echo $users['Nombre']; ?>"
                          data-idusuario="<?php echo $users['Usuario']; ?>"
                          data-idpass="<?php echo $users['Contraseña']; ?>"
                          data-idrol="<?php echo $users['RolNombre']; ?>"
                          ><span class="fa fa-edit" aria-hidden="true" style="color: black" title='Editar Usuario'></span></a></td>-->
                             <td><a href="javascript:;" class="item-edit-user" data="<?php echo $users['IdUsuario']; ?>"><span class="fa fa-edit" aria-hidden="true" title="Editar Usuario"></span></a></td>
                           <?php echo "<td><a href='index.php/welcome/borra_usuario/" . $users['IdUsuario'] . "'><span class='fa fa-trash' onclick='showEliminar()' title='Eliminar Usuario' ></span></a></td>";
    ?>
                      </tr>
                   <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>                    -
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

                <!--Modal Agregar Usuario-->
<div id="add_usuario_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content" style="background-color: rgba(117, 172, 174, 1);">
   <div class="modal-header">
    <h4 class="modal-title">Agregar Usuario</h4>
    <button  type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
          <form method="post" id="add_usuario">
                <div class="col form-group"> <!--nombre-->
                  <input type="text" name="IdUsuario" hidden="true">
                  <label for="nom">Nombre</label>
                  <input class="form-control" onkeyup="return mayus('nr')" id="nr" type="text" name="nom"  value="<?php echo set_value('nom'); ?>">
                </div>
                <div class="col form-group"><!--Usuario-->
                  <label for="usuario">Usuario</label>
                  <input class="form-control" onkeyup="return mayus('usuario')" id="usuario" type="text" name="user" required="true" value="<?php echo set_value('usuario'); ?>">
                </div>
                 <div class="col form-group"><!--Contraseña-->
                  <label for="contrasena">Contraseña</label>
                  <input class="form-control" type="text" name="contrasena" >
                </div>
                <div class="col form-group"><!--Rol-->
                  <label for="namRoles">Rol</label>
                  <select class="form-control" id="namRoles" name="namRol">
                    <option value="0"> Seleccionar </option>
                    <?php
foreach ($roles as $key => $values) {?>
                      <option  id="nombreR" value="<?php echo $values['IdRol']; ?>"><?php echo $values['Nombre']; ?></option>
                    }
                   <?php }?>
                  </select>
                </div>
            <button type="submit" onclick="showM()" class="btn btn-success">Registrar</button>
          </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>

    <!--Modal Editar Usuario-->
<div id="myModalEditarU" class="modal fade" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content"  style="background-color: rgba(117, 172, 174, 1);">
   <div class="modal-header">
    <h4 class="modal-title">Editar Usuario</h4>
    <button  type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
          <form method="post"  action="index.php/welcome/edit_User">
            <input type="text" name="iduserE" hidden="true">
            <div class="row">
                <div class="col form-group"> <!--nombre-->
                  <label for="nomuser">Nombre</label>
                  <input class="form-control" onkeyup="return mayus('idnomuser')"       id="idnomuser" type="text" name="nomuserE" required="true"  value="">

                </div>
                <div class="col form-group"><!--Usuario-->
                  <label for="representante">Usuario</label>
                  <input class="form-control" onkeyup="return mayus('idusuario')" id="idusuario" type="text" name="userE" required="true" value="">
                </div>
              </div>
              <div class="row">
               <div class="col form-group"><!--Rol-->
                  <label for="pass">Contraseña</label>
                  <input class="form-control" onkeyup="return mayus('idpass')" id="idpass" type="password" name="passE" required="true" value="">
                  <input type="checkbox" onclick="myFunction()">Show Password
                </div>
                <div class="col form-group"><!--Contraseña-->
                  <label for="roluser">Rol</label>
                  <select class="form-control" id="idrol" name="roluserE">
                    <option   value=" ">Seleccionar </option>
                    <?php
foreach ($roles as $roless) {?>
                      <option   value="<?php echo $roless['IdRol']; ?>"><?php echo $roless['Nombre']; ?></option>
                    }
                   <?php }?>
                  </select>
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

<script type="text/javascript">
    $(document).ready(function(){
 $('#add_usuario').on("submit", function(event){
  event.preventDefault();
  if($('#nr').val() == "")
  {
   alert("Nombre  requerido");
  }
  else if($('#usuario').val() == "")
  {
   alert("Usuario requerido");
  }
  else if($('#contrasena').val() == "")
  {
   alert("Contraseña Requerida");
  }
   else if($('#namRoles').val() == "")
  {
   alert("Rol Requerida");
  }
  else
  {
   $.ajax({
    url:"index.php/welcome/add_Usuario",
    method:"POST",
    data:$('#add_usuario').serialize(),
    beforeSend:function(){
     $('#insert').val("Agregar");
    },

    success:function(data){
    $('#add_usuario')[0].reset();
    $('#add_usuario_Modal').modal('hide');
    location.reload();
    $(this).removeData('add_usuario_Modal');
    }
   });
  }
 });
});


//modal Editar
      $('#usuarios').on('click', '.item-edit-user', function(){
          var idu = $(this).attr('data');
          $('#myModalEditarU').modal('show');
         // $('#myModalEditarU').find('.modal-title').text('Editar Campaña ');
          //$('#myModalEdit').find('.modal-header').css('background-color', '#FE2E2E');
        $.ajax({
              type: 'ajax',
              method: 'get',
              url: 'index.php/welcome/MostrarUsuario',
              data: {idu:idu},
              async: false,
              dataType: 'json',
              success: function(data){
                  $('input[name=nomuserE]').val(data.NombreU);
                  $('input[name=userE]').val(data.Usuario);
                  $('input[name=passE]').val(data.Contraseña);
                  $('input[name=iduserE]').val(data.IdUsuarioU);
                  $('select[name=roluserE]').val(data.IdRol);
         },
              error: function(){
                  alert('No se puede editar, el dato');
              }
          });
      });
 </script>

<!--  <script>
   $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient0 = button.data('idnomuser')
      var recipient1 = button.data('idusuario')
      var recipient2 = button.data('idpass')
      var recipient3 = button.data('idrol')
      var recipient4 = button.data('ideditauser')

       // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

      var modal = $(this)
      modal.find('.modal-body #idnomuser').val(recipient0)
      modal.find('.modal-body #idusuario').val(recipient1)
      modal.find('.modal-body #idpass').val(recipient2)
      modal.find('.modal-body #idrol').val(recipient3)
      modal.find('.modal-body #ideditauser').val(recipient4)
    });
 </script> -->
  </body>
</html>
<script type="text/javascript">
    function mayus(element){
    var x =document.getElementById(element);
    x.value = x.value.toUpperCase();
   }

   function myFunction() {
    var x = document.getElementById("idpass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
   function showM(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Usuario Registrado',
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
   function showEliminar2(){
   swal({
  title: "Estas Seguro?",
  text: "Una vez borrado, No podreas recuperar este usuario!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Borrado!", {
      icon: "success",
    });
  } else {
    swal("el Usuario se a salvado!");
  }
})
}
</script>
