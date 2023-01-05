<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="map_container">
      
      <div id="map"></div>
        
        
      </div>
      <div id="wrapper" style="display:none">
       
			  <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
          <div id="search-h">
            <h2 class="heading mb-3">Búsqueda de Hidrantes</h2>
						<div class="col-md-8 relative align-self-center" id="search-name">
            <form action="<?php echo base_url(); ?>hidrantes/search_name" class="bg-white rounded pb_form_v1" method="get">
              <div class="validation_errors"><?php echo validation_errors(); ?></div>
              <div class="form-group">
                <label for="bombero">Nombre del hidrante</label>
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Nombre" name="nombre" >
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Buscar">
              </div>
            </form>

          </div>
            <div class="sub-heading" id="search-hidrante">
              <?php 
                if(isset($hidrantes)){
                  foreach ($hidrantes as $hidrante): ?>
									<p>Detalles del hidrante</p>
                  <p>Id: <?php echo $hidrante['id'] ?></p>
                  <p>Nombre: <?php echo $hidrante['nombre'] ?></p>
                  <p>Calle: <?php echo $hidrante['calle'] ?></p>
                  <p>Avenida: <?php echo $hidrante['avenida'] ?></p>
                  <p>Caudal: <?php echo $hidrante['caudal'] ?></p>
                  <?php endforeach; 
                }
              ?>
            </div>
          </div>
          <div class="col-md-1">
          </div>
        </div>
      </div>

    </section>
    <!-- END section -->
