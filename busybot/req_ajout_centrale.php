<?php
include('../functions.php');
include('connexion_db.php');

$reqpost_centrale = "INSERT INTO Centrale VALUES('" . $_POST['idCENTRALE'] . "', '" . $_POST['Adresse_IP'] . "', '" . $_POST['type'] . "', '" . $_POST['Camera'] . 
            "', '" . $_POST['idLOCAL'] . "')";
mysqli_query($bd_busybot, $reqpost_centrale);

header('Location: gest_centrale.php');
$mysqli_close($bd_busybot);
?> 
