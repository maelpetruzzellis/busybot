<?php
include('../functions.php');
include('connexion_db.php');      
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<title>BUSYBOT V4 | Local</title>
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
	
        <h1 align="center">Gestion des locaux</h1>
        <p> <a href="index.php?">Retourner au menu principal</a>
        <table align="center">
            <tr class="firstColonne">
                <td align=center><i>ID</i></td>
                <td align=center><i>Code</i></td>
                <td align=center><i>Lieu</i></td>
                <td align=center><i>Action</i></td>
            </tr>
		<?php
		$mysqli = new mysqli("localhost", "root", "busybot", "bd_busybot");
		$mysqli -> set_charset("utf8");
		$requete = "SELECT * FROM Local";
		$resultat = $mysqli -> query($requete);
		while ($local = $resultat -> fetch_assoc()) {
        ?>
            <tr>
                <td><? echo $local['idLOCAL'] ?></td>
                <td><? echo $local['Code'] ?></td>
                <td><? echo $local['Lieu'] ?></td>
        <?php
            $localID = $local['idLOCAL'];
            $resVerif = mysqli_query($bd_busybot, "SELECT * FROM Centrale WHERE idLOCAL='$localID'");
            $valeurCount = mysqli_num_rows($resVerif);
        ?>
                <td>
                    <?php
                        if($valeurCount == 0)
                        {
                            ?> <a href="conf_delete_local.php?id=<?= $local['idLOCAL'] ?>&code=<?= $local['Code'] ?>&lieu=<?= $local['Lieu'] ?>">Supprimer</a> <?
                        }
                        else
                        {
                            ?> <a href="cant_delete_local.php">Supprimer</a> <?
                        }
                    ?>
                    <a href="maj_local.php?id=<?= $local['idLOCAL'] ?>&code=<?= $local['Code'] ?>&lieu=<?= $local['Lieu'] ?>">Modifier</a>
                </td>
            </tr>
        <?php
		}
		?>
		</table>
		
		<p><a href="form_new_local.php">Ajouter un local</a></p>
		
    <!--Pied de page-->
    <footer>
        PROJET BUSYBOT SNIR2 2021-2022
    </footer>
		
	</body> 
</html> 

<?php
    $mysqli_close($bd_busybot);
?>
