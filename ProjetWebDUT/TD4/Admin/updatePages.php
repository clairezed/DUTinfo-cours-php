<?php

session_start();

$titre = $_POST['titre'];
$texte = $_POST['texte'];
$page = $_POST['page'];

require 'bin/params.php';
mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
mysql_query("SET NAMES 'utf8'");
mysql_select_db($base) or die('La base de donnees n\'existe pas');

$query = "UPDATE pages SET titre='$titre', texte='$texte' WHERE id='$page'";
//echo $query;
mysql_query($query);
mysql_close();
header("location:editPages.php?page=$page");
?>

