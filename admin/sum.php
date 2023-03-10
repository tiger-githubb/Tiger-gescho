<?php
       include('include/connect.php');
       include('include/header.php');
       include('include/sidebar1.php')
       
        ?>
<div id="content-wrapper">

        <div class="container-fluid">
           <!-- <span id="divToPrint" style="width: 100%;"> -->
 <h2>Sommaire</h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Student</th>
                      <th>Entrance Score</th>
                      <th>General Average</th>
                      <th>Qualifying Result</th>
                      <th>Interview</th>
                      <th>Total Average</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT s.stud_id,concat(s.fname,' ',s.lname) as 'name',s.raw_score,sum.general_ave,sum.entrance_score,sum.qualifying_result,sum.interview,sum.total from summary sum,student s where s.stud_id = sum.stud_id";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                             echo '<td>'. $row['name'].'</td>';
                             echo '<td>'.$row['entrance_score'].'</td>';
                              echo '<td>'. $row['general_ave'].'</td>';
                               echo '<td>'. $row['qualifying_result'].'</td>';
                               echo '<td>'. $row['interview'].'</td>';
                               echo '<td>'. $row['total'].'</td>';
                            echo '</td> ';
                            echo '<td><a type="button" class="btn btn-sm btn-warning fas fa-pencil-alt" href="#" data-toggle="modal" data-target="#AddRes'.$row['stud_id'].'">Modify Result</a>';
                               ?>
 <div id="AddRes<?php echo $row['stud_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Modify Result</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" readonly="" id="inputName1" class="form-control" placeholder="Name" name="name" value="<?php echo $row['name']; ?>" autofocus="autofocus" required>
                            <input type="hidden" id="inputName1" class="form-control" name="id" value="<?php echo $row['stud_id']; ?>" autofocus="autofocus" required>
                            <label for="inputName1">Name</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="number" id="inputAge1" class="form-control" placeholder="Age" readonly="" name="entrance" value="<?php echo $row['raw_score']; ?>" required>
                            <label for="inputAge1">Entrance Score</label>
                            </div>
                            </div>
                            <?php
                            $gensql = "SELECT creteria FROM criteria WHERE title='General Average' AND is_default = 'Yes'";
                            $genresults = mysqli_query($db, $gensql) or die (mysqli_error($db));
                            $genrows = mysqli_fetch_assoc($genresults); 
                            $gen = $row['general_ave'] / $genrows['creteria'];
                            ?>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="number" value="<?php echo $gen; ?>" id="inputAddress1<?php echo $row['stud_id']; ?>" class="form-control" placeholder="Address" name="gen_av" required>
                            <label for="inputAddress1<?php echo $row['stud_id']; ?>">General Average</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputContact1<?php echo $row['stud_id']; ?>" class="form-control" placeholder="Contact Number" readonly="" value="<?php echo $row['qualifying_result']; ?>" name="contact" required>
                            <label for="inputContact1<?php echo $row['stud_id']; ?>">Qualifying Result</label>
                            </div>
                            </div>
                            <?php
                            $intsql = "SELECT creteria FROM criteria WHERE title='Interview' AND is_default = 'Yes'";
                            $intresults = mysqli_query($db, $intsql) or die (mysqli_error($db));
                            $introws = mysqli_fetch_assoc($intresults); 
                            $int = $row['interview'] / $introws['creteria'];
                            ?>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="number" value="<?php echo $int; ?>" id="inputContact2<?php echo $row['stud_id']; ?>" class="form-control" placeholder="Contact Number" name="interview" required>
                            <label for="inputContact2<?php echo $row['stud_id']; ?>">Interview Result</label>
                            </div>
                            </div>
                            
                          
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Close
                      <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                    <input type="submit" name="update" value="Submit Result" class="btn btn-success">
                  </div>
                  </form>
               
</div>
</div>
              </div>
            </div>
            <?php

            if(isset($_POST['update'])){
              $id = $_POST['id'];
  $sql = "SELECT creteria FROM criteria WHERE title='Entrance Score' AND is_default = 'Yes'";
  $results = mysqli_query($db, $sql) or die (mysqli_error($db));
  $rows = mysqli_fetch_assoc($results); 
  $entrance = ($_POST['entrance'] + 50) * $rows['creteria'];

  $sql2 = "SELECT creteria FROM criteria WHERE title='General Average' AND is_default = 'Yes'";
  $results2 = mysqli_query($db, $sql2) or die (mysqli_error($db));
  $rows2 = mysqli_fetch_assoc($results2);
  $gen_av = $_POST['gen_av'] * $rows2['creteria'];

  $sql3 = "SELECT creteria FROM criteria WHERE title='Interview' AND is_default = 'Yes'";
  $results3 = mysqli_query($db, $sql3) or die (mysqli_error($db));
  $rows3 = mysqli_fetch_assoc($results3);
  $interview = $_POST['interview'] * $rows3['creteria'];

  $total = $entrance + $gen_av + $interview;


$sql4 = "SELECT sy_id FROM schoolyear WHERE is_default='Yes'";
  $results4 = mysqli_query($db, $sql4) or die (mysqli_error($db));
  $rows4 = mysqli_fetch_assoc($results4);
  $query = "UPDATE `summary` SET `entrance_score`='$entrance',`general_ave`='$gen_av',`interview`='$interview',`total`='$total',sy_id = '".$rows4['sy_id']."' WHERE `stud_id`='$id'";
                mysqli_query($db,$query)or die (mysqli_error($db));

                ?>
                <script type="text/javascript">
      alert("Results Updated Successfully!.");
      window.location = "sum.php";
    </script>
    <?php
}
                            echo '</td> ';
                            echo '</tr> ';

                               
                        }
                        
            ?> 
           
                </table>
             </div> 
              </div>
            </div>
         </div>
              <?php

              include('include/scripts.php');
       include('include/footer.php');
       
        ?> 