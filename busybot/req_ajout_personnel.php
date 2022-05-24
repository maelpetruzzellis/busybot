<?php
include('../functions.php');
include('connexion_db.php');

$reqpost = "INSERT INTO Personne VALUES('" . $_POST['idPERSONNE'] . "', '" . $_POST['Nom'] . "', '" . $_POST['Prenom'] . "', '" . $_POST['Fonction'] . 
            "', '" . $_POST['Mail'] . "', '" . $_POST['Telephone'] . "', '" . $_POST['idLOCAL'] . "')";
mysqli_query($bd_busybot, $reqpost);

header('Location: gest_personnel.php');
$mysqli_close($bd_busybot);
?>
