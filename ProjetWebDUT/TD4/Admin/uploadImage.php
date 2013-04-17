<?php

session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $page = $_POST['page'];       // recup n° page à modifier
// test fichier vide + test fichier correctement uploadé
    if (!empty($_FILES['datafile']['tmp_name']) and is_uploaded_file($_FILES['datafile']['tmp_name'])) { 
        if (filesize($_FILES['datafile']['tmp_name']) < 2000000) { 
            $name = $_FILES['datafile']['name'];      // pour récupérer nom local de l'image (ici, sert à rien)
            // getimagesize renvoit 4 paramètres
            list($width, $height, $type, $attr) = getimagesize($_FILES['datafile']['tmp_name']);
            if ($type == 1 or $type == 2 or $type == 3) {        // verif du type d'image
                if ($type == 1)
                    $ext = '.gif';
                else if ($type == 2)
                    $ext = '.jpg';
                else if ($type == 3)
                    $ext = '.png';

                $f = 'images/image' . $page;
                if (move_uploaded_file($_FILES['datafile']['tmp_name'], $f . $ext)) { //$f= nom image sans extension / $ext = extension
                    // Modifier les données dans la base de données :
                    require 'bin/params.php';
                    mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
                    mysql_select_db($base) or die('La base de donnees n\'existe pas');

                    $query = "UPDATE pages SET IMAGE='$f$ext' WHERE ID=$page";
                    mysql_query($query);
                    mysql_close();
                    header("location:editPages.php?page=$page");
                }
            }
        }
    }
}
?>

