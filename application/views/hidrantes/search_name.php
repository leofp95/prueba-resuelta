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
            <div class="box_container" id="search-hidrante">
              <?php if(isset($hidrantes)){ ?>
                <table class="table">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Calle</th>
                    <th scope="col">Avenida</th>
                    <th scope="col">Caudal</th>
                    <th scope="col">Localización</th>
                  </tr>

                  <?php foreach ($hidrantes as $hidrante): ?>
                    <tr>
                      <td><?php echo $hidrante['id'] ?></td>
                      <td><?php echo $hidrante['nombre'] ?>
                      <td><?php echo $hidrante['calle'] ?></td>
                      <td><?php echo $hidrante['avenida'] ?></td>
                      <td><?php echo $hidrante['caudal'] ?></td>
                      <td><?php echo $hidrante['localizacion'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table> 
              <?php } ?>
            </div>
          </div>
          <div class="col-md-1">
          </div>
        </div>
      </div>

    </section>
    <!-- END section -->
