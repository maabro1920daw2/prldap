<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>

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
        </div>
      </div>
    </main><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>