 <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5">Total of Registered Examinee's</div><?php
                    $query = "SELECT count(*) from student";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result); 
                   echo "(".$row[0].")"; 
                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="examinee.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-calendar"></i>
                  </div>
                  <div class="mr-5">Total of Confirm Schedule's</div><?php
                    $query = "SELECT count(*) from exam_schedule WHERE status = 'Confirmed'";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result); 
                   echo "(".$row[0].")"; 
                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="examsched.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-calendar"></i>
                  </div>
                  <div class="mr-5">Total of Pending Schedule's</div><?php
                    $query = "SELECT count(*) from exam_schedule WHERE status = 'Pending'";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result); 
                   echo "(".$row[0].")"; 
                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="examsched.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-calendar"></i>
                  </div>
                  <div class="mr-5">Total of Reschedule Schedule's</div><?php
                    $query = "SELECT count(*) from exam_schedule WHERE status = 'Rescheduled'";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result); 
                   echo "(".$row[0].")"; 
                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="examsched.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
