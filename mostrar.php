<?php
$titulo = "Buscar Usuario";
include 'template/header.php';
?>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 unica">
          <h4 class="mb-3">Buscar usuario</h4>
          <form class="needs-validation" novalidate>
            <div class="mb-3">
              <label for="logus">Login usuario</label>
              <input type="text" class="form-control" id="logus" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="unorus">Unidad organizativa del usuario</label>
              <input type="text" class="form-control" id="unorus" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="row">
              <button class="btn btn-primary btn-lg btn-block btn-crear" type="submit">Buscar</button>
            </div>
          </form>
          <div class="row return">
            <button onclick="location.href='principal.php'" type="button" class="btn btn-primary btn-lg">Volver</button>
          </div>
        </div>
      </div>
    </main>
<?php include 'template/footer.php' ?>