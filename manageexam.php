<?php
include('include/connect.php');
include('include/header.php');
include('include/sidebar1.php');
include('include/breadcrumbs.php');
//include('include/cardIcons.php');
$query = "SELECT s.sched_id,concat(e.fname,' ',e.lname) as 'name',e.examinee_code,s.dateofexam,s.timeofexam,s.status from exam_schedule s,student e where e.stud_id = s.stud_id AND s.stud_id = '".$_SESSION['id']."'";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {

                          if ($row['status']!='Confirmed') {
                            echo "<h1>No Confirmed Schedule Yet!....</h1>";
                          }else{

        ?>
        <?php
 $query1 = "SELECT DISTINCT stud_id FROM student_answer WHERE stud_id = '".$_SESSION['id']."'";
    $getdata = mysqli_query($db,$query1);
    $result1 = mysqli_fetch_array($getdata);
      
      if ($result1>0) {
        ?>

<div class="container">
          <div class="card card-login mx-auto mt-5">
<div id="content-wrapper">

        <div class="container-fluid">
 <h2>Exam Result</h2> 
 <?php
//echo current_time();
//  date_default_timezone_set('Asia/karachi');
// echo date('h:i');
 ?>
            <div class="card-body">
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Question #</th>
      <th scope="col">Answer</th>
      <th scope="col">Result</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $query2 = "SELECT * FROM student_answer WHERE stud_id = '".$_SESSION['id']."'";
    $getdata = mysqli_query($db,$query2);
    while( $result2 = mysqli_fetch_array($getdata)){
        ?>
      <tr>
        <td>
         <?php
         echo $result2['question_number'];
         ?>
        </td>
        
          <td>
                <?php echo $result2['answer']; ?>
                <!-- <?php
                //if()
                ?> -->
                <!-- <i>correct</i> -->
              </td>
              <td>
                <?php
                $query3 = "SELECT * FROM answer_key WHERE question_number = '".$result2['question_number']."' and key_answer = '".$result2['answer']."'";
                $getdata3 = mysqli_query($db,$query3);
                while( $result3 = mysqli_fetch_array($getdata3)){
                  if ($result3>0) {
                    $cor[] = '<p>&#10003</p>';
                    $cor1 = '<p>&#10003</p>';
                    echo $cor1;
                  }else{
                    echo 'Wrong';
                }

              }
                   
      ?>
              </td>
              
      </tr>  
      <?php
    }
      ?>
    </tbody>
  </table>
  <h4>Total of Correct Answer: <?php echo count($cor); ?></h4>
      <?php
$queryyy = "SELECT * FROM summary WHERE stud_id='".$_SESSION['id']."' group by stud_id";
                $getdataaa = mysqli_query($db,$queryyy);
                 $resulttt = mysqli_fetch_array($getdataaa);
                  if ($resulttt>0) {
                    echo '';
                  }else{

$qualresult = count($cor);

$queryinsert = "INSERT INTO `summary`(`stud_id`, `qualifying_result`) VALUES ('".$_SESSION['id']."','".$qualresult."')";
     mysqli_query($db,$queryinsert)or die ('Error in updating Database');
}
      }else{
        ?>


        <div class="container">
          <div class="card card-login mx-auto mt-5">
            <script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
<form name="cd">
<input type="hidden" name="" id="timeExamLimit" value="60">
<label>Remaining Time : </label>
            <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
          </form>
<div id="content-wrapper">

        <div class="container-fluid">
 <h2>Please Select The Correct Answer</h2> 
            <div class="card-body">
              <form method="post" id="submitAnswerFrm">
                <input type="hidden" name="examAction" id="examAction" >
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Question #</th>
      <th scope="col">Answer</th>
    </tr>
  </thead>
  <tbody>
    <?php
        for($i=1;$i<=50;$i++){
        ?>
      <tr>
        <td>
         <?php
         echo $i;
         ?>
        </td>
        
          <td>
                <input type="radio" name="answer[<?php echo $i; ?>]" value="A">A
                <input type="radio" name="answer[<?php echo $i; ?>]" value="B">B
                <input type="radio" name="answer[<?php echo $i; ?>]" value="C">C
                <input type="radio" name="answer[<?php echo $i; ?>]" value="D">D
              </td>
              
      </tr>  
      <?php
}
              ?>
    <tr>
              <td colspan="4" class="text-center">
                <input onclick="return confirm('Are you sure you want to submit now?')" type="submit" name="submit" class="btn btn-primary px-5" value="Submit">
              </td>
            </tr> 
  </tbody>
</table>
</form>
<?php
if (isset($_POST['submit'])) {
  $cur_date = date('Y-m-d');
  $answer = $_POST['answer'];


  foreach ($answer as $ans_key => $ans_value) {
      if ($ans_value == "A") {
        $stu_query = "INSERT INTO student_answer(stud_id ,question_number,answer  ,date_taken) VALUES('".$_SESSION['id']."', '$ans_key', 'A','$cur_date')";
        $data_insert = mysqli_query($db,$stu_query);
        ?>
        <script type="text/javascript">
          alert('Exam Record Successfully!');
          window.location='manageexam.php';
        </script>
        <?php
      } elseif ($ans_value == "B") {
        $stu_query = "INSERT INTO student_answer(stud_id ,question_number,answer  ,date_taken) VALUES('".$_SESSION['id']."', '$ans_key', 'B','$cur_date')";
        $data_insert = mysqli_query($db,$stu_query);
        ?>
        <script type="text/javascript">
          alert('Exam Record Successfully!');
          window.location='manageexam.php';
        </script>
        <?php
      }elseif ($ans_value == "C") {
        $stu_query = "INSERT INTO student_answer(stud_id ,question_number,answer  ,date_taken) VALUES('".$_SESSION['id']."', '$ans_key', 'C','$cur_date')";
        $data_insert = mysqli_query($db,$stu_query);
        ?>
        <script type="text/javascript">
          alert('Exam Record Successfully!');
          window.location='manageexam.php';
        </script>
        <?php
      }elseif ($ans_value == "D") {
        $stu_query = "INSERT INTO student_answer(stud_id ,question_number,answer  ,date_taken) VALUES('".$_SESSION['id']."', '$ans_key', 'D','$cur_date')";
        $data_insert = mysqli_query($db,$stu_query);
        ?>
        <script type="text/javascript">
          alert('Exam Record Successfully!');
          window.location='manageexam.php';
        </script>
        <?php
      }
    }
}
}
?>
              </div>
              </div>
              </div>
            </div>
          </div>
          <br>
          <br>
              <?php
            }
}
              include('include/scripts.php');
       include('include/footer.php');
       
        ?>
 
