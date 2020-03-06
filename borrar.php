<?php
$titulo = "Borrar Usuario";
include 'template/header.php';
?>
<?php 
session_start();
putenv('LDAPTLS_REQCERT=never');
include 'ldap.php';
$l1=new Ldap("ldap://localhost");
if (isset($_POST["submit"])){

  $l1->borrarUsuario(trim($_POST["uid"]),trim($_POST["ou"]));
  
}
?>
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 unica">
          <h4 class="mb-3">Borrar usuario</h4>
          <form class="needs-validation" method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
              <label for="logus">Login usuario</label>
              <input name="uid" type="text" class="form-control" id="logus" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="unorus">Unidad organizativa del usuario</label>
              <input name="ou" type="text" class="form-control" id="unorus" placeholder="">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="row">
              <button class="btn btn-primary btn-lg btn-block btn-crear" type="submit" name="submit">Borrar</button>
            </div>
          </form>
          <div class="row return">
            <button onclick="location.href='principal.php'" type="button" class="btn btn-primary btn-lg">Volver</button>
          </div>
        </div>
      </div>
    </main><!-- /.container -->
<?php include 'template/footer.php' ?>