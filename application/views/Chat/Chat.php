<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CM</title>
    <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/chat.css" rel="stylesheet" type="text/css">
  </head>
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <label class="navbar-brand  bg-dark mr-1">Bienvenido <?php echo $_SESSION['usuario']; ?></label>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search  busqueda-->
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
        <!-- Campana de notificaciones con 3 opciones desplegables -->
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

        <!-- Mensajes con 3 opciones desplegables -->
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

        <!-- Boton para salir-->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>
    <div id="wrapper">
      <!-- Sidebar  areglar las identacion de wrapper fijo-->
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
          <a class="nav-link" href="index.php/welcome/CMRevision">
            <i class="fas fa-fw fa-table"></i>
            <span>Revision Contenidos y Diseños</span></a>
        </li>
        <li  class="nav-item">
          <a class="nav-link" href="index.php/welcome/Chat" >
            <i  class="fas fa-fw fa-table"></i>
            <span>Chat</span></a>
        </li>
      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">
          <select id="chatcampanas">
            <option>Seleccionar</option>
            <?php
foreach ($companascm as $key => $value) {?>
              <option value="<?php echo $value['IdCampana']; ?>"><?php echo $value['NombreCampana']; ?></option>
            <?php }?>
          </select>
          <ul id="usuarioslocos">

          </ul>
          <div id="wrapperChat">
            <div id="menuChat">
                  <p class="welcome">Beinvenido, <b><?php echo $_SESSION['usuario']; ?></b></p>
                  <div style="clear:both"></div>
            </div>
             <div id="chatbox"></div>
             <form name="message" action="">
                    <input name="usermsg" type="text" id="usermsg" size="63" />
                    <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
             </form>
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
        $("#submitmsg").click(function(){
    var clientmsg = $("#usermsg").val();
    $.post("index.php/welcome/saveChat", {submitmsg: clientmsg});
    $("#usermsg").val('');
    return false;

    $("#chatcampanas").on("change",function(){
      $.get("index.php/welcome/getUserByCampana", {submitmsg: clientmsg},function(usuarios){
        $.each(usuarios,function(index,value){
          $("#usuarioslocos").append('<li>'+value['IdGC']+'</li>')
        })
      });
    })
  });
      });


    </script>
  </body>

</html>
