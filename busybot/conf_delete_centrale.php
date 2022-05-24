<?php
include('../functions.php');
include('connexion_db.php');      
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<title>BUSYBOT V4 | Confirmation suppression centrale</title>
	</head>
	<body>
	
    <!--Menu d'en tête-->
	<div class="header">
        <img class="left" src="img/cdf.png" width="100"></img>
        <img class="right" src="img/cdf.png" width="100"></img>
        <h1 class="titreprojet" align="center"><a href="index.php">BUSYBOT 2022</a></h1>
            <nav align="center" class="menu-nav">
                <ul>
                    <li class="btn">
                        <a href="gest_centrale.php">
                            GESTION DES CENTRALES
                        </a>
                    </li>
                    <li class="btn">
                        <a href="gest_evenement.php">
                            GESTION DES EVENEMENTS
                        </a>
                    </li>
                    <li class="btn">
                        <a href="gest_local.php">
                            GESTION DES LOCAUX
                        </a>
                    </li>
                    <li class="btn">
                        <a href="gest_personnel.php">
                            GESTION DU PERSONNEL
                        </a>
                    </li>
                </ul>
            </nav><br /><br /><br />
    </div><br /><br />
	
		<h1 align="center">Suppression</h1>
		<p align="center">VOULEZ VOUS VRAIMENT SUPPRIMER CETTE CENTRALE ?</p>
		<table align="center">
            <tr>
                <td align="center">ID</td>
                <td align="center">Adresse IP</td>
                <td align="center">Type</td>

            </tr>
            <tr>
                <td><? echo $_GET['id'] ?></td>
                <td><? echo $_GET['adresseip'] ?></td>
                <td><? echo $_GET['type'] ?></td>
            </tr>
		</table><br />
		
    <!--CONFIRMATION OUI / NON-->
    <p value="delete"><a href="req_suppression_centrale.php?id=<?= $_GET['id'] ?>">OUI</a><p/>
    <p value="noDelete"><a href="req_nosuppression_centrale.php?id=<?= $_GET['id'] ?>">NON</a><p/>

    <!--Pied de page-->
    <footer>
        PROJET BUSYBOT SNIR2 2021-2022
    </footer>
		
	</body> 
</html>

<?php
    $mysqli_close($bd_busybot);
?>
 
