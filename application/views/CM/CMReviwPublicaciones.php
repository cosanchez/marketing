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
    <title>Revision de Contenidos</title>
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
          <a class="nav-link dropdown-toggle"  href="javascript:history.back()" id="messagesDropdown" role="button"  aria-expanded="false">
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
        <li  class="nav-item">
          <a class="nav-link" href="#" >
            <i  class="fas fa-fw fa-table"></i>
            <span>Chat</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a>Diseños</a>
            </li>
            <li class="breadcrumb-item active">Contenidos</li>
          </ol>
          <div class="container-fluid" style="border: solid black 3px; height: 400px; with:200px;" >
            <form action="index.php/welcome/publicarFacebook" method="post">
            <div class="row" style="padding-bottom: 20px; overflow: hidden;">
                 <div class="col-1">
            </div>
            <div class="col-4 ">
              <label for="">Campaña</label>
              <select class="form-control" id="campa" name="campa" onchange="emR()">
                <option value="">seleccionar</option>
                    <?php foreach ($campanas as $camp) {?>
                      <option value="<?php echo $camp['IdCampana'] ?>"><?php echo $camp['NombreCampana'] ?></option>
                        <?php }?>
              </select>
            </div>
            <div class="col-1">
            </div>
            <div class="col-4 ">
              <label for="">Nodo</label>
              <select class="form-control" id="nodo" name="nodo" onchange="traerDC()">
                <option value="">seleccionar</option>
              </select>
            </div>
            </div>
          <div class="row" >
            <div class="col-1">
            </div>
            <div class="col-4" >
              <label>Contenido</label>
              <textarea rows="5" cols="50" id="contenido" name="contenido" placeholder="Contenido"></textarea>
            </div>
             <div class="col-1">
            </div>
            <label>Diseño</label>
              <div class="col-4" style="overflow: hidden;">
                <div style="overflow: hidden;">
                  <style type="text/css">
                    img{
                      width: 180px;
                      height: 180px;
                    }
                  </style>
                     <img style="width: 100%;" src=" " id="img" name="imagen">
                     <input type="hidden" name="imagenfack" value=" " id="imagenf" >
                </div>

            </div>
          </div>
          <div class="row">
            <div class="col-2"></div>
                <div class="col-3">
                 <button class="btn btn-success" name="publicar" type="submit">Publicar Ahora</button>
               </div>
                <div class="col-3">
                 <button class="btn btn-primary" name="Programada" type="submit">Programada</button>
               </div>
              <div class="col-3">
                 <button class="btn btn-danger" name="Rechazar" type="submit">Rechazar</button>
               </div>
               <div class="col-1"></div>
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
function emR(){
   var campana = document.getElementById("campa").value;
$.get('index.php/welcome/campajson2Revision/'+campana)
  .done(
        function(res) {
          var texto = "";
          texto += " <option value='' disabled='' selected=''>Seleccione el Nodo</option>";
          for (var i = res.length - 1; i >= 0; i--) {
            var obj = res[i];
            texto +="<option value='"+obj['IdRed']+"'>"+obj['Nodo']+"</option>";
          }
          $("#nodo").html(texto);

        }

      )
   }

   function traerDC(){
var campana = document.getElementById("campa").value;
var nodo = document.getElementById("nodo").value;
         var contenido='';
         var imagen='';
          var diseno='';
              var parametros = {
                "valor1" : campana,
                "valor2" : nodo,
            };
    $.get({
            data: parametros, //datos que se envian a traves de ajax
            url:   'index.php/welcome/GetDC', //archivo que recibe la peticion
            type:  'post', //método de envio
    })
//$.get('index.php/welcome/campajson2/'+campana)
  .done(
        function(res) {
          // var texto = "";
          // texto += " <option value='' disabled='' selected=''>Seleccione el Nodo</option>";
          // for (var i = res.length - 1; i >= 0; i--) {
          //   var obj = res[i];
          //   texto +="<option value='"+obj['IdRed']+"'>"+obj['Nodo']+"</option>";
          // }
         //alert(JSON.parse(res).Diseno);
          //document.getElementById("img").src="localhost:8080/marketing/Disenos/"+JSON.parse(res).Diseno;
          $("#img").attr("src","Disenos/"+JSON.parse(res).Diseno);
          $("#contenido").html(JSON.parse(res).Contenido);
          $('input[name=imagenfack]').val(JSON.parse(res).Diseno);
        }

      )
   }
    </script>
  </body>

</html>
