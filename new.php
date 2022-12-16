<?php
       include('include/connect.php');
       include('include/header.php');
       include('include/sidebar1.php')
       
        ?>
<div id="content-wrapper">
<?php
$query = "SELECT * FROM `exam_schedule` WHERE stud_id = '".$_SESSION['id']."'";
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
  $row = mysqli_fetch_assoc($result);
if($row==0){
  ?>
        <div class="container-fluid">
 <h2>Add Schedule</h2> 
            <div class="card-body">
                      
                        
                          <form method="POST" action="#"> 
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputdate3" class="form-control" value="<?php echo $_SESSION['code']; ?>" readonly placeholder="Examinnee ID#" name="code" required>
                            <label for="inputdate3">Examinnee ID#</label>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="date" id="inputdate" class="form-control" placeholder="Date of Exam" name="date" required>
                            <label for="inputdate">Date Of Exam</label>
                            </div>
                            </div>
                          </div>
                          Time:
                          <div class="col-md-2">
                            <div class="form-group">
                            <select  name="time" class="form-control" style="height : 53px;">
                              <option value="8:00 AM">8:00 AM</option>
                              <option value="9:00 AM">9:00 AM</option>
                              <option value="10:00 AM">10:00 AM</option>
                              <option value="1:00 PM">1:00 PM</option>
                              <option value="2:00 PM">2:00 PM</option>
                              <option value="3:00 PM">3:00 PM</option>
                            </select>
                            </div>
                          </div>
                        </div>
                            
                          
                 <div class="col-md-12">
                  <div class="modal-footer">
                    <input type="submit" name="save" value="Save" class="btn btn-success">
                  </div>
                </div>
                  </form>
                  <?php
if (isset($_POST['save'])) {
  $date = $_POST['date'];
  $time = $_POST['time'];
  $code = $_POST['code'];

  $query = "INSERT INTO `exam_schedule`(`stud_id`,`dateofexam`, `timeofexam`,`examinee_code`, `status`) VALUES ('".$_SESSION['id']."','".$date."','".$time."','".$code."','Pending')";
     mysqli_query($db,$query)or die ('Error in updating Database');

                         ?>
    <script type="text/javascript">
      alert("Your Schedule Has Been Added Successfully!.");
      window.location = "new.php";
    </script>
                         <?php
                       }
                       }else{
                  
                  ?>
               <hr>
<!-- <div id="content-wrapper"> -->
 <h2>List of Your Reserved Schedule(s)</h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date Of Exam</th>
                      <th>Time Of Exam</th>
                      <th>Examinee Code</th>
                      <th>Status</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT s.sched_id,e.fname,e.lname,e.examinee_code,s.dateofexam,s.timeofexam,s.status from exam_schedule s,student e where e.stud_id = s.stud_id AND s.stud_id = '".$_SESSION['id']."'";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                             echo '<td>'. $row['dateofexam'].'</td>';
                             echo '<td>'. $row['timeofexam'].'</td>';
                              echo '<td>'. $row['examinee_code'].'</td>';
                              if($row['status']=='Rescheduled'){
                                echo '<td>Your Schedule Has Been Rescheduled Due to Conflict or Date are not Available! Click Confirm If you agree.</td>';
                              }else{
                               echo '<td>'. $row['status'].'</td>';
                             }
                               if($row['status']=='Confirmed'){
                                echo '<td><a type="button" class="btn btn-sm btn-info fas fa-eye" href="#" data-toggle="modal" data-target="#View'.$row['sched_id'].'">View Details</a></td>';
                                ?>
                                <div id="View<?php echo $row['sched_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Please Take Note Of Your Schedule</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="idnum" class="form-control" placeholder="Name" readonly name="code" value="<?php echo $row['examinee_code']; ?>" autofocus="autofocus" required>
                            <!-- <input type="hidden" id="idnum" class="form-control" name="id" value="<?php //echo $row['emp_id']; ?>" autofocus="autofocus" required> -->
                            <label for="idnum">Examinee ID#</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputName1" class="form-control" placeholder="Name" readonly name="name" value="<?php echo $row['fname'].' '.$row['lname']; ?>" autofocus="autofocus" required>
                            <input type="hidden" id="inputName1" class="form-control" name="schedid" value="<?php echo $row['sched_id']; ?>" autofocus="autofocus" required>
                            <label for="inputName1">Examinee</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="date" id="inputAge1" class="form-control" readonly placeholder="Age" name="dateofexam" value="<?php echo $row['dateofexam']; ?>" required>
                            <label for="inputAge1">Date Of Exam</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="time" id="inputAddress1" class="form-control" readonly placeholder="Address" value="<?php echo $row['timeofexam']; ?>" name="timeofexam" required>
                            <label for="inputAddress1">Time Of Exam</label>
                            </div>
                            </div>
                            <!-- <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputContact1" class="form-control" placeholder="Contact Number" value="<?php //echo $row['contact_number']; ?>" name="contact" required>
                            <label for="inputContact1">Contact Number</label>
                            </div>
                            </div> -->
                            
                          
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Close
                      <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                  </div>
                  </form>
               
</div>
</div>
              </div>
            </div>
                                <?php
                              }elseif($row['status']=='Rescheduled'){
                                echo '<td><a type="button" class="btn btn-sm btn-info fas fa-thumbs-up" href="confirm.php?schedid='.$row['sched_id'].'">Confirm</a></td>';

                               }else{
                               echo '<td><a type="button" class="btn btn-sm btn-warning fas fa-pencil-alt" href="#" data-toggle="modal" data-target="#UpdateSched'.$row['sched_id'].'">Edit</a></td>';
                               echo '</tr>';
                               ?>
                               <div id="UpdateSched<?php echo $row['sched_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Update</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="idnum" class="form-control" placeholder="Name" readonly name="code" value="<?php echo $row['examinee_code']; ?>" autofocus="autofocus" required>
                            <!-- <input type="hidden" id="idnum" class="form-control" name="id" value="<?php //echo $row['emp_id']; ?>" autofocus="autofocus" required> -->
                            <label for="idnum">Examinee ID#</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputName1" class="form-control" placeholder="Name" readonly name="name" value="<?php echo $row['fname'].' '.$row['lname']; ?>" autofocus="autofocus" required>
                            <input type="hidden" id="inputName1" class="form-control" name="schedid" value="<?php echo $row['sched_id']; ?>" autofocus="autofocus" required>
                            <label for="inputName1">Examinee</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="date" id="inputAge1" class="form-control" placeholder="Age" name="dateofexam" value="<?php echo $row['dateofexam']; ?>" required>
                            <label for="inputAge1">Date Of Exam</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="time" id="inputAddress1" class="form-control" placeholder="Address" value="<?php echo $row['timeofexam']; ?>" name="timeofexam" required>
                            <label for="inputAddress1">Time Of Exam</label>
                            </div>
                            </div>
                            <!-- <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputContact1" class="form-control" placeholder="Contact Number" value="<?php //echo $row['contact_number']; ?>" name="contact" required>
                            <label for="inputContact1">Contact Number</label>
                            </div>
                            </div> -->
                            
                          
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Close
                      <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                    <input type="submit" name="update" value="Update" class="btn btn-success">
                  </div>
                  </form>
               
</div>
</div>
              </div>
            </div>
            <?php

            if(isset($_POST['update'])){
              $id = $_POST['id'];
  $dateofexam = $_POST['dateofexam'];
  $timeofexam = $_POST['timeofexam'];
  $schedid = $_POST['schedid'];
 // $contact = $_POST['contact'];

  $query = "UPDATE `exam_schedule` SET `dateofexam`='$dateofexam',`timeofexam`='$timeofexam' WHERE `sched_id`='$schedid'";
                mysqli_query($db,$query)or die (mysqli_error($db));

                ?>
                <script type="text/javascript">
      alert("Schedule Updated Successfully!.");
      window.location = "new.php";
    </script>
    <?php
  }
            }
          }
            ?>
          </table>
        </div>
      </div>
    </div>
  <!-- </div> -->
            <?php
          }
              include('include/scripts.php');
       include('include/footer.php');
       
        ?>