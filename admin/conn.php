<?php
 $db = mysqli_connect("localhost","root","","chmscit1");

 if(mysqli_connect_errno())
 {
 	echo "Échec de la connexion à MySQL:".mysqli_connect_error();
 }
?>