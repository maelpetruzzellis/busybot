<?php
include('../functions.php');
include('connexion_db.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<title>BUSYBOT V4 | Evenement</title>
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
    </div><br />
	
        <h1 align="center">Gestion des évenements</h1>
        <p> <a href="index.php?">Retourner au menu principal</a>
        <table align="center">
            <tr>
                <td align=center><i>ID<i/></td>
                <td align=center><i>Horodatage</i></td>
                <td align=center><i>Type</i></td>
                <td align=center><i>Donnee</i></td>
                <td align=center><i>ID Centrale</i></td>
            </tr>
		<?php
		$mysqli = new mysqli("localhost", "root", "busybot", "bd_busybot");
		$mysqli -> set_charset("utf8");
		$requete = "SELECT * FROM Evenement";
		$resultat = $mysqli -> query($requete);
		while ($event = $resultat -> fetch_assoc()) {
        ?>
            <tr>
                <td><? echo $event['idEVENEMENT']; ?></td>
                <td><? echo $event['Horodatage']; ?></td>
                <td><? echo $event['Type']; ?></td>
                <?php
                    $id_event = $event['idEVENEMENT'];
                    $reqDonnee = mysqli_query($bd_busybot, "SELECT * FROM Evenement WHERE idEVENEMENT = '$id_event' ");
                    while($resDonnee = $reqDonnee->fetch_assoc()){
                    $nomDonnee = $resDonnee['Donnee'];
                    }
                ?>
                <td>
                    <?
                    if($nomDonnee == "Ouvert")
                        {
                            ?><span class="vert"><? echo $nomDonnee ?></span><?
                        }
                    else if($nomDonnee == "Occupe")
                        {
                            ?><span class="orange"><? echo $nomDonnee ?></span><?
                        }
                    else if($nomDonnee == "Refuse")
                        {
                            ?><span class="rouge"><? echo $nomDonnee ?></span><?
                        }
                    else if($nomDonnee == "Indisponible")
                        {
                            ?><span class="rouge"><? echo $nomDonnee ?></span><?
                        }
                    else
                        {
                            ?><img src="photos/<? echo $nomDonnee ?>" width="100" alt="Pas d'image"/><?
                        }
                    ?>
                </td>
                <td><? echo $event['idCENTRALE'] ?></td>
            </tr>
        <?php
		}
		?>
		
    <!--Pied de page-->
    <footer>
        PROJET BUSYBOT SNIR2 2021-2022
    </footer>
		
	</body> 
</html>

<?php
    $mysqli_close($bd_busybot);
?>
