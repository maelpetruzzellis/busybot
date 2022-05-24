<?php
include('../functions.php');
include('connexion_db.php');

$reqpostLocal = "INSERT INTO Local VALUES('" . $_POST['idLOCAL'] . "', '" . $_POST['Code'] . "', '" . $_POST['Lieu'] . "')";
mysqli_query($bd_busybot, $reqpostLocal);

header('Location: gest_local.php');
$mysqli_close($bd_busybot);
?>
 
