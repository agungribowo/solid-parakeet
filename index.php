<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="siap_jaldis/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template-->
  <link href="siap_jaldis/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%);">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-6 col-md-4">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <!-- Nested Row within Card Body -->

                <div class="p-5">
                  <div class="text-center">
                  <?php
			$page = (isset($_GET['page']))? $_GET['page'] : "main";
			switch ($page) {
				case 'login': include "restric/login.php"; break;								
				default : include "restric/form-login.php";	
			}
		?>
                </div>

          </div>
      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="siap_jaldis/vendor/jquery/jquery.min.js"></script>
  <script src="siap_jaldis/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="siap_jaldis/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="siap_jaldis/js/sb-admin-2.min.js"></script>

</body>

<script>
		$(document).ready(function() {
			App.init();
		});
	</script>

</html>
