<?php
$titulo = "Crear Usuario";
include 'template/header.php';
?>
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 unica">
          <h4 class="mb-3">Crear usuario</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nombre</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Apellido</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="titulo">Título o cargo</label>
              <input type="text" class="form-control" id="titulo" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="teflf">Teléfono fijo</label>
              <input type="text" class="form-control" id="teflf" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="teflm">Teléfono móvil</label>
              <input type="text" class="form-control" id="teflm" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="direc">Dirección</label>
              <input type="text" class="form-control" id="direc" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="descu">Descripción del usuario</label>
              <input type="text" class="form-control" id="descu" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="logus">Login usuario</label>
              <input type="text" class="form-control" id="logus" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="unorus">Unidad organizativa del usuario</label>
              <input type="text" class="form-control" id="unorus" placeholder="" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="nuidus">Número identificador del usuario</label>
              <input type="text" class="form-control" id="nuidus" placeholder="">
            </div>

            <div class="mb-3">
              <label for="nugudeus">Número del grupo por defecto del usuario</label>
              <input type="text" class="form-control" id="nugudeus" placeholder="">
            </div>

            <div class="mb-3">
              <label for="dipeus">Directorio personal del usuario</label>
              <input type="text" class="form-control" id="dipeus" placeholder="">
            </div>

            <div class="mb-3">
              <label for="shdeus">Shell por defecto del usuario</label>
              <input type="text" class="form-control" id="shdeus" placeholder="">
            </div>

            <div class="mb-3">
              <label for="cous">Contraseña del usuario</label>
              <input type="password" class="form-control" id="cous" placeholder="">
            </div>

            <div class="row">
              <button class="btn btn-primary btn-lg btn-block btn-crear" type="submit">Registrar</button>
            </div>
          </form>
          <div class="row return">
            <button onclick="location.href='principal.php'" type="button" class="btn btn-primary btn-lg">Volver</button>
          </div>
        </div>
      </div>
    </main><!-- /.container -->
<?php include 'template/footer.php' ?>