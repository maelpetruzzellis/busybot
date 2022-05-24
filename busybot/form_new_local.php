<?php
include('../functions.php');
include('connexion_db.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<title>BUSYBOT V4 | Ajout local</title>
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
	
        <h1 align="center">Ajouter un local</h1>
        <p> <a href="index.php?">Retourner au menu principal</a><br /><br />
        
        <?php
        $resid = mysqli_query($bd_busybot, "SELECT MAX(idLOCAL) FROM Local");
        while($maxid = $resid->fetch_assoc()){
        $idMax = $maxid['MAX(idLOCAL)'] + 1;
        ?>

        <div class="form" align="center">
            <fieldset>
                <legend align="center">
                    Vos données
                </legend>
                    <form method="POST" action="req_ajout_local.php">
                        ID : <input type="hidden" name="idLOCAL" value="<? echo $idMax; ?>"/><? echo $idMax; ?><br /><br />
                        Code : <input required="required" type="text" placeholder="Code du local" name="Code"/><br /><br />
                        Lieu : <input required="required" type="text" placeholder="Ex : nom du bâtiment" name="Lieu"/><br /><br />
                        <input type="submit" value="AJOUTER">
                    </form>
            </fieldset>
        </div><br />
        <? } ?>
        
        <p value="annuler"><a href="req_noajout_local.php">ANNULER</a><p/>
		
    <!--Pied de page-->
    <footer>
        PROJET BUSYBOT SNIR2 2021-2022
    </footer>
		
	</body> 
</html>

<?php
    $mysqli_close($bd_busybot);
?>
 
 
