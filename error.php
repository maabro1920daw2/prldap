<?php
session_start();
$titulo = "Error";
include 'template/header.php';
?>

    <main role="main" class="container" >
      <?php
      	echo "<p id=\"errorP\">".$_SESSION["error"]."</p>";
      ?>
          <div class="row return">
            <button onclick="location.href='index.php'" type="button" class="btn btn-primary btn-lg">Volver</button>
          </div>
    </main>

<?php include 'template/footer.php' ?>