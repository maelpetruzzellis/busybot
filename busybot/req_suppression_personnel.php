<?php
include('connexion_db.php');
$requete =  "DELETE FROM Personne WHERE idPERSONNE=" . $_GET['id'];
mysqli_query($bd_busybot, $requete);
header('Location: gest_personnel.php');
?>
 
 
