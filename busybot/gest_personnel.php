<?php
include('../functions.php');
include('connexion_db.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<title>BUSYBOT V4 | Personnel</title>
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
	
        <h1 align="center">Gestion du personnel</h1>
        <p> <a href="index.php?">Retourner au menu principal</a>
        <table align="center">
            <tr>
                <td align=center><i>ID</i></td>
                <td align=center><i>Nom</i></td>
                <td align=center><i>Prénom</i></td>
                <td align=center><i>Fonction</i></td>
                <td align=center><i>Mail</i></td>
                <td align=center><i>Téléphone</i></td>
                <td align=center><i>Local</i></td>
                <td align=center><i>Action</i></td>
            </tr>
		<?php

		$resultat = mysqli_query($bd_busybot, "SELECT * FROM Personne ORDER BY idPERSONNE ASC");
		while ($personne = $resultat->fetch_assoc())
		{
        ?>
            <tr>
                <td><? echo $personne['idPERSONNE'] ?></td>
                <td><? echo $personne['Nom'] ?></td>
                <td><? echo $personne['Prenom'] ?></td>
                <td><? echo $personne['Fonction'] ?></td>
                <td><? echo $personne['Mail'] ?></td>
                <td><? echo $personne['Telephone'] ?></td>
        <?php
            $lieu_loc = $personne['idLOCAL'];
            $localisation = mysqli_query($bd_busybot, "SELECT Lieu FROM Local WHERE idLOCAL='$lieu_loc'");
            while ($idloc = $localisation->fetch_assoc())
            {
                $locbyid = $idloc['Lieu'];
        ?>
                <td><? echo $locbyid; ?></td>
        <?php
            }
        ?>
                <td> <a href="conf_delete_personnel.php?id=<?= $personne['idPERSONNE'] ?>&nom=<?= $personne['Nom'] ?>&prenom=<?= $personne['Prenom'] ?>&fonction=<?= $personne['Fonction'] ?>">Supprimer</a> 
                     <a href="maj_personnel.php?id=<?= $personne['idPERSONNE'] ?>&nom=<?= $personne['Nom'] ?>&prenom=<?= $personne['Prenom'] ?>&fonction=<?= $personne['Fonction'] ?>&mail=<?= $personne['Mail'] ?>&fonction=<?= $personne['Fonction'] ?>&telephone=<?= $personne['Telephone'] ?>&local=<?= $personne['idLOCAL'] ?>">Modifier</a> </td>
            </tr>
        
        <?php
		}
		?>
		</table>
		
		<p><a href="form_new_personnel.php">Ajouter un membre</a></p>
		
    <!--Pied de page-->
    <footer>
        PROJET BUSYBOT SNIR2 2021-2022
    </footer>
		
	</body> 
</html>

<?php
    $mysqli_close($bd_busybot);
?>
