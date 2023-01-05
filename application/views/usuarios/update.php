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
            <h2 class="heading mb-3">Modificar Usuario</h2>
            <div class="sub-heading">
              <p class="mb-4">Ingrese los datos del usuario a modificar</p>
            </div>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-5 relative align-self-center">
            <!--<form action="#" class="bg-white rounded pb_form_v1">-->
            <?php echo form_open('usuarios/update?cedula=' . $usuario[0]['cedula'], 'class="bg-white rounded pb_form_v1"'); ?>
              <h2 class="mb-4 mt-0 text-center">Registro</h2>
              <div class="validation_errors"><?php echo validation_errors(); ?></div>
							<label for="usuario">Cédula</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Cédula" name="cedula" value="<?php echo $usuario[0]['cedula'] ?>" readonly>
              </div>
							<label for="usuario">Nombre</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Nombre" name="nombre" value="<?php echo $usuario[0]['nombre'] ?>">
              </div>
							<label for="usuario">Primer Apellido</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Primer Apellido" name="apellido_1" value="<?php echo $usuario[0]['apellido_1'] ?>">
              </div>
							<label for="usuario">Segundo Apellido</label>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Segundo Apellido" name="apellido_2" value="<?php echo $usuario[0]['apellido_2'] ?>">
              </div>
              <div class="form-group">
							<label for="usuario">Teléfono</label>
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Teléfono" name="telefono" value="<?php echo $usuario[0]['telefono'] ?>">
              </div>
							<label for="usuario">Tipo</label>
              <div class="form-group">
                <div class="pb_select-wrap">
                  <select class="form-control pb_height-50 reverse" name="tipo">
                    <option value="">Tipo</option>
                    <option value="0" <?php if($usuario[0]['tipo'] == 0) echo 'selected'?>>Administrador</option>
                    <option value="1" <?php if($usuario[0]['tipo'] == 1) echo 'selected'?>>Bombero</option>
                    <option value="2" <?php if($usuario[0]['tipo'] == 2) echo 'selected'?>>Municipalidad</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Enviar">
              </div>
            </form>

          </div>
        </div>
      </div>

    </section>
    <!-- END section -->
