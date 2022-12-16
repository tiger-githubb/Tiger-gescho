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
                <span id="divToPrint" style="width: 100%;">
                  <center><h2>List Of Examinee's Results</h2></center><br><br>
                <table width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Student</th>
                      <th>Entrance Score</th>
                      <th>General Average</th>
                      <th>Qualifying Result</th>
                      <th>Interview</th>
                      <th>Total Average</th>
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT s.stud_id,concat(s.fname,' ',s.lname) as 'name',s.raw_score,sum.general_ave,sum.entrance_score,sum.qualifying_result,sum.interview,sum.total from summary sum,student s where s.stud_id = sum.stud_id";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                             echo '<td>'. $row['name'].'</td>';
                             echo '<td class="bg-warning">'.$row['entrance_score'].'</td>';
                              echo '<td class="bg-warning">'. $row['general_ave'].'</td>';
                               echo '<td>'. $row['qualifying_result'].'</td>';
                               echo '<td class="bg-warning">'. $row['interview'].'</td>';
                               echo '<td class="bg-success">'. $row['total'].'</td>';
                            echo '</td> ';
                            echo '</tr> ';

                               
                        }
                        
            ?> 
           
                </table>
                </span>
                <br>
                 <div style="float: right;">    
               <a href="#" type="button" class="btn btn-xs btn-info fas fa-print" value="print" onclick="PrintDiv();"></a>
             </div> 
              </div>
            </div>
         </div>
          <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=800,height=800');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
              <?php

              include('include/scripts.php');
       include('include/footer.php');
       
        ?> 