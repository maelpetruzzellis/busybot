<?php
include('../functions.php');
include('connexion_db.php');

$reqmaj = "UPDATE Personne SET idPERSONNE = '" . $_POST['idPERSONNE'] . "', Nom = '" . $_POST['Nom'] . "', Prenom = '" . $_POST['Prenom'] . "', 
        Fonction = '" . $_POST['Fonction'] . "', Mail = '" . $_POST['Mail'] . "', Telephone = '" . $_POST['Telephone'] . "', idLOCAL = '" . $_POST['idLOCAL'] . "' WHERE idPERSONNE = '" . $_POST['idPERSONNE'] . "'";
mysqli_query($bd_busybot, $reqmaj);

header('Location: gest_personnel.php');
$mysqli_close($bd_busybot);
?>
 
