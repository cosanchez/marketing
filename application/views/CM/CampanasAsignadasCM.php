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
    <title>Campañas Asignadas</title>
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
                      <th>Objetivo</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Campaña</th>
                      <th>Objetivo</th>
                      <th>Empresa</th>
                      <th>Objetivo</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>Estado</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php
foreach ($campañas as $cpanas) {
    ?>
                      <tr>
                        <td ><?php echo $cpanas['NombreCampana']; ?> </td>
                        <td ><?php echo $cpanas['Objetivo']; ?> </td>
                        <td ><?php echo $cpanas['nomE']; ?> </td>
                        <td ><?php echo $cpanas['Representante']; ?> </td>
                        <td ><?php echo $cpanas['FechaInicio']; ?> </td>
                        <td ><?php echo $cpanas['FechaTermino']; ?> </td>
                        <td ><?php echo $cpanas['Descripcion']; ?> </td>
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
                  <select class="form-control" id="idempresa" name="empresa">
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
                  <input class="form-control" onkeyup="return mayus('idresponsable')" id="idresponsable" type="text" name="responsable" required="true" value="<?php echo set_value('responsable'); ?>">
                </div>
              </div>
              <div class="row">
                <div class="col form-group"><!--Rol-->
                  <label for="namRoles">Fecha Inicio</label>
                  <input class="form-control" type="date" name="f_ini" >
                </div>
                <div class="col form-group"><!--Rol-->
                  <label for="namRoles">Fecha Fin</label>
                  <input class="form-control" type="date" name="f_fin" >
                </div>
              </div>
              <div class="row">
                <div class="col form-group"><!--Rol-->
                  <label for="cm">CM Asignado</label>
                 <!-- <input type="text" id="cmnombre" name="cmnombre" hidden="true" value=" ">-->
                  <select class="form-control" id="selectCM" name="selectCM">
                    <option value="0"> Seleccionar </option>
                    <?php
foreach ($cm as $key => $values) {?>
                      <option  id="idcm" value="<?php echo $values['IdUsuario']; ?>"><?php echo $values['Nombre']; ?></option>
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
<div  class="modal" id="myModal" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="background-color: rgba(117, 172, 174, 1);">
      <div class="modal-header" >
        <h4>Editar Campaña</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
          <form method="post"  action="index.php/welcome/edit_Campana">
               <div class="row">
                  <input hidden="true" class="form-control" id="idcamp" name="idcampa" type="text"></input>
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
                        <option  id="idcm" value="<?php echo $values['IdEmpresa']; ?>"><?php echo $values['Nombre']; ?></option>
                      }
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
                    <select class="form-control" id="idselectcm" name="idselectcm">
                      <option value="0"> Seleccionar </option>
                      <?php
foreach ($cm as $key => $values) {?>
                        <option  id="idcm" value="<?php echo $values['IdUsuario']; ?>"><?php echo $values['Nombre']; ?></option>
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
  </body>
</html>
