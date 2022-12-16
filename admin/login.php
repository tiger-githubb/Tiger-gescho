<?php
include "include/connect.php";
session_start();
if(isset($_SESSION["name"])){
 header("Location: index.php");
}else{
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

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>
        <body>

   <div class="container">
      <div class="card card-login mx-auto mt-5">

        <div class="card-header bg-warning">Admin Login</div>
        <div class="card-body">
          <center>
            <h2><i>CHMSC Binalbagan IT Admission</i></h2>
          <img src="images/logo.png" alt="..." width="50%">
      </center>
          <form method="POST" action="login1.php">
            <div class="form-group">
              <div>
                <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="user" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="form-group">
              <div>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required="required">
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">Login</button>
          </form>
        </div>
      </div>
    </div>

<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
<?php
}
?>