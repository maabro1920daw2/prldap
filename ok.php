<?php
session_start();
$titulo = "Ok";
include 'template/header.php';
?>

    <main role="main" class="container" >
    	<div id="errorP" class="row alert alert-success">
	      <?php
	        echo "<p>".$_SESSION["ok"]."</p>";
	      ?>        
      	</div>
        <div class="row return">
            <button onclick="location.href='index.php'" type="button" class="btn btn-primary btn-lg">Volver</button>
        </div>
    </main>

<?php include 'template/footer.php' ?>