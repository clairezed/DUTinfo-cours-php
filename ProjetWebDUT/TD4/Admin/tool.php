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
                        <!--<div class="formulaire">-->
                        <form action="add.php" method="post">
                            <div class="formulaire2">
                                <p class="label">TYPE :</p>
                                <input class="champ" name="type" type="text"/><br/>
                            </div>
                            <div class="formulaire2">
                                <p class="label">NOM :</p>
                                <input class="champ" name="nom" type="text"/><br/>
                            </div>
                            <div class="formulaire2">
                                <p class="label">DESCRIPTION : </p>
                                <textarea class="champ" name="description" type="text"/></textarea><br/>
                            </div>
                            <div class="formulaire2">
                                <p class="label">PRIX :</p>
                                <input class="champ" name="prix" type="text"/><br/>
                            </div>
                            <div class="formulaire2">
                                <p class="label">QUANTITE :</p>
                                <input name="quantite" type="text"/><br/>
                            </div>
                            <div class="formulaire2">
                                <p class="label">LIEN IMAGE : </p>
                                <input class="champ" name="image" type="text"/><br/>
                            </div>

                            <input class="formButton" type="submit" value="Ajouter"/><br/>
                        </form>
                        <!--</div>-->
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

                        echo'<table><tr><th><b>NOM</b></th><th><b>TYPE</b></th><th><b>DESCRIPTION</b></th><th><b>PRIX</b></th><th><b>QUANTITE</b></th><th><b>LIEN IMG</b></th><th><b>MODIF</b></th><th><b>SUPP</b></th></tr>';
                        while ($a = mysql_fetch_object($r)) {
                            $type = $a->type;
                            $nom = $a->nom;
                            $description = $a->description;
                            $prix = $a->prix;
                            $quantite = $a->quantite;
                            $image = $a->image;
                            $id = $a->id_the;
                            echo"<tr><td>$type</td><td>$nom</td><td>$description</td><td>$prix</td><td>$quantite</td><td>$image</td>";
                            echo"<td><a title=\"modifier\" href=\"modif.php?id=$id\"><img class=\"icon\" src=\"../Images/icon_edit.png\" alt=\"Modifier\"/></a></td>";
                            echo"<td><a title=\"supprimer\"href=\"delete.php?id=$id\"><img class=\"icon\" src=\"../Images/icon_delete.png\" alt=\"Supprimer\"/></a></td>";
                            echo"</tr>";
                        }
                        echo '</table>';
                        ?>

                    </div>

                </body>


                </html>