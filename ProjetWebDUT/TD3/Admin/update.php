<?php

session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $image = $_POST['image'];
    require 'bin/params.php';
    mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($base) or die('La base de donn�es n\'existe pas');
    $query = "UPDATE thes SET nom='$nom', type='$type', description='$description', prix='$prix', quantite='$quantite', image='$image' WHERE id_the='$id'";
//echo $query;
    mysql_query($query);
    mysql_close();
    header('location:tool.php');
}
?>

