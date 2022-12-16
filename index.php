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
                            // echo '<img src="admin/images/logo.png" alt="..." width="100%">';
                          }elseif($row<0){
                            echo '<img src="images/download.jpg" alt="..." width="100%">';
                          }
                          else{
       
        ?>
        <div class="container">
          <div class="card card-login mx-auto mt-5">
<div id="content-wrapper">

        <div class="container-fluid">
 <h2>Please Take Note Your Schedule</h2> 
            <div class="card-body">
              <div class="form-group">
                            <label>Examinee ID#</label><br>
                            <h3><i><?php echo $row['examinee_code']; ?></i></h3>
                            <!-- <input type="hidden" id="idnum" class="form-control" name="id" value="<?php //echo $row['emp_id']; ?>" autofocus="autofocus" required> -->
                            </div>
                            <div class="form-group">
                            <label>Examinee</label><br>
                            <h3><i><?php echo $row['name']; ?></i></h3>
                            <!-- <input type="hidden" id="idnum" class="form-control" name="id" value="<?php //echo $row['emp_id']; ?>" autofocus="autofocus" required> -->
                            </div>
                            <div class="form-group">
                            <label>Date Of Exam</label><br>
                            <h3><i><?php echo $row['dateofexam']; ?></i></h3>
                            <!-- <input type="hidden" id="idnum" class="form-control" name="id" value="<?php //echo $row['emp_id']; ?>" autofocus="autofocus" required> -->
                            </div>
                            <div class="form-group">
                            <label>Time Of Exam</label><br>
                            <h3><i><?php echo $row['timeofexam']; ?></i></h3>
                            <!-- <input type="hidden" id="idnum" class="form-control" name="id" value="<?php //echo $row['emp_id']; ?>" autofocus="autofocus" required> -->
                            </div>
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
 
