<?php $this->load->helper('url'); ?>
<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="map_container">
      <div id="map"></div>
      <div id="wrapper" style="display:none">
        <div id="location" class="mb-4"></div>
        <div id="scale" class="mb-4"></div>
      </div>
    </div>
      <div class="container login">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <h2 class="heading mb-12">Sistema de Geolocalización de Hidrantes</h2>
            <div class="sub-heading" id="home">
              <p class="col-md-11">Para crear un nuevo hidrante se debe seguir el siguiente proceso:</p>
                <ol>
                  <li>Se debe asignar una <a href="<?php echo base_url(); ?>inspecciones/create">nueva inspección</a> a un bombero con la ubicación del nuevo hidrante</li>
                  <li>El bombero asignado procede a realizar la <a href="<?php echo base_url(); ?>inspecciones">inspección</a> y da su aprobación para realizar la instalación del hidrante.</li>
                  <li>Esto crea una <a href="<?php echo base_url(); ?>solicitudes">solicitud</a> a la municipalidad, la cual se encarga de instalar el medidor y marcar la solicitud como completada.</li>
                  <li>Una vez la solicitud se marca como completada, el medidor es agregado a la base de datos y desplegado en el mapa.</li>
                </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
