<?php

session_start();

$title = $_POST['title'];
$text = $_POST['text'];
$page = $_POST['page'];

require 'bin/params.php';
mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
mysql_query("SET NAMES 'utf8'");
mysql_select_db($base) or die('La base de donnees n\'existe pas');

$query = "UPDATE pages SET titre='$title', texte='$text' WHERE id='$page'";
//echo $query;
mysql_query($query);
mysql_close();
header('location:editPage.php?page=$page');
?>

