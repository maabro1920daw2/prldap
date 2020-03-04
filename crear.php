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
                <label for="givenName">Nombre</label>
                <input type="text" class="form-control" id="givenName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="sn">Apellido</label>
                <input type="text" class="form-control" id="sn" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="title">Título o cargo</label>
              <input type="text" class="form-control" id="title" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="telephoneNumber">Teléfono fijo</label>
              <input type="text" class="form-control" id="telephoneNumber" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="mobile">Teléfono móvil</label>
              <input type="text" class="form-control" id="mobile" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="postalAddress">Dirección</label>
              <input type="text" class="form-control" id="postalAddress" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="description">Descripción del usuario</label>
              <input type="text" class="form-control" id="description" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="uid">Login usuario</label>
              <input type="text" class="form-control" id="uid" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="ou">Unidad organizativa del usuario</label>
              <input type="text" class="form-control" id="ou" placeholder="" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="uidNumber">Número identificador del usuario</label>
              <input type="text" class="form-control" id="uidNumber" placeholder="">
            </div>

            <div class="mb-3">
              <label for="gidNumber">Número del grupo por defecto del usuario</label>
              <input type="text" class="form-control" id="gidNumber" placeholder="">
            </div>

            <div class="mb-3">
              <label for="homeDirectory">Directorio personal del usuario</label>
              <input type="text" class="form-control" id="homeDirectory" placeholder="">
            </div>

            <div class="mb-3">
              <label for="loginShell">Shell por defecto del usuario</label>
              <input type="text" class="form-control" id="loginShell" placeholder="">
            </div>

            <div class="mb-3">
              <label for="password">Contraseña del usuario</label>
              <input type="password" class="form-control" id="password" placeholder="">
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