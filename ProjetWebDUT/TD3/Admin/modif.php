<?php
session_start();

if (!isset($_SESSION['admin']) && !$_SESSION['admin'] == true)
    header('location:connectForm.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

    <?php
    $id = $_GET['id'];
    require 'bin/params.php';
    mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($base) or die('La base de données n\'existe pas');
    $query = "SELECT * from thes WHERE id_the=$id";
    $r = mysql_query($query);
    if ($a = mysql_fetch_object($r)) {
        $type = $a->type;
        $nom = $a->nom;
        $description = $a->description;
        $prix = $a->prix;
        $quantite = $a->quantite;
        $image = $a->image;
    }
    mysql_close();
    ?>
    <head>
        <title>Modification thés</title>
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
                    <h2>Modification</h2>
                    <form action="update.php" method="post">
                        <div class="formulaire2">
                            <p class="label">TYPE :</p>
                            <input name="type" type="text" value="<?php echo $type; ?>"/><br/>
                        </div>
                        <div class="formulaire2">
                            <p class="label">NOM :</p>
                            <input name="nom" type="text" value="<?php echo $nom; ?>"/><br/>
                        </div>
                        <div class="formulaire2">
                            <p class="label">DESCRIPTION : </p>
                            <textarea name="description" type="text"/><?php echo $description; ?></textarea><br/>
                        </div>
                        <div class="formulaire2">
                            <p class="label">PRIX : </p>
                            <input name="prix" type="text" value="<?php echo $prix; ?>"/><br/>
                        </div>
                        <div class="formulaire2">
                            <p class="label">QUANTITE :</p>
                            <input name="quantite" type="text" value="<?php echo $quantite; ?>"/><br/>
                        </div>
                        <div class="formulaire2">
                            <p class="label">LIEN IMAGE : </p>
                            <input name="image" type="text" value="<?php echo $image; ?>"/><br/>
                        </div>
                        <input class="formButton" type="submit" value="Modifier"/><br/>
                        <input class="formButton" type="button" value="Annuler" onclick="location.href='index.php'"/><br/>
                     
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    </form>


                </body>
                </html>