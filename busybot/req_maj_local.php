<?php
include('../functions.php');
include('connexion_db.php');

$reqmajLocal = "UPDATE Local SET idLOCAL = '" . $_POST['idLOCAL'] . "', Code = '" . $_POST['Code'] . "', Lieu = '" . $_POST['Lieu'] . "' WHERE idLOCAL = '" . $_POST['idLOCAL'] . "'";
mysqli_query($bd_busybot, $reqmajLocal);

header('Location: gest_local.php');
$mysqli_close($bd_busybot);
?>
 
 
