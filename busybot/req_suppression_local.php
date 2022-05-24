<?php
include('connexion_db.php');
$requeteDel =  "DELETE FROM Local WHERE idLOCAL=" . $_GET['id'];
mysqli_query($bd_busybot, $requeteDel);
header('Location: gest_local.php');
?>
 
