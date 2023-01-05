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
            <h2 class="heading mb-12" id="title">Inspección Agregada</h2>
            <div class="sub-heading" id="sub-heading-s">
              <p class="mb-12">La inspección se registro satisfactoriamente.</p>
              <p>Para el nuevo hidrante el bombero asignado debe realizar la inspección y aprobar la instalación, momento en el cual se creara una solicitud para que la municipalidad instale el hidrante.</p>
              <p>Para el mantenimiento de un hidrante, se creara una solicitud a la municipalidad para que relice dicho mantenimiento</p>
              <p class="mb-12">
                <a class="btn btn-primary btn-lg pb_btn-pill smoothscroll" href="<?php echo base_url(); ?>inspecciones">
                  <span class="pb_font-14 text-uppercase pb_letter-spacing-1">Volver</span>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
