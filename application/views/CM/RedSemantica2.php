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
    <script type="text/javascript" src="js/exampleUtil.js"></script>
    <script type="text/javascript" src="js/vis.js"></script>
    <link href="css/vis.css" rel="stylesheet" type="text/css">
    <link href="css/vis-network.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.min.js"></script>
    <script src="js/campa.js"></script>

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
          <h1 style="text-align: center; color: green; font-size: 24px;">Red Semantica</h1>
             </div>
          <div class="row" role="main">
              <div class="red" style=" float: left; width: 100%; text-align: center;">
                <form method="POST" action="index.php/welcome/redSemantica">
                  <div class="row" style="padding-left: 50px">
                  <h3>Campañas</h3>
                  <div class="col-4">
                    <select  class="form-control" name="c" id="c" tabindex="1"  class="btn btn-default" required>
                      <option value="" disabled="" selected="" >Seleccionar</option>
                            <?php
foreach ($campañas as $key => $value) {?>
                           <option   value="<?php echo $value['IdCampana']; ?>"><?php echo $value['NombreCampana']; ?></option>
                            <?php }?>
                               </select>
                               </div>
                <input class="btn btn-primary" type="submit" onclick="verRed()" name="verred" value="Ver Red">
                        </div>
             </form>
            </div>
          </div>

          <div class="row" style="margin-left: 80px; margin-top: 70px">
            <div class="col-4">
               <h3>Agregacion de Nodos</h3>
            </div>
            <div class="col-4">
              <label for="idempresa">Empresas</label>
              <select class="form-control" onchange="traeCampanas2()" id="idempresa" name="idempresa"> <option> Seleccionar </option>
                 <?php
foreach ($empresa as $key => $value) {?>
                             <option   value="<?php echo $value['idE']; ?>"><?php echo $value['nomE']; ?></option>
                              <?php }?>
              </select>
            </div>
          </div>
          <div class="row " style="margin-top: 70px">
              <div class="col-1"></div>
              <div class="col-2">
                <label for="nodo">Nombre del Nevo Nodo</label>
                <input class="form-control" type="text" name="nodo" id="nodo" placeholder="Nuevo Nodo">
              </div>
              <div class="col-2">
                <label for="campana">Campaña</label>
                <select  name="campana" id="campana" tabindex="1"  class="form-control" onchange="ca()" required>
                </select>
              </div>
              <div class="col-2">
                <label for="nodos">Nodo</label>
                <select  name="nodos" id="nodos" tabindex="1"  class="form-control" required >
                </select>
              </div>
              <div class="col-2">
                <br>
                <button class="btn btn-success" onclick="agregar()">Agregar</button>
              </div>
              <div class="col-2">
                <br>
                        <div class="elimnar" style=" width: 200px; text-align: right; float: right;" ><button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-danger"><i class="fa fa-cubes"></i> Eliminar Nodo</button> </div>
              </div>
          </div>
          <div class="row" style="margin-top: 20px">
            <div class="col-1"></div>
            <div class="col-10" >
                         <div class="red" id="red" style="border: solid black 3px; height: 400px; overflow: hidden;"></div>
            </div>
            <div class="col-1"></div>
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
    <script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/filtro.js"></script>

<script type="text/javascript">
  function ca(){
   var ca = document.getElementById("campana").value;
  $.get('index.php/welcome/nodosjson/'+ca)

  .done(
        function(res) {
          var texto = "";
          texto += " <option value='' disabled='' selected=''>Elija Nodo</option>";
          for (var i = res.length - 1; i >= 0; i--) {
            var obj = res[i];
            texto += "<option value='"+obj['IdRed']+"'>"+obj['Nodo']+"</option>";
          }
          $("#nodos").html(texto);
        }
      )
  }

function traeCampanas2(){
   var idempresa = document.getElementById("idempresa").value;
$.get('index.php/welcome/campanasjson/'+idempresa)
  .done(
        function(res) {
          var texto = "";
          texto += " <option value='' disabled='' selected=''>Seleccione el Nodo</option>";
          for (var i = res.length - 1; i >= 0; i--) {
            var obj = res[i];
            texto +="<option value='"+obj['IdCampana']+"'>"+obj['NombreCampana']+"</option>";
          }
          $("#campana").html(texto);
        }

      )
   }
</script>

<script type="text/javascript">
  function agregar(){
      var campana = document.getElementById("campana").value;
      var nodos = document.getElementById("nodos").value;
      var nodo = document.getElementById("nodo").value;
      $.ajax({
      type : 'POST',
      url  : 'index.php/welcome/agregarnodo/',
      data : {campana:campana,nodos:nodos,nodo:nodo},

    });

location.reload("");
  }

  function verRed2(){
    var campana = document.getElementById("campana").value;
    alert(campana);
    $.ajax({
      type : 'POST',
      url  : 'index.php/welcome/red2',
      data : {campana:campana},
    });
    location.reload("");
  }

</script>
<?php if (!empty($redsemantica)) {
    ?>
<script type="text/javascript">
    var resTotales;
    resTotales = 2;
    var len = undefined;
    var nodes = [
<?php echo '{id: ' . $principal2['IdCampana'] . ', color: "rgba(0, 44, 44, .5)", label:  "' . $principal2['NombreCampana'] . '"    },' . PHP_EOL; ?>

        <?php
foreach ($redsemantica as $columna) {
        echo '{id: ' . $columna['IdRed'] . ', label: "' . $columna['Nodo'] . '"},' . PHP_EOL;
    }
    ?>
    ];
    var edges = [
        <?php
foreach ($redsemantica as $columna) {
        echo '{from: ' . $columna['IdRed'] . ', to: ' . $columna['Padre'] . '},' . PHP_EOL;
    }
    ?>
         <?php
foreach ($principal as $columna) {
        if ($columna['Padre'] == 0) {
            echo '{from: ' . $columna['IdCampanaRed'] . ', to: ' . $columna['IdRed'] . '},' . PHP_EOL;
        }

    }
    ?>

    ];

    // create a network
    var container = document.getElementById('red');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {
        autoResize: true,
        height: '400px',
        width: '100%',

        clickToUse: true,
        nodes: {
           // shape: 'dot',
           shape: '',
             color:'#0FB2BF',

            size: 30,
            font: {
                size: 20

            },
            borderWidth: 2,
            shadow:true
        },
        edges: {
            width: 2,
            shadow:true
        }
    };
    network = new vis.Network(container, data, options);

</script>

<?php }?>

</script>
<?php if (!empty($redsemanticanodo)) {
    ?>
<script type="text/javascript">
    var resTotales;
    resTotales = 2;
    var len = undefined;
    var nodes = [
<?php echo '{id: ' . $principal2['IdCampana'] . ', color: "rgba(0, 44, 44, .5)", label:  "' . $principal2['NombreCampana'] . '"    },' . PHP_EOL; ?>

        <?php
foreach ($redsemantica as $columna) {
        echo '{id: ' . $columna['IdRed'] . ', label: "' . $columna['Nodo'] . '"},' . PHP_EOL;
    }
    ?>
    ];
    var edges = [
        <?php
foreach ($redsemantica as $columna) {
        echo '{from: ' . $columna['IdRed'] . ', to: ' . $columna['Padre'] . '},' . PHP_EOL;
    }
    ?>
         <?php
foreach ($principal as $columna) {
        if ($columna['Padre'] == 0) {
            echo '{from: ' . $columna['IdCampanaRed'] . ', to: ' . $columna['IdRed'] . '},' . PHP_EOL;
        }

    }
    ?>

    ];

    // create a network
    var container = document.getElementById('red');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {
        autoResize: true,
        height: '400px',
        width: '100%',

        clickToUse: true,
        nodes: {
           // shape: 'dot',
           shape: '',
             color:'#0FB2BF',

            size: 30,
            font: {
                size: 20

            },
            borderWidth: 2,
            shadow:true
        },
        edges: {
            width: 2,
            shadow:true
        }
    };
    network = new vis.Network(container, data, options);

</script>

<?php }?>

</div>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Eliminar Nodo</h4>
   </div>
   <div class="modal-body">
    <form method="post" action="index.php/welcome/dropnodo">
     <select  name="nodo" id="nodo" tabindex="1" class="form-control" required>
     <option value="" disabled="" selected="">Seleccione un nodo</option>
      <?php
foreach ($redsemantica as $key => $value) {?>
      <option  value="<?php echo $value['IdRed']; ?>"><?php echo $value['Nodo']; ?></option>
      <?php }?>
       </select>
       <br>
     <input type="submit" name="insert" id="insert" value="Eliminar" class="btn btn-primary" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>
  </body>

</html>
