<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="map_container">
      
      <div id="map"></div>
      <div id="wrapper" style="display:none">
        
        <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12" id="title">
            <h2 class="heading mb-3">Creación de Hidrantes</h2>
            <div class="sub-heading" id="sub-heading-s">
            <p class="mb-12">Para crear un nuevo hidrante se debe seguir el siguiente proceso:</p>
                <ol>
                  <li>Se debe asignar una <a href="<?php echo base_url(); ?>inspecciones/create">nueva inspección</a> a un bombero con la ubicación del nuevo hidrante</li>
                  <li>El bombero asignado procede a realizar la <a href="<?php echo base_url(); ?>inspecciones">inspección</a> y da su aprobación para realizar la instalación del hidrante.</li>
                  <li>Esto crea una <a href="<?php echo base_url(); ?>solicitudes">solicitud</a> a la municipalidad, la cual se encarga de instalar el hidrante y marcar la solicitud como completada.</li>
                  <li>Una vez la solicitud se marca como completada, el hidrante es agregado a la base de datos y posteriormente se muestra en el mapa.</li>
                </ol>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- END section -->
