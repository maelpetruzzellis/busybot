<?php
include('../functions.php');
include('connexion_db.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<title>BUSYBOT V4 | Centrale</title>
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
	
        <h1 align="center">Gestion des centrales</h1>
        <p> <a href="index.php?">Retourner au menu principal</a>
        <table align="center">
            <tr>
                <td align=center><i>ID</i></td>
                <td align=center><i>Adresse IP</i></td>
                <td align=center><i>Type</i></td>
                <td align=center><i>Camera</i></td>
                <td align=center><i>Local</i></td>
                <td align=center><i>Action</i></td>
            </tr>
		<?php
		$mysqli = new mysqli("localhost", "root", "busybot", "bd_busybot");
		$mysqli -> set_charset("utf8");
		$requete = "SELECT * FROM Centrale";
		$resultat = $mysqli -> query($requete);
		while ($centrale = $resultat -> fetch_assoc()) {
        ?>
            <tr>
                <td><? echo $centrale['idCENTRALE'] ?></td>
                <td><? echo $centrale['Adresse_IP'] ?></td>
                <td><? echo $centrale['type'] ?></td>
                <td><? if($centrale['Camera'] == 0){echo "NON"; } else if ($centrale['Camera'] == 1){echo "OUI";} ?></td>
                <td><? echo $centrale['idLOCAL']; ?></td>
                <td> <a href="conf_delete_centrale.php?id=<?= $centrale['idCENTRALE'] ?>&adresseip=<?= $centrale['Adresse_IP'] ?>&type=<?= $centrale['type'] ?>">Supprimer</a> 
                     <a href="maj_centrale.php?id=<?= $centrale['idCENTRALE'] ?>&adresseip=<?= $centrale['Adresse_IP'] ?>&type=<?= $centrale['type'] ?>&camera=<?= $centrale['Camera'] ?>&idlocal=<?= $centrale['idLOCAL'] ?>">Modifier</a> </td>
            </tr>
        <?php
		}
		?>
		</table>
		
		<p><a href="form_new_centrale.php">Ajouter une centrale</a></p>
	
    <!--Pied de page-->
    <footer>
        PROJET BUSYBOT SNIR2 2021-2022
    </footer>
		
	</body> 
</html> 

<?php
    $mysqli_close($bd_busybot);
?>
