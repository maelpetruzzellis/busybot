<?php
include('connexion_db.php');
$requeteDel =  "DELETE FROM Centrale WHERE idCENTRALE=" . $_GET['id'];
mysqli_query($bd_busybot, $requeteDel);
header('Location: gest_centrale.php');
?>
