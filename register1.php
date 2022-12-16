<?php
include "include/connect.php";
session_start();
if (isset($_POST['submit'])) {
  if($_POST['pass']!=$_POST['rpass']){

                         ?>
    <script type="text/javascript">
      alert("Password Doesnt Match!.");
      window.location = "register.php";
    </script>

                         <?php
  }
    $fileName = date("Y").date("m").date("d").$_FILES['PICTURE']['name'];
    $errofile = $_FILES['PICTURE']['error'];
    $type = $_FILES['PICTURE']['type'];
    $temp = $_FILES['PICTURE']['tmp_name'];
    $myfile =preg_replace('#[^a-z.0-9]#i', '', $fileName); 
    $location=$myfile;

   
        @$file=$_FILES['PICTURE']['tmp_name'];
        @$image= addslashes(file_get_contents($_FILES['PICTURE']['tmp_name']));
        @$image_name= addslashes($_FILES['PICTURE']['name']); 
        @$image_size= getimagesize($_FILES['PICTURE']['tmp_name']);

          //uploading the file
          move_uploaded_file($temp,"images/" . $myfile);

  $fname = $_POST['fname'];
   $lname = $_POST['lname'];
  $datetest = $_POST['datetest'];
  $rscore = $_POST['rscore'];
  $stanine = $_POST['stanine'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $gender = $_POST['gender'];
  $birth = $_POST['birth'];
  $email = $_POST['email'];
  $code = $_POST['code'];

  $query1 = "SELECT * FROM student WHERE fname = '".$fname."' AND lname='".$lname."'";
$result1 = mysqli_query($db, $query1) or die (mysqli_error($db));
                  
$row1 = mysqli_fetch_assoc($result1);


$query2 = "SELECT * FROM student WHERE username = '".$user."' AND password=sha1('".$pass."')";
$result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
                  
$row2 = mysqli_fetch_assoc($result2);
if ($row1>0) {
     ?>
    <script type="text/javascript">
      alert("Account Already exist!.");
      window.location = "register.php";
    </script>
                         <?php
}elseif ($row2>0) {
     ?>
    <script type="text/javascript">
      alert("Account Already exist!.");
      window.location = "register.php";
    </script>
                         <?php
}else{

  $query = "INSERT INTO `student`(`examinee_code`,`fname`,`lname`, `dateoftest`, `raw_score`, `stanine`,`picture`, `gender`, `b_date`, `email`, `username`, `password`) VALUES ('".$code."','".$fname."','".$lname."','".$datetest."','".$rscore."','".$stanine."','".$location."','".$gender."','".$birth."','".$email."','".$user."',sha1('$pass'))";
     mysqli_query($db,$query)or die ('Error in updating Database');

mysqli_query($db,"UPDATE idnumber SET auto_end = auto_end+1 where description='STUD'") or die(mysqli_error($db));
                         ?>
    <script type="text/javascript">
      alert("Your Information Has Been Added Successfully!.");
      window.location = "login.php";
    </script>

                         <?php
}
}
?>