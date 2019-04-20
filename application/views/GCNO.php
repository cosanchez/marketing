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
    <title>GC</title>
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
      <label class="navbar-brand  bg-dark mr-1">Bienvenido Elvia</label>
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
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Gestión de Contenido</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="index.php/welcome/GetCamapanas" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Chat</span>
          </a>
        </li>
        
      </ul>
<!-- barra lateral
          -->
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Publicaciones Realizadas</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!--    -->
         

          <!-- DataTables Example           <div>
                    <button class="btn-primary" type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> AGREGAR CAMPAÑA</button>
          </div>  --> 

              </select>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Empresa</th>
                      <th>Campaña</th>
                      <th>Objetivo</th>                      
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>Usuario</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Empresa</th>
                      <th>Campaña</th>
                      <th>Objetivo</th>                      
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>Usuario</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Customer Support</td>
                      <td>Donna Snider</td>
                      <td>New York</td>
                      <td>27</td>
                      <td>2011/01/25</td>
                      <td>ana</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

      
<!-- /seleccionar empresa,campaña, nodo -->
<form action="" class="form-inline"> 
 <div class="form-group"> 
    <div class="container ">
      <h4>Seleccionar :</h4><div class="form-group">
          <div class="card mb-2" >
            <div class="card-header col-md-13">
           
             <!-- <select >empresa </select> -->
              <div class="form-row">
                <select class="col-6">
                 <option value="0"  > Empresa </option> 
                </select>
              </div><br>
          <!-- <select >Campañas </select> -->        
              <div class="form-row">
                 <select class="col-6">
                   <option value="0"  > Campaña</option> 
                 </select>
              </div><br>
          <!-- <select >Nodo </select> --> <!----> 
              <div class="form-row">
                 <select class="col-6">
                   <option value="0"  > Nodo</option> 
                 </select>
              </div>

             <div class="form-group">
    <label for="exampleFormControlTextarea1">contenido</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
 </div>
            </div> 

           </div> 
         




 <div class="form-group">
                  <button  type="button" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-info">Guardar</button>
                <button type="button" class="btn btn-warning">Revisión</button></div>
</div>  

  </form>
</div>
  </div>              

         
  
    <!--termina class container-fluid-->



<div class="container">
  <div class="row">
    <div class="col-sm-12">headaer</div>
  </div>
  <div class="row">
    <div class="col">iz</div>
    <div class="col">cont</div>
    <div class="col">de</div>
  
  </div>
  <div class="row">
    <div class="col">footer</div>
  </div> 
</div>







  
        

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

  </body>

</html>
