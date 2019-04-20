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
    <title>Asignacion de Usuarios</title>
    <script src="https://unpkg.com/sweetalert2@7.22.0/dist/sweetalert2.all.js"></script>
   <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/disenos.css">
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
           <ul class="sidebar navbar-nav ">
        <li class="nav-item active">
          <?php echo "<a class='nav-link' href='index.php/welcome/CM_Campanas/" . $_SESSION['IdUsuario'] . "'?>
            <i class='fas fa-fw fa-folder'></i>
            <span>Dashboard</span>
          </a>" ?>
        </li>
         <li class="nav-item ">
         <?php echo "<a class='nav-link' href='index.php/welcome/CampanasAsigCM/" . $_SESSION['IdUsuario'] . "'?>
            <i class='fas fa-fw fa-folder'></i>
            <span>Campañas Asignadas</span>
          </a>" ?>
        </li>
        <li class="nav-item">
        <?php echo "<a class='nav-link' href='index.php/welcome/AsignUserCM/" . $_SESSION['IdUsuario'] . "'?>
            <i class='fas fa-fw fa-folder'></i>
            <span>Asignacion de Usuarios</span>
          </a>" ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php/welcome/RedSemanticaCM">
            <i class="fas fa-fw fa-table"></i>
            <span>Red Semantica</span></a>
        </li>
        <li class="nav-item">
          <?php echo "<a class='nav-link' href='index.php/welcome/CMRevision/" . $_SESSION['IdUsuario'] . "'?>
            <i class='fas fa-fw fa-table'></i>
            <span>Revision Contenidos y Diseños</span>
          </a>" ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php/welcome/AdminEmpresas">
            <i class="fas fa-fw fa-table"></i>
            <span>Chat</span></a>
        </li>
      </ul>
      <div id="content-wrapper">
        <div class="container-fluid">
          <form  action="index.php/welcome/AddRoles" method="post">
          <h1 id="titulo">Asignacion de Roles</h1>
          <br>
          <div class="row">
            <div class="col-4" style="padding-bottom: 20px;">
                 <h3 class="subtitulos">Campañas</h3><br>
                      <select class="form-control" name="idcampa" id="idcampa" onchange="em()">
                          <option> Seleccionar </option>
                          <?php
foreach ($campanas as $camp) {?>
                        <option value="<?php echo $camp['IdCampana'] ?>"><?php echo $camp['NombreCampana'] ?></option>
                        <?php }?>
                        </select>

            </div>
            <div class="col-4">
                 <h3 class="subtitulos">Nodo</h3><br>
                 <select class="form-control" name="idnodo" id="idnodo"></select>
           </div>
           <div class="col-3">
           <h3 class="subtitulos">Fecha Entrega</h3><br>
           <?php
date_default_timezone_set("America/Mexico_City");
$fecha = date('Y-m-d');
?>
           <input class="form-control" type="date" name="fechaentrega"  min="<?php echo $fecha ?>">
           </div>
          </div>
          <div class="row">
            <div class="col-2"></div>
                  <div class="col-md-4" style="padding-top: 40px;">
                    <h3 class="subtitulos">Generadores de Contenido</h3><br>
                       <?php //print_r($tabla_contactos);
foreach ($usuarios as $user) {?>
                           <?php if ($user['Rol'] == 3) {?>
                          <input class="names" type="checkbox" name="check_gc[]" value="<?php echo $user['IdUsuario'] ?>"><label id="labe"><?php echo $user['Nombre'] ?> </label><br>
                          <?php }}?>
                  </div>
                  <div class="col-1"></div>
                  <div class="col-md-4" style="padding-top: 40px;">
                    <h3 class="subtitulos">Diseñadores</h3><br>
                       <?php //print_r($tabla_contactos);
foreach ($usuarios as $user) {?>
                          <?php if ($user['Rol'] == 4) {?>
                          <input type="checkbox" name="check_d[]" value="<?php echo $user['IdUsuario'] ?>"><label id="labe"><?php echo $user['Nombre'] ?></label> <br>
                          <?php }}?>
                  </div>

          </div>
          <div class="row">
            <div class="col-sm-12" style="padding-top: 30px;">
              <div class="text-center">
                <input class="btn btn-success" onclick="showE();" type="submit" name="submit" value="Agregar Usuarios"/>
              </div>
            </div>
          </div>
          </form>
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
   function em(){
   var campana = document.getElementById("idcampa").value;
$.get('index.php/welcome/campajson2/'+campana)
  .done(
        function(res) {
          var texto = "";
          texto += " <option value='' disabled='' selected=''>Seleccione el Nodo</option>";
          for (var i = res.length - 1; i >= 0; i--) {
            var obj = res[i];
            texto +="<option value='"+obj['IdRed']+"'>"+obj['Nodo']+"</option>";
          }
          $("#idnodo").html(texto);
        }

      )
   }

 function showE(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Asignacion Exitosa',
  showConfirmButton: false,
  timer: 1500
})
   }


    </script>
  </body>
</html>
