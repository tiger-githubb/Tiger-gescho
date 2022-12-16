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

    <title>Register an Account</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>
        <body class="bg-info">
        <div id="content-wrapper">
        <div class="container-fluid">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Student Register</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data" action="register1.php">
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputName1" class="form-control" placeholder="Name" name="fname" autofocus="autofocus" required>
                            <label for="inputName1">First Name</label>
                            </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputlname" class="form-control" placeholder="Name" name="lname" autofocus="autofocus" required>
                            <label for="inputlname">Last Name</label>
                            </div>
                            </div>
                          </div>
                        </div>

                          


                          <div class="col-md-12">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="date" id="inputAge1" class="form-control" placeholder="Date of Test" name="datetest" required>
                            <label for="inputAge1">Date Of Test</label>
                            </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="number" id="inputAddress1" class="form-control" placeholder="Raw Score" name="rscore" required>
                            <label for="inputAddress1">Raw Score</label>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="number" id="inputContact1" class="form-control" placeholder="Stanine Score" name="stanine" required>
                            <label for="inputContact1">Stanine Score</label>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="file" id="inputfile" class="form-control" placeholder="Date of Test" name="PICTURE" required>
                            <label for="inputfile">Upload Entrance Result</label>
                            </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="user" class="form-control" placeholder="Username" name="user" required>
                            <label for="user">Username</label>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="password" id="pass" class="form-control" placeholder="Password" name="pass" required>
                            <label for="pass">Password</label>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="password" id="rpass" class="form-control" placeholder="Re- Type Password" name="rpass" required>
                            <label for="rpass">Re-type Password</label>
                            </div>
                            </div>
                          </div>
                        </div>
                          <div class="col-md-12">
                            <div class="form-group">
                               
                            <div class="form-label-group">

                            <select class="form-control" name="gender">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="date" id="inputAge2" class="form-control" placeholder="Date of Birth" name="birth" required>
                            <label for="inputAge2">Date Of Birth</label>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputname2" class="form-control" placeholder="Email" name="email" required>
                            <label for="inputname2">Email</label>
                            </div>
                            </div>
                          </div>
                          <?php
                $query4=mysqli_query($db,"select * from idnumber where description = 'STUD'")or die(mysqli_error());
                $row4=mysqli_fetch_array($query4);
                ?>
                           <div class="col-md-12">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" readonly="" value="<?php echo $row4['description'].'-'.($row4['auto_start']+$row4['auto_end']); ?>" id="inputname5" class="form-control" placeholder="Examinee ID Number" name="code" required>
                            <label for="inputname5">Examinee ID Number</label>
                            </div>
                            </div>
                          </div>
            <input type="submit" value="Register" name="submit" class="btn btn-success btn-block">
            <a type="button" href="login.php" class="btn btn-info btn-block">Login</a>
          
          </form>
      </div>
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