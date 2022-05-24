<?php
include('../functions.php');
include('connexion_db.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<title>BUSYBOT V4 | Ajout centrale</title>
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
	
        <h1 align="center">Ajouter une centrale</h1>
        <p> <a href="index.php?">Retourner au menu principal</a><br /><br />
        
        <?php
        $resid_centrale = mysqli_query($bd_busybot, "SELECT MAX(idCENTRALE) FROM Centrale");
        while($maxid_centrale = $resid_centrale->fetch_assoc()){
        $idMax = $maxid_centrale['MAX(idCENTRALE)'] + 1;
        ?>

        <div class="form" align="center">
            <fieldset>
                <legend align="center">
                    Données de la centrale
                </legend>
                    <form method="POST" action="req_ajout_centrale.php">
                        ID : <input type="hidden" name="idCENTRALE" value="<? echo $idMax; ?>"/><? echo $idMax; ?><br /><br />
                        IP Centrale : <input required="required" type="text" placeholder="XXX.XXX.XXX.XXX" name="Adresse_IP"/><br /><br />
                        Type : <br /><input required="required" type="radio" name="type" value="Appel"/> Appel
                                     <input required="required" type="radio" name="type" value="Réponse"/>Réponse<br /><br />
                        Caméra : <br /><input required="required" type="radio" name="Camera" value="1"/>Oui
                                       <input required="required" type="radio" name="Camera" value="0"/>Non<br /><br />
                        Local affecté : <select type="text" placeholder="Local affecté" name="idLOCAL">
                        
                        <?php
                        $reSelectlieu = mysqli_query($bd_busybot, "SELECT * FROM Local");
                        while($lieuLocal = $reSelectlieu->fetch_assoc()){
                        ?>
                                            <option>
                                                <?php
                                                    echo $lieuLocal['idLOCAL'];
                                                ?>
                                            </option><? } ?>
                                        </select><br /><br />
                                        
                        <input type="submit" value="AJOUTER">
                    </form>
            </fieldset>
        </div><br />
        <? } ?>
        
        <p value="annuler"><a href="req_noajout_centrale.php">ANNULER</a><p/>
		
    <!--Pied de page-->
    <footer>
        PROJET BUSYBOT SNIR2 2021-2022
    </footer>
		
	</body> 
</html>

<?php
    $mysqli_close($bd_busybot);
?>
 
