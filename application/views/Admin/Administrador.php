<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<base href="<?php echo base_url();?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
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
            <!--<a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>-->
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">
      <!-- Sidebar  areglar las identacion de wrapper fijo-->
      <ul class="sidebar navbar-nav ">
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

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards
  Cuadro de colores aun no c que hacer con ellos
          -->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">26 New Messages!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
<?php include("db.php");
$prod_por_caducar = $pdo_conn->prepare("SELECT  c.NombreCampana,c.Objetivo,c.FechaInicio,us.Nombre from 
  `campanas` c INNER JOIN `usuarios` us on CommunityManager=us.IdUsuario where DATEDIFF(`FechaInicio`, curdate())=2");

  $prod_por_caducar->execute();
  $proximasaPublicar = $prod_por_caducar->fetchAll();
?>
 <?php
 $cont=0;
  foreach ($proximasaPublicar as $key => $value) {
    $cont=$cont+1;
  }
  if($cont>=2){
    echo  ' <div clas="mr-5"> No hay campañas </div>';
  }else{
     echo  ' <div clas="mr-5">'.'Campañas Proximas a Publicar '. $cont .'</div>';
  }
?>
                  <div class="mr-5"></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#myModal">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <?php
if($cont>2){
    echo  ' <div clas="mr-5"> No hay campañas </div>';
  }else{
     echo  ' <div clas="mr-5">'.'Campañas Proximas a Publicar '. $cont .'</div>';
  }
                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <!--Consultas-->
                  <?php include("db.php");
                    $campanas_revicion = $pdo_conn->prepare("SELECT  c.NombreCampana,c.Objetivo,c.FechaInicio,us.Nombre from 
                    `campanas` c INNER JOIN `usuarios` us on CommunityManager=us.IdUsuario where Estado='REVISION'");

                    $campanas_revicion->execute();
                    $enRevision = $campanas_revicion->fetchAll();
                  ?>
                  <?php
                    $cont2=0;
                    foreach ($enRevision as $key => $value) {
                        $cont2=$cont2+1;
                      }
                    if($cont2!=0){
                        echo  ' <div clas="mr-5">'.'Campañas en REVISION '. $cont2 .'</div>';
                      }else{
                         echo  ' <div clas="mr-5"> No hay campañas para Revisar </div>';
                      }
                    ?>
                  <!--Consultas-->
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"  data-toggle="modal" data-target="#myModalRevision">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Area Chart Example</div>
              <dir></dir>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
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
          <!-- Modal Campañas Por Vencer -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header" style="background-color: #ffc107">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Campañas Proximas a Publicar</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Campaña</th>
                      <th>Objetivo</th>
                      <th>Fecha Inicio</th>
                      <th>CM Asignado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Campaña</th>
                      <th>Objetivo</th>
                      <th>Fecha Inicio</th>
                      <th>CM Asignado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php  
                    foreach ($proximasaPublicar as $cpanas) {
                      ?>
                      <tr>
                        <td ><?php echo $cpanas['NombreCampana'];?> </td>
                        <td ><?php echo $cpanas['Objetivo'];?> </td>
                        <td ><?php echo $cpanas['FechaInicio'];?> </td>
                        <td ><?php echo $cpanas['Nombre'];?> </td>
                        <td ><a class="fa fa-eye" aria-hidden="true" href="index.php/welcome/CMRevision"></a></td>
                        <td ><a class="fa fa-review" href=""></a></td>
                      </tr>
                   <?php } ?>
                  </tbody>
                </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

            <!-- Modal Campañas en Revision -->
  <div class="modal fade" id="myModalRevision" role="dialog" >
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header" style="background-color: #ffc107">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Campañas Proximas a Publicar</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Campaña</th>
                      <th>Objetivo</th>
                      <th>Fecha Inicio</th>
                      <th>CM Asignado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Campaña</th>
                      <th>Objetivo</th>
                      <th>Fecha Inicio</th>
                      <th>CM Asignado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php  
                    foreach ($enRevision as $cpanas) {
                      ?>
                      <tr>
                        <td ><?php echo $cpanas['NombreCampana'];?> </td>
                        <td ><?php echo $cpanas['Objetivo'];?> </td>
                        <td ><?php echo $cpanas['FechaInicio'];?> </td>
                        <td ><?php echo $cpanas['Nombre'];?> </td>
                        <td ><a class="fa fa-eye" aria-hidden="true" href="index.php/welcome/CMRevision"></a></td>
                        <td ><a class="fa fa-review" href=""></a></td>
                      </tr>
                   <?php } ?>
                  </tbody>
                </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

  </body>

</html>
