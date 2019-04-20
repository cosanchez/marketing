<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="<?php echo base_url();?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Red Semantica</title>
    <script src="https://unpkg.com/sweetalert2@7.22.0/dist/sweetalert2.all.js"></script>
   <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- REd Semantica-->
    <style type="text/css">
            body {
              /*font: 10pt sans;*/
            }
            #network {
                float:left;
                width: 600px;
                height: 600px;
                margin:5px;
                border: 1px solid lightgray;
            }
            #config {
                float:left;
                width: 400px;
                height: 600px;
            }
            #input_output {
                height: 10%;
                width: 15%;
            }

            p {
                font-size:16px;
                max-width:700px;
            }
        </style>

        <script type="text/javascript" src="js/exampleUtil.js"></script>
        <script type="text/javascript" src="js/vis.js"></script>
        <link href="css/vis.css" rel="stylesheet" type="text/css">

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
          <?php echo "<a class='nav-link' href='index.php/welcome/CM_Campanas/".$_SESSION['IdUsuario']."'?>
            <i class='fas fa-fw fa-folder'></i>
            <span>Dashboard</span>
          </a>"?>
        </li>
         <li class="nav-item ">
         <?php echo "<a class='nav-link' href='index.php/welcome/CampanasAsigCM/".$_SESSION['IdUsuario']."'?>
            <i class='fas fa-fw fa-folder'></i>
            <span>Campañas Asignadas</span>
          </a>"?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php/welcome/AsignUserCM">
            <i class="fa fa-users"></i>
            <span>Asignacion de Usuarios</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php/welcome/RedSemanticaCM">
            <i class="fas fa-fw fa-table"></i>
            <span>Red Semantica</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php/welcome/AdminEmpresas">
            <i class="fas fa-fw fa-table"></i>
            <span>Chat</span></a>
        </li>
      </ul>
      <div id="content-wrapper">
        <div class="row">
          <select class="form-control">
            <option>Seleccionar</option>
            
          </select>
        <div id="network">
          <div class="vis-network" tabindex="900" style="position: relative; overflow: hidden; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 100%; height: 100%;">
            <canvas width="400" height="400" style="position: relative; touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 100%; height: 100%;"></canvas>
            <div class="vis-manipulation" style="display: block;">
              <div class="vis-button vis-add" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
              <div class="vis-label">Add Node</div>
            </div>
            <div class="vis-separator-line"></div>
            <div class="vis-button vis-connect" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
              <div class="vis-label">Add Edge</div></div>
            </div>
            <div class="vis-edit-mode" style="display: block;"></div>
            <div class="vis-close" style="display: block; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
          </div>
        </div>
      </div>

        <div>
            <textarea id="input_output"></textarea>
            <input type="button" id="import_button" onclick="importNetwork()" value="import">
            <input type="button" id="export_button" onclick="exportNetwork()" value="export">
            <input type="button" id="destroy_button" onclick="destroyNetwork()" value="destroy">
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

    
    <!--REd SEmantia-->
    <script type="text/javascript">
            var network;
            var container;
            var exportArea;
            var importButton;
            var exportButton;

            function init() {
                container = document.getElementById('network');
                exportArea = document.getElementById('input_output');
                importButton = document.getElementById('import_button');
                exportButton = document.getElementById('export_button');

                draw();
            }

            function addConnections(elem, index) {
                // need to replace this with a tree of the network, then get child direct children of the element
                elem.connections = network.getConnectedNodes(index);
            }

            function destroyNetwork() {
                network.destroy();
            }

            function clearOutputArea() {
                exportArea.value = "";
            }

            function draw() {
                // create a network of nodes
                var data = getScaleFreeNetwork(5);

                network = new vis.Network(container, data, {manipulation:{enabled:true}});

                clearOutputArea();
            }

            function exportNetwork() {
                clearOutputArea();

                var nodes = objectToArray(network.getPositions());

                nodes.forEach(addConnections);

                // pretty print node data
                var exportValue = JSON.stringify(nodes, undefined, 2);

                exportArea.value = exportValue;

                resizeExportArea();
            }

            function importNetwork() {
                var inputValue = exportArea.value;
                var inputData = JSON.parse(inputValue);

                var data = {
                    nodes: getNodeData(inputData),
                    edges: getEdgeData(inputData)
                }

                network = new vis.Network(container, data, {});

                resizeExportArea();
            }

            function getNodeData(data) {
                var networkNodes = [];

                data.forEach(function(elem, index, array) {
                    networkNodes.push({id: elem.id, label: elem.id, x: elem.x, y: elem.y});
                });

                return new vis.DataSet(networkNodes);
            }

            function getNodeById(data, id) {
                for (var n = 0; n < data.length; n++) {
                    if (data[n].id == id) {  // double equals since id can be numeric or string
                      return data[n];
                    }
                };

                throw 'Can not find id \'' + id + '\' in data';
            }

            function getEdgeData(data) {
                var networkEdges = [];

                data.forEach(function(node) {
                    // add the connection
                    node.connections.forEach(function(connId, cIndex, conns) {
                        networkEdges.push({from: node.id, to: connId});
                        let cNode = getNodeById(data, connId);

                        var elementConnections = cNode.connections;

                        // remove the connection from the other node to prevent duplicate connections
                        var duplicateIndex = elementConnections.findIndex(function(connection) {
                          return connection == node.id; // double equals since id can be numeric or string
                        });


                        if (duplicateIndex != -1) {
                          elementConnections.splice(duplicateIndex, 1);
                        };
                  });
                });

                return new vis.DataSet(networkEdges);
            }

            function objectToArray(obj) {
                return Object.keys(obj).map(function (key) {
                  obj[key].id = key;
                  return obj[key];
                });
            }

            function resizeExportArea() {
                exportArea.style.height = (1 + exportArea.scrollHeight) + "px";
            }

            init();
        </script>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script href="js/Chart.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script href="js/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script href="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script href="js/demo/datatables-demo.js"></script>
    <script href="js/demo/chart-area-demo.js"></script>
  </body>
</html>
