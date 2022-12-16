<?php
       include('include/connect.php');
       include('include/header.php');
       include('include/sidebar1.php')
       
        ?>
<div id="content-wrapper">

        <div class="container-fluid">
 <h2>List of Creteria<a class="btn btn-sm btn-info fas fa-plus" href="#" data-toggle="modal" data-target="#Add">Add New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Criteria</th>
                      <th>School Year</th>
                      <th>Is Default</th>
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT c.creteria_id,c.title,c.creteria,s.school_year,c.is_default FROM criteria c JOIN schoolyear s ON s.sy_id = c.sy_id";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {                 
                            echo '<tr>';
                             echo '<td>'. $row['title'].'</td>';
                             echo '<td>'. $row['creteria'].'</td>';
                             echo '<td>'. $row['school_year'].'</td>';
                             echo '<td>'. $row['is_default'].'</td>';
                               echo " ";
                               // echo '<td><a type="button" class="btn btn-sm btn-warning fas fa-pencil-alt" href="#" data-toggle="modal" data-target="#update'.$row['creteria_id'].'">Modify</a>';
                               ?>
 <div id="update<?php echo $row['creteria_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Modify Creteria</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="hidden" class="form-control" placeholder="Title" name="id" autofocus="autofocus" value="<?php echo $row['creteria_id'];?>" required>
                            <input type="text" id="inputtitle" class="form-control" placeholder="Title" name="title" autofocus="autofocus" value="<?php echo $row['title'];?>" required>
                            <label for="inputtitle">Title</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputtitle1" class="form-control" placeholder="Criteria" name="criteria" value="<?php echo $row['creteria'];?>" autofocus="autofocus" required>
                            <label for="inputtitle1">Criteria</label>
                            </div>
                            </div>
                            <label>--Select School Year--</label>
                            <div class="form-group">
                            <div class="form-label-group">
                            <select class="form-control" name="sy_id">
                              <?php
                            $sql = "SELECT * FROM schoolyear WHERE is_default = 'Yes'";
                            $results = mysqli_query($db, $sql) or die (mysqli_error($db));
                  
                       
                          ?>
                              <?php  while ($rows = mysqli_fetch_assoc($results)) { ?>
                              <option value="<?php echo $rows['sy_id']; ?>"><?php echo $rows['school_year']; ?></option>
                            <?php } ?>
                            </select>
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
 $title = $_POST['title'];
  $criteria = $_POST['criteria'];
  $sy_id = $_POST['sy_id'];
  $status = $_POST['status'];

  $query = "UPDATE `criteria` SET `title`='$title',`creteria`='.$criteria',`creteria_whole`='$criteria',`sy_id`='$sy_id',`is_default`='$status' WHERE `creteria_id`='$id'";
                mysqli_query($db,$query)or die (mysqli_error($db));

                ?>
                <script type="text/javascript">
      alert("Criteria Updated Successfully!.");
      window.location = "creteria.php";
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
                  <div class="modal-header"><h3>Add New Criteria</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                          <form method="POST" action="#">
                            <label>--Select Title--</label>
                            <div class="form-group">
                            <div class="form-label-group">
                            <select class="form-control" name="title">
                              <option value="Entrance Score">Entrance Score</option>
                              <option value="General Average">General Average</option>
                              <option value="Interview">Interview</option>
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="inputtitle11" class="form-control" placeholder="Criteria" name="criteria" autofocus="autofocus" required>
                            <label for="inputtitle11">Criteria</label>
                            </div>
                            </div>
                            <label>--Select School Year--</label>
                            <div class="form-group">
                            <div class="form-label-group">
                            <select class="form-control" name="sy_id">
                              <?php
                            $sql = "SELECT * FROM schoolyear WHERE is_default = 'Yes'";
                            $results = mysqli_query($db, $sql) or die (mysqli_error($db));
                  
                       
                          ?>
                              <?php  while ($rows = mysqli_fetch_assoc($results)) { ?>
                              <option value="<?php echo $rows['sy_id']; ?>"><?php echo $rows['school_year']; ?></option>
                            <?php } ?>
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
$return = "SELECT * FROM criteria where title = '".$_POST['title']."' AND sy_id = '".$_POST['sy_id']."'";
$resulta = mysqli_query($db, $return) or die (mysqli_error($db));
$rowa = mysqli_fetch_assoc($resulta);

if($rowa>0){
  ?>
    <script type="text/javascript">
    alert("Title Already Exist!.");
    window.location = "schoolyear.php";
    </script>
    <?php
}else{
  $title = $_POST['title'];
  $criteria = $_POST['criteria'];
  $sy_id = $_POST['sy_id'];
  $status = $_POST['status'];

  $query = "INSERT INTO criteria(title,creteria,creteria_whole,sy_id,is_default)
                VALUES ('".$title."','.".$criteria."','".$criteria."','".$sy_id."','Yes')";
                mysqli_query($db,$query)or die (mysqli_error($db));

                ?>
                <script type="text/javascript">
      alert("New Criteria Added Successfully!.");
      window.location = "creteria.php";
    </script>
    <?php
  }
}

              include('include/scripts.php');
       include('include/footer.php');
       
        ?>