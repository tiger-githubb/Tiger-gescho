<?php
       include('include/connect.php');
       include('include/header.php');
       include('include/sidebar1.php')
       
        ?>
<div id="content-wrapper">

        <div class="container-fluid">
 <h2>List of Examinee(s)</h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Examinee</th>
                      <th>Examinee ID #</th>
                      <th>Date Of Exam</th>
                      <th>Time Of Exam</th>
                      <th>Status</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT s.sched_id,e.stanine,e.picture,concat(e.fname,' ',e.lname) as 'name',e.examinee_code,s.dateofexam,s.timeofexam,s.status from exam_schedule s,student e where e.stud_id = s.stud_id";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                             echo '<td>'. $row['name'].'</td>';
                             echo '<td>'. $row['examinee_code'].'</td>';
                              echo '<td>'. $row['dateofexam'].'</td>';
                               echo '<td>'. $row['timeofexam'].'</td>';
                               echo '<td>'. $row['status'].'</td>';
                               echo " ";
                               echo '<td><a type="button" class="btn btn-sm btn-info fas fa-eye" href="#" data-toggle="modal" data-target="#view'.$row['examinee_code'].'">View Entrance Result</a>';
                               ?>
 <div id="view<?php echo $row['examinee_code'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Examinee</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                            <div class="form-group">
                            <div class="form-label-group">
                            <img alt="..." width="100%" height="50%" src="../images/<?php echo $row['picture']; ?>">
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="idnum" class="form-control" placeholder="Name" readonly name="code" value="<?php echo $row['examinee_code']; ?>" autofocus="autofocus" required>
                            <!-- <input type="hidden" id="idnum" class="form-control" name="id" value="<?php //echo $row['emp_id']; ?>" autofocus="autofocus" required> -->
                            <label for="idnum">Examinee ID#</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputName1" class="form-control" placeholder="Name" readonly name="name" value="<?php echo $row['name']; ?>" autofocus="autofocus" required>
                            <label for="inputName1">Examinee</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputName2" class="form-control" placeholder="Name" readonly name="staunine" value="<?php echo $row['stanine']; ?>" autofocus="autofocus" required>
                            <label for="inputName2">Stanine</label>
                            </div>
                            </div>
                            <!-- <div class="form-group">
                            <div class="form-label-group">
                            <input type="time" id="inputAddress1" class="form-control" placeholder="Address" value="<?php //echo $row['timeofexam']; ?>" name="timeofexam" required>
                            <label for="inputAddress1">Time Of Exam</label>
                            </div>
                            </div> -->
                            <!-- <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputContact1" class="form-control" placeholder="Contact Number" value="<?php //echo $row['contact_number']; ?>" name="contact" required>
                            <label for="inputContact1">Contact Number</label>
                            </div>
                            </div> -->
               
</div>
</div>
              </div>
            </div>
    <?php
                               if($row['status']=='Pending'){
                                echo '<a type="button" class="btn btn-sm btn-success fas fa-thumbs-up" href="confirm.php?schedid='.$row['sched_id'].'">Confirm</a>';
                                echo " ";
                                echo '<a type="button" class="btn btn-sm btn-warning fas fa-pencil-alt" href="#" data-toggle="modal" data-target="#reSched'.$row['sched_id'].'">Reschedule</a>';
                                  ?>
 <div id="reSched<?php echo $row['sched_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Reschedule</h3>
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
                            <input type="text" id="inputName1" class="form-control" placeholder="Name" readonly name="name" value="<?php echo $row['name']; ?>" autofocus="autofocus" required>
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

  $query = "UPDATE `exam_schedule` SET `dateofexam`='$dateofexam',`timeofexam`='$timeofexam',`status`='Rescheduled' WHERE `sched_id`='$schedid'";
                mysqli_query($db,$query)or die (mysqli_error($db));

                ?>
                <script type="text/javascript">
      alert("Schedule Updated Successfully!.");
      window.location = "examsched.php";
    </script>
    <?php
  }
                              }else if($row['status']=='Confirmed'){
                                echo '<i>Confirmed</i></td>';
                              }else if($row['status']=='Rescheduled'){
                                echo '<a type="button" class="btn btn-sm btn-warning fas fa-pencil-alt" href="#" data-toggle="modal" data-target="#reSched'.$row['sched_id'].'">Reschedule</a></td>';
                               }else{
                               echo '</td>';
                             
                            echo '</td> ';
                            echo '</tr> ';

                               
                        }
                      }
                        
            ?> 
           
                </table>
              </div>
              </div>
          <?php

              include('include/scripts.php');
       include('include/footer.php');
       
        ?>