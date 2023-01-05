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
          <div class="col-md-6">
            <h2 class="heading mb-3">Modificar Inspección</h2>
            <div class="sub-heading">
              <p class="mb-4">Ingrese los datos de la inspección a modificar</p>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-5 relative align-self-center">
            <!--<form action="#" class="bg-white rounded pb_form_v1">-->
            <?php echo form_open('inspecciones/update?id=' . $inspeccion[0]['id'], 'class="bg-white rounded pb_form_v1"'); ?>
              <div class="validation_errors"><?php echo validation_errors(); ?></div>
              <label for="bombero">Bombero Asignado</label>
              <div class="pb_select-wrap">
                  <select class="form-control pb_height-50 reverse" name="bombero" <?php if($inspeccion[0]['accion'] > 0) echo 'disabled'; ?>>
                    <?php foreach ($bomberos as $bombero): ?>
                      <option value="<?php echo $bombero['id'] ?>"
                      <?php if($inspeccion[0]['bombero'] == $bombero['id']) echo 'selected'; ?> >
                        <?php echo $bombero['nombre'] . ' ' . $bombero['apellido_1'] . ' ' . $bombero['apellido_2'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <label for="hidrante">Hidrante: Los hidrantes nuevos no se modifican</label>
              <div class="pb_select-wrap">
                  <select class="form-control pb_height-50 reverse hidrante" name="hidrante" <?php if($inspeccion[0]['accion'] > 0) echo 'disabled'; ?> <?php if($inspeccion[0]['hidrante'] == 'n') echo 'disabled'; ?>>
                  <?php 
                  if($inspeccion[0]['hidrante_nombre'] == 'Pendiente') echo '<option value="n" selected>Hidrante Nuevo</option>'; 
                  else{
                    foreach ($hidrantes as $hidrante): ?>
                      <option value="<?php echo $hidrante['id'] ?>" <?php if($inspeccion[0]['hidrante'] == $hidrante['id']) echo 'selected'; ?>>
                      <?php echo $hidrante['nombre'] ?></option>
                    <?php endforeach; ?> 
                    <div class="form-group ver_mapa" container="nueva_inspeccion">
                      <a>Ver Mapa</a>
                  </div>
                    <?php } ?>
                  </select>
                </div>
                
              <label for="estado">Estado: Cambia de pendiente a completado una vez que la inspección este completada</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Completo" name="completo" value="<?php echo $inspeccion[0]['completo'] ?>" readonly>
              </div>
              <label for="accion">Acción Requerida: La acción completada genera una solicitud a la municipalidad y completa el estado de la inspección.</label>
              <div class="pb_select-wrap">
                  <select class="form-control pb_height-50 reverse hidrante" name="accion" <?php if($inspeccion[0]['accion'] > 0) echo 'disabled'; ?>>
                    <?php if($inspeccion[0]['hidrante_nombre'] == 'Pendiente') {?>
                      <option value="0" <?php if($inspeccion[0]['accion'] == '0') echo 'selected'; ?> >Pendiente</option>
                      <option value="1" <?php if($inspeccion[0]['accion'] == '1') echo 'selected'; ?> >Instalación Aprobada</option>
                      <option value="3" <?php if($inspeccion[0]['accion'] == '3') echo 'selected'; ?> >No apto para instalación</option>
                    <?php } else {?>
                    <option value="0" <?php if($inspeccion[0]['accion'] == '0') echo 'selected'; ?> >Pendiente</option>
                    <option value="1" <?php if($inspeccion[0]['accion'] == '1') echo 'selected'; ?> >Instalación</option>
                    <option value="2" <?php if($inspeccion[0]['accion'] == '2') echo 'selected'; ?> >Mantenimiento</option>
                    <option value="3" <?php if($inspeccion[0]['accion'] == '3') echo 'selected'; ?> >Ninguna</option>
                    <?php } ?>
                  </select>
                </div>
              <label for="fecha_solicitud">Fecha de Solicitud</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Fecha de Solicitud" name="fecha_solicitud" value="<?php echo $inspeccion[0]['fecha_solicitud'] ?>" readonly>
              </div>
              <label for="fecha_finalizacion">Fecha de Finalización: Se actualiza automáticamente al completar una acción</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Fecha de Finalización" name="fecha_finalizacion" value="<?php echo $inspeccion[0]['fecha_finalizacion'] ?>" readonly>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Enviar" <?php if($inspeccion[0]['accion'] > 0) echo 'disabled'; ?>>
              </div>
              <?php if($inspeccion[0]['accion'] > 0) echo '<label>Esta inspección se encuentra cerrada debido a que ya ha sido procesada</label>'; ?>
            </form>

          </div>
        </div>
      </div>

    </section>
    <!-- END section -->
