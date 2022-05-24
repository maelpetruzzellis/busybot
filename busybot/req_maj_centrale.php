<?php
include('../functions.php');
include('connexion_db.php');

$reqmajCentrale = "UPDATE Centrale SET Adresse_IP = '" . $_POST['Adresse_IP'] . "', type = '" . $_POST['type'] . "', 
        Camera = '" . $_POST['Camera'] . "', idLOCAL = '" . $_POST['idLOCAL'] . "' WHERE idCENTRALE = '" . $_POST['idCENTRALE'] . "'";
mysqli_query($bd_busybot, $reqmajCentrale);

header('Location: gest_centrale.php');
$mysqli_close($bd_busybot);
?>
 
 
