<?php
       include('include/connect.php');
       include('include/header.php');
       include('include/sidebar1.php')
       
        ?>
<div id="content-wrapper">

        <div class="container-fluid">
 <h2>List of Answer Key</h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Exam #</th>
                      <th>Key Answer</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT * FROM answer_key";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                             echo '<td>'. $row['question_number'].'</td>';
                             echo '<td>'. $row['key_answer'].'</td>';
                               echo " ";
                               echo '<td><a type="button" class="btn btn-sm btn-warning fas fa-pencil-alt" href="#" data-toggle="modal" data-target="#Update'.$row['key_id'].'">Modify</a>';
                               ?>
 <div id="Update<?php echo $row['key_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>Modify Key Answer</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                            <div class="form-label-group">
                            <input type="hidden" value="<?php echo $row['key_id'] ?>" class="form-control" placeholder="Title" name="id" autofocus="autofocus" required>
                            <input type="text" id="inputtitle" value="<?php echo $row['key_answer'] ?>" class="form-control" placeholder="Title" name="key" autofocus="autofocus" required>
                            <label for="inputtitle">Key Answer</label>
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
  $key = $_POST['key'];


          
                $query2 = "UPDATE `answer_key` SET `key_answer`='$key' WHERE  key_id ='$id'";
                mysqli_query($db,$query2)or die (mysqli_error($db));
              
                ?>
                <script type="text/javascript">
      alert("Answer Key Updated Successfully!.");
      window.location = "key.php";
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
              
    <?php

              include('include/scripts.php');
       include('include/footer.php');
       
        ?>