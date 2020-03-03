<?php
$titulo = "Página Principal";
include 'template/header.php';
?>
    <main role="main" class="container">

      <div class="starter-template">
        <button onclick="location.href='crear.php'" type="button" class="btn btn-primary btn-lg btn-block">Crear usuario</button>     
        <button onclick="location.href='borrar.php'" type="button" class="btn btn-primary btn-lg btn-block">Borrar usuario</button> 
        <button onclick="location.href='editar.php'" type="button" class="btn btn-primary btn-lg btn-block">Editar usuario</button> 
        <button onclick="location.href='mostrar.php'" type="button" class="btn btn-primary btn-lg btn-block">Buscar usuario</button> 
      </div>

      <div class="row return">
        <button onclick="location.href='principal.php'" type="button" class="btn btn-primary btn-lg">Volver</button>
      </div>

    </main><!-- /.container -->
<?php include 'template/footer.php' ?>