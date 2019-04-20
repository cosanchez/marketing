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

    <title>Diseñador</title>
   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for thi s template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert2@7.22.0/dist/sweetalert2.all.js"></script>
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
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Gestión de Diseños</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#" >
            <i class="fa fa-comments" style="font-size:24px"></i>
            <span>Chat</span>
          </a>
        </li>
      </ul>
      <div id="content-wrapper">
        <div class="container-fluid">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Diseño</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
                </ol>
              <div class="card mb-3">
                 <div class="card-header">
                    <i class="far fa-pencil"></i>
                    <h3>Nuevo Diseño</h3></div>
              </div>
              <div class="card-body">
                   <form id="formimagen" action="index.php/welcome/subirimagen2" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                      <label for="empresa">Empresas</label>
                        <select class="form-control" id="idempresa" name="idempresa" onchange="traeCampanas()">
                          <option> Empresa </option>
                      <?php
foreach ($campanasdiseñador as $key => $values) {?>
                            <option   value="<?php echo $values['IdEmpresa']; ?>"><?php echo $values['Nombre']; ?></option>
                   <?php }?>
                  </select>
                    </div>
                    <div class="col-4">
                      <label for="campana">Campañas</label>
                        <select class="form-control" id="campana" name="campana" onchange="traeNodo()">
                          <option>Seleccionar</option>
<!--                             <?php
foreach ($campanasdiseñador as $key => $value) {
    ?>
<option value="<?php echo $value['IdCampana']; ?>"><?php echo $value['NombreCampana'];
    $cm = $value['CommunityManager']; ?></option>
                              <?php }?> -->
                           </select>
                           <input hidden type="text" name="cm" id="cm" value="<?php echo $cm ?>">
                        </select>
                    </div>
                    <div class="col-4">
                      <label for="nodo">Nodos</label>
                        <select class="form-control" id="nodo" name="nodo" onchange="traeDisenos()">
                          <option>Seleccionar</option>
                        </select>
                    </div>
                  </div>
                  <br>
                  <div class="container-fluid">
                     <div class="container-fluid">
                        <div class="row" >
                            <style type="text/css">
                    img{
                      width: 180px;
                      height: 180px;
                    }
                  </style>
                               <textarea rows="4" cols="50" name="comentario" placeholder="Deja algún comentario"></textarea>
                               <div class="col-6" style="overflow: hidden;">
                                <img style="width: 100%;" src=" " id="img" name="imagen">
                                <input  type="hidden" name="imagenfack" value=" " id="imagenf" >
                                </div>
                        </div>
                     </div>
                     <div class="row">
                          <div class="col-xl-2 col-sm-5 mb-3">
                          </div>
                              <div class="col-12">
                                   <h5>Adjuntar un archivo:</h5>
                                <div class="form-group">
                                    <label for="archivo"></label>
                                    <input type="file" id="archivo" name="archivo">
                                 </div>
                               </div>
                               <div class="row">
                               <div class="col-3">
                                </div>
                                  <div class="col-3">
                                   <button class="btn btn-primary" name="guardar" type="submit">Guardar</button>
                                 </div>
                                    <div class="col-3">
                                   <button class="btn btn-primary" onclick="SaveContenido()" name="enviar" type="submit">Enviar  a Revision</button>
                                 </div>
                                         <div class="col-3">
                                </div>
                               </div>
                      </div>
                    </form>
                  </div>
              </div><!--card body-->
        </div><!--container-->
  </div><!--wraped-->
      </div>
    </div>
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>
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
    <script type="text/javascript">
          function showM(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Diseño Guardado',
  showConfirmButton: false,
  timer: 1500
})
   }
   function traeCampanas(){
   var idempresa = document.getElementById("idempresa").value;
$.get('index.php/welcome/campanasjson/'+idempresa)
  .done(
        function(res) {
          var texto = "";
          texto += " <option value='' disabled='' selected=''>Seleccione el Campaña</option>";
          for (var i = res.length - 1; i >= 0; i--) {
            var obj = res[i];
            texto +="<option value='"+obj['IdCampana']+"'>"+obj['NombreCampana']+"</option>";
          }
          $("#campana").html(texto);
        }

      )
   }

      function traeNodo(){
   var campana = document.getElementById("campana").value;
$.get('index.php/welcome/campajson/'+campana)
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

   function traeDisenos(){
    var campana = document.getElementById("campana").value;
var nodo = document.getElementById("nodo").value;
var cm = document.getElementById("cm").value;
         var contenido='';
         var imagen='';
          var diseno='';
              var parametros = {
                "valor1" : campana,
                "valor2" : nodo,
                "valor3" : cm,
            };
    $.get({
            data: parametros, //datos que se envian a traves de ajax
            url:   'index.php/welcome/GetContenido', //archivo que recibe la peticion
            type:  'post', //método de envio
    })
//$.get('index.php/welcome/campajson2/'+campana)
  .done(
        function(res) {
          $("#img").attr("src","Disenos/"+JSON.parse(res).Diseno);
          $('input[name=imagenfack]').val(JSON.parse(res).Diseno);
        }

      )
   }



  function SaveContenido(){
    var campana= document.getElementById("campana").value;
    var nodo= document.getElementById("nodo").value;
    var archivo= document.getElementById("archivo").value;

      $.ajax({
      type : 'POST',
      url  : 'index.php/welcome/guardarDiseno/',
      data : {campana:campana,nodo:nodo,archivo:archivo},

    });
      showM();
      location.reload("");
  }

  function EnvioDisenoRevision(){
    var campana= document.getElementById("campana").value;
    var nodo= document.getElementById("nodo").value;
    var archivo= document.getElementById("archivo").value;
    var cm=document.getElementById("cm").value;
    //alert(campana+" "+cm+" "+nodo);

          $.ajax({
      type : 'POST',
      url  : 'index.php/welcome/RevisonDiseno/',
      data : {campana:campana,nodo:nodo,archivo:archivo,cm:cm},

    });
          showR();
      location.reload("");
  }

function showM(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Diseño Guardado',
  showConfirmButton: false,
  timer: 1500
})
   }

   function showR(){
    swal({
  position: 'center',
  type: 'success',
  title: 'Diseño Enviado a Revision',
  showConfirmButton: false,
  timer: 1500
})
   }
</script>
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
// $('#formimagen').on('submit',function(evt){
//   evt.preventDefault();
//   //console.log(this);
//   $.ajax({
//     url:$(this).attr("action"),
//     type:$(this).attr("method"),
//     data:$(this).serialize(),
//     dataType: "multipart/form-data",
//     success: function(data){
//       alert("Archivo Alamcenado con exito2");
//     },
//     error:function(error){
//       alert(error);
//     }
//   })
// });
    </script>
  </body>
</html>
