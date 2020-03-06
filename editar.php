<?php
session_start();
include 'ldap.php';
$titulo = "Editar Usuario";
include 'template/header.php';

$l1=new Ldap("ldap://localhost");
if (isset($_POST["submit"])){

  $l1->editarUsuario(trim($_POST["uid"]),trim($_POST["ou"]),trim($_POST["optradio"]),trim($_POST["valor"]));
  
}

?>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 unica">
          <h4 class="mb-3">Editar usuario</h4>
          <form class="needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
              <label for="logus">Login usuario</label>
              <input type="text" class="form-control" name="uid" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="unorus">Unidad organizativa del usuario</label>
              <input type="text" class="form-control" name="ou" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <label class="mb-3">Indica el dato que quieres modificar</label>
            <div class="row">
              <div class="col-md-6">
              <div class="radio">
                <label><input value="givenname" type="radio" name="optradio">Nombre</label>
              </div>
              <div class="radio">
                <label><input value="sn" type="radio" name="optradio">Apellido</label>
              </div>
              <div class="radio">
                <label><input value="title" type="radio" name="optradio">Título o cargo</label>
              </div>
              <div class="radio">
                <label><input value="telephonenumber" type="radio" name="optradio">Teléfono fijo</label>
              </div>
              <div class="radio">
                <label><input value="mobile" type="radio" name="optradio">Teléfono móvil</label>
              </div>
              <div class="radio">
                <label><input value="postaladdress" type="radio" name="optradio">Dirección</label>
              </div>               
              </div>
            <div class="col-md-6">
              <div class="radio">
                <label><input value="description" type="radio" name="optradio">Descripción del usuario</label>
              </div>
              <div class="radio">
                <label><input value="uidnumber" type="radio" name="optradio">Número identificador del usuario</label>
              </div>
              <div class="radio">
                <label><input value="gidnumber" type="radio" name="optradio">Número del grupo por defecto del usuario</label>
              </div>
              <div class="radio">
                <label><input value="homedirectory" type="radio" name="optradio">Directorio personal del usuario</label>
              </div>
              <div class="radio">
                <label><input value="loginshell" type="radio" name="optradio">Shell por defecto del usuario</label>
              </div>
              <div class="radio">
                <label><input value="password" type="radio" name="optradio">Contraseña del usuario</label>
              </div>
            </div>
            </div>
            <hr class="mb-4">
            <div class="mb-3">
              <label for="nuva">Indica el nuevo valor</label>
              <input type="text" class="form-control" name="valor" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="row">
              <button class="btn btn-primary btn-lg btn-block btn-crear" name="submit" type="submit">Editar</button>
            </div>
          </form>
          <div class="row return">
            <button onclick="location.href='principal.php'" type="button" class="btn btn-primary btn-lg">Volver</button>
          </div>
        </div>
      </div>
    </main><!-- /.container -->
<?php include 'template/footer.php' ?>