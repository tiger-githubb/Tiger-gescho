 <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-toolbox"></i>
                  </div>
                  <div class="mr-5">Total of Tools</div><?php
                    $query = "SELECT count(*) from tools";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result); 
                   echo "(".$row[0].")"; 
                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="tools.php">
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
                    <i class="fas fa-fw fa-truck"></i>
                  </div>
                  <div class="mr-5">Total of Equipments</div><?php
                    $query = "SELECT count(*) from equipments";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result); 
                   echo "(".$row[0].")"; 
                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="equipments.php">
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
                    <i class="fas fa-fw fa-toolbox"></i>
                  </div>
                  <div class="mr-5">Total of Borrowed Tools</div><?php
                    $query = "SELECT count(*) from borrowed_tools";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result); 
                   echo "(".$row[0].")"; 
                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="borrowed_tool.php">
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
                    <i class="fas fa-fw fa-truck"></i>
                  </div>
                  <div class="mr-5">Total of Borrowed Equipments</div><?php
                    $query = "SELECT count(*) from equip_mapping";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result); 
                   echo "(".$row[0].")"; 
                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="borrowed_equip.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
