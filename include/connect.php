<?php
 $db = mysqli_connect('localhost', 'root', '') or
        die ('Impossible de se connecter.Vérifiez vos paramètres de connexion.');
        mysqli_select_db($db, 'chmscit1' ) or die(mysqli_error($db));
?>