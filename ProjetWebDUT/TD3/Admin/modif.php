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
    mysql_select_db($base) or die('La base de donn�es n\'existe pas');
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
        <h2>Modification</h2>
        <form action="update.php" method="post">
            TYPE : <input name="type" type="text" value="<?php echo $type; ?>"/><br/>
            NOM : <input name="nom" type="text" value="<?php echo $nom; ?>"/><br/>
            DESCRIPTION : <textarea name="description" rows ="10" cols="20" type="text" value="<?php echo $description; ?>"/></textarea><br/>
            PRIX : <input name="prix" type="text" value="<?php echo $prix; ?>"/><br/>
            QUANTITE : <input name="quantite" type="text" value="<?php echo $quantite; ?>"/><br/>
            LIEN IMAGE : <input name="image" type="text" value="<?php echo $image; ?>"/><br/>
            <input type="submit" value="Modifier"/><br/>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
        </form>


    </body>
</html>