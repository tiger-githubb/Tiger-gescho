 <!-- Sidebar -->
 <?php if (isset($_GET['Exam'])) { 
      if ($_GET['Exam'] == 'On') {
        # code...

  ?>
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a onclick="return confirm('Vraiment?')" class="nav-link" href="index.php?Exam=Off">
            <i class="fas fa-fw fa-home"></i>
            <span></span>
          </a>
        </li>
        <li class="nav-item active">
          <a onclick="return confirm('Vraiment?')" class="nav-link" href="new.php?Exam=Off">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Definir Horaires des examens </span>
          </a>
        </li>
  <?php }else{ ?>

        <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span></span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="new.php">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Definir Horaires des examens </span>
          </a>
        </li>
        

  <?php } 
          }else{ ?>

            <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?Exam=Off">
            <i class="fas fa-fw fa-home"></i>
            <span></span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="new.php?Exam=Off">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Definir Horaires des examens </span>
          </a>
        </li>
        <li class="nav-item active">
          <a onclick="return confirm('Êtes-vous sûr de vouloir passer cet examen maintenant, votre temps commencera automatiquement?')" class="nav-link" href="manageexam.php?Exam=On" id="startQuiz">
            <i class="fas fa-fw fa-key"></i>
            <span>Passer un examen</span>
          </a>
        </li>
      </ul>

        <?php } ?>
        <!-- <?php
       // $query = //"SELECT s.sched_id,e.name,e.examinee_code,s.dateofexam,s.timeofexam,s.status from exam_schedule s,student e where e.stud_id = s.stud_id AND s.stud_id = '".$_SESSION['id']."'";
                   // $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                    //  $row = mysqli_fetch_assoc($result);
                   //   date_default_timezone_set('Asia/karachi');
                    //  $time =  date('h:i');
                    //  $cur_date = date('Y-m-d');

                    //  if ($row['dateofexam']==$cur_date) {
                        ?>  -->
        
       <!-- <?php
                      //}else{
                       
       // echo '';
        
                 //     }
                      ?>  -->
      </ul>