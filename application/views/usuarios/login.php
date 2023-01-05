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
          <div>
            <h2 class="heading mb-3">Geolocalización de Hidrantes</h2>
            <div class="sub-heading">
              <!-- <p class="mb-4">Ingrese su usuario y contraseña para iniciar sesión</p> -->
              
            </div>
          </div>
          <div class="col-md-5 relative align-self-center" id="login-form">

					<?php echo form_open('usuarios/login', 'class="bg-white rounded pb_form_v1"'); ?>
              <h2 class="mb-4 mt-0 text-center" style="padding-top:20px;">Iniciar sesión</h2>
							<div class="validation_errors"><?php echo validation_errors(); ?></div>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" placeholder="Cédula" name="cedula">
              </div>
              <div class="form-group">
                <input type="password" class="form-control pb_height-50 reverse" placeholder="Contraseña" name="contrasena">
              </div>   
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Ingresar">
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
