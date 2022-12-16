 
 <?php
session_start();
// define variables and set to empty values
$Message = $Erroremail = $Errorpass = "";
 if(isset($_POST['user'])){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = check_input($_POST["user"]);
  
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$email)) {
      $Erroremail = ""; 
    }
  else{
    $femail=$email;
  }
 
  $fpass = check_input($_POST["pass"]);

  if ($Erroremail!=""){
  $Message = "Login failed! Errors found";

  }
  else{
  include "include/connect.php";
  
  $query=mysqli_query($db,"select * from `user` where username='$email' && password=sha1('$fpass')");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  
  if ($num_rows>0){
    $Message = "Login Successful!";
  }
  else{
  $Message = "Login Failed! User not found";
  $_SESSION['message']=$Message;
  unset($_SESSION['name']);
  session_destroy();
  include "login.php";
  }
  
  }
}
}

function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center>
<?php
  if ($Message=="Login Successful!"){
    $_SESSION["name"]=$row['name'];
   // echo $Message;
   // include "index.php";
    //include "footer.php";
    ?>
<script type="text/javascript">
      alert("Login Successfull.");
      window.location = "index.php";
    </script>

    <?php
  }
  else{
    echo $Message;

  }
?>