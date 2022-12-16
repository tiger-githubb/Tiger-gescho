 <?php
 include('include/connect.php');
  $schedid = $_GET['schedid'];
 // $contact = $_POST['contact'];

  $query = "UPDATE `exam_schedule` SET `status`='Confirmed' WHERE `sched_id`='$schedid'";
                mysqli_query($db,$query)or die (mysqli_error($db));

                ?>
                <script type="text/javascript">
      alert("Schedule Updated Successfully!.");
      window.location = "examsched.php";
    </script>
   