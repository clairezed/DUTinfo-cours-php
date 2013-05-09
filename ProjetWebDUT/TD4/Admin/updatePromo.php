<?php

session_start();

$promo = $_POST['promo'];
$id = $_POST['id'];

require 'bin/params.php';
mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
mysql_query("SET NAMES 'utf8'");
mysql_select_db($base) or die('La base de donnees n\'existe pas');

$query = "UPDATE thes SET promotion='$promo' WHERE id_the='$id'";
mysql_query($query);
mysql_close();
header("location:editPromo.php");

?>