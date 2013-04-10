<?php
session_start();

if (!isset($_SESSION['admin']) && $_SESSION['admin'] == false)
    header('location:connectForm.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

    <head>
        <title>Administration Théière</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../TD1.css">
    </head>


    <body>
        <div class="header">
            <div class="nav">
                <h1>La Théière - Administration</h1>
                <ul>
                    <li><a href="disconnect.php">SE DECONNECTER</a></li>
                </ul>
            </div>
        </div>
        <div class="ajout">
            <h2>Ajouter un thé</h2>
            <form action="add.php" method="post">
                TYPE : <input name="type" type="text"/><br/>
                NOM : <input name="nom" type="text"/><br/>
                DESCRIPTION : <input name="description" type="text"/><br/>
                PRIX : <input name="prix" type="text"/><br/>
                QUANTITE : <input name="quantite" type="text"/><br/>
                LIEN IMAGE : <input name="image" type="text"/><br/>
                <input type="submit" value="Ajouter"/><br/>
            </form>
        </div>


        <div class="tabThes">


        <h2>Modifier ou supprimer un thé</h2>

            <?php
            require 'bin/params.php';
            mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
            mysql_query("SET NAMES 'utf8'");
            mysql_select_db($base) or die('Base de donnée inaccessible');
            $query = 'SELECT * FROM thes';
            $r = mysql_query($query);
            mysql_close();

            echo'<table><tr><th><b>NOM</b></th><th><b>TYPE</b></th><th><b>DESCRIPTION</b></th><th><b>PRIX</b></th><th><b>QUANTITE</b></th><th><b>LIEN IMG</b></th></tr>';
            while ($a = mysql_fetch_object($r)) {
                $type = $a->type;
                $nom = $a->nom;
                $description = $a->description;
                $prix = $a->prix;
                $quantite = $a->quantite;
                $image = $a->image;
                $id = $a->id_the;
                echo"<tr><td>$type</td><td>$nom</td><td>$description</td><td>$prix</td><td>$quantite</td><td>$image</td>";
                echo"<td><a href=\"delete.php?id=$id\"><img class=\"icon\" src=\"../Images/icon_delete.png\" alt=\"Supprimer\"/></a></td>";
                echo"<td><a href=\"modif.php?id=$id\"><img class=\"icon\" src=\"../Images/icon_edit.png\" alt=\"Modifier\"/></a></td>";
                echo"</tr>";
                
            }
            echo '</table>';
            ?>

        </div>

    </body>


</html>