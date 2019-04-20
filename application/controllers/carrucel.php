<!--           <div class="row">
            <div class="col-xl-2 col-sm-5 mb-3">
            </div>
            <div class="col-xl-2 col-sm-5 mb-3">
              <button class="btn btn-warning" onclick="EnvioDisenoRevision();showR()">Revision</button>
            </div>
            <div class="col-xl-2 col-sm-5 mb-3">
               <button class="btn btn-danger">Eliminar</button>
            </div>
            <div class="col-xl-2 col-sm-5 mb-3">
               <button class="btn btn-success" onclick="SaveContenido()">Guardar</button>
            </div>
          </div> -->

          ///////////////carrusel
                      <!-- termina comienza el contenido panel nuevo contenido-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="far fa-pencil"></i>
        <h4>Diseños</h4>
      </div>
    <div class="card-body">
                   <!-- /carrucel-->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
             <div class="carousel-inner">
               <div class="carousel-item active">
                   <img class="d-block w-100" src="https://alabio.mx/imagenes/esquites-y-elotes-183.jpg" alt="First slide">
                 <div class="carousel-caption d-none d-md-block">
                   <h5>Elotes don Juan</h5>
                   <p>Ricos esquites</p>
                 </div>
               </div>
            <div class="carousel-item">
                   <img class="d-block w-100" src="https://servinox.com.mx/blog/wp-content/uploads/2018/01/elote-gormet.jpg" alt="Second slide">
                 <div class="carousel-caption d-none d-md-block">
                   <h5>Elotes</h5>
                   <p>Ricos esquites</p>
                 </div>
            </div>
            <div class="carousel-item">
                  <img class="d-block w-100" src="https://www.closetcooking.com/wp-content/uploads/2016/08/EsquitesAvocadoToast28MexicanCornSaladAvocadoToast298004096.jpg" alt="Third slide">
               <div class="carousel-caption d-none d-md-block">
                 <h5>Ekoelotes</h5>
                 <p>Ricos esquites</p>
               </div>
            </div>
            </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
              </a>
         </div><!-- fin carrucel -->
          ////////////////carrusel

          ///////////////////////////////////
                    <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Diseño</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
           <!-- comienza el contenido panel nuevo contenido-->
           <div class="card mb-3">
              <div class="card-header">
              <i class="far fa-pencil"></i>
                <h3>Nuevo Diseño</h3></div>
                <div class="card-body">
                  <!--inicia de Row 1-->
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
                        <select class="form-control" id="nodo" name="nodo">
                          <option>Seleccionar</option>
                        </select>
                    </div>
                  </div>
                  <br>
                  <!--Cierra de Row 1-->
                  <!--inicia row 2-->
                  <div class="row">
                     <form id="formimagen" action="index.php/welcome/subirimagen2" method="post" enctype="multipart/form-data">
                     <div class="row">
                          <textarea rows="4" cols="100" name="comentario" placeholder="Deja algún comentario"></textarea>
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
                                  <div class="col-4">
                                   <button class="btn btn-primary" type="submit">Guardar</button>
                                 </div>
                                    <div class="col-4">
                                   <button class="btn btn-primary" type="submit">Enviar  a Revision</button>
                                 </div>
                               </div>

                      </div>
                       </form>
                  </div>
                    <!--Cierra de Row 2-->
      </div>
          ///////////////////////////////////