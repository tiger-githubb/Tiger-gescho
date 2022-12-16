<?php
       include('include/connect.php');
       include('include/header.php');
       include('include/sidebar1.php')
       
        ?>
<div id="content-wrapper">

        <div class="container-fluid">
 <h2>List of School Year<a class="btn btn-sm btn-info fas fa-plus" href="#" data-toggle="modal" data-target="#Add">Add New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>School Year</th>
                      <th>Is Default</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT * FROM schoolyear";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                             echo '<td>'. $row['school_year'].'</td>';
                             echo '<td>'. $row['is_default'].'</td>';
                               echo " ";
                               echo '<td><a type="button" class="btn btn-sm btn-warning fas fa-pencil-alt" href="#" data-toggle="modal" data-target="#Update'.$row['sy_id'].'">Modify</a>';
                               ?>
 <div id="Update<?php echo $row['sy_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Modify School Year</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="hidden" value="<?php echo $row['sy_id'] ?>" class="form-control" placeholder="Title" name="id" autofocus="autofocus" required>
                            <input type="text" id="inputtitle" value="<?php echo $row['school_year'] ?>" class="form-control" readonly="" placeholder="Title" name="sy" autofocus="autofocus" required>
                            <label for="inputtitle">School Year</label>
                            </div>
                            </div>
                            <label>Is Default</label>
                            <div class="form-group">
                            <div class="form-label-group">
                            <select class="form-control" name="status">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                            </div>
                            </div>
                           
                            
                          
                 
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
  //$sy = $_POST['sy'];
  $status = $_POST['status'];

if($_POST['status']=='Yes'){
                $query1 = "UPDATE `schoolyear` SET `is_default`='No' WHERE `is_default`='Yes' and sy_id !='$id'";
                mysqli_query($db,$query1)or die (mysqli_error($db));
                $query = "UPDATE `schoolyear` SET `is_default`='$status' WHERE `sy_id`='$id'";
                mysqli_query($db,$query)or die (mysqli_error($db));
                $query2 = "UPDATE `criteria` SET `is_default`='No' WHERE `is_default`='Yes' and sy_id !='$id'";
                mysqli_query($db,$query2)or die (mysqli_error($db));
                $query3 = "UPDATE `criteria` SET `is_default`='$status' WHERE sy_id ='$id'";
                mysqli_query($db,$query3)or die (mysqli_error($db));
              }else{       
           $query = "UPDATE `schoolyear` SET `is_default`='$status' WHERE `sy_id`='$id'";
                mysqli_query($db,$query)or die (mysqli_error($db)); 
                $query2 = "UPDATE `criteria` SET `is_default`='$status' WHERE  sy_id ='$id'";
                mysqli_query($db,$query2)or die (mysqli_error($db));
              }
                ?>
                <script type="text/javascript">
      alert("School Year Updated Successfully!.");
      window.location = "schoolyear.php";
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
              <div id="Add" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Add New School Year</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputtitle1" class="form-control" placeholder="Title" name="sy" autofocus="autofocus" required>
                            <label for="inputtitle1">School Year</label>
                            </div>
                            </div>
                            <label>Is Default</label>
                            <div class="form-group">
                            <div class="form-label-group">
                            <select class="form-control" name="status">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                            </div>
                            </div>
                           
                            
                          
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Close
                      <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                    <input type="submit" name="submit" value="Save" class="btn btn-success">
                  </div>
                  </form>
               
</div>
</div>
              </div>
            </div>
              <?php
if(isset($_POST['submit'])){

$return = "SELECT * FROM schoolyear where school_year = '".$_POST['sy']."' OR is_default = '".$_POST['status']."'";
$resulta = mysqli_query($db, $return) or die (mysqli_error($db));
$rowa = mysqli_fetch_assoc($resulta);

if($rowa>0){
  ?>
    <script type="text/javascript">
    alert("School Year Or Status Already Exist!.");
    window.location = "schoolyear.php";
    </script>
    <?php
}else{
  $sy = $_POST['sy'];
  $status = $_POST['status'];

  $query = "INSERT INTO schoolyear(school_year,is_default)
                VALUES ('".$sy."','".$status."')";
                mysqli_query($db,$query)or die (mysqli_error($db));

                ?>
                <script type="text/javascript">
      alert("New School Year Added Successfully!.");
      window.location = "schoolyear.php";
    </script>
    <?php
}
}

              include('include/scripts.php');
       include('include/footer.php');
       
        ?>