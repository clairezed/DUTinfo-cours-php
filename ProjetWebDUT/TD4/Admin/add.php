<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin']==true)
{
	$type = $_POST['type'];
	$nom = $_POST['nom'];
	$description = $_POST['description'];
	$prix = $_POST['prix'];
	$quantite = $_POST['quantite'];
	$image = $_POST['image'];
	require 'bin/params.php';
	mysql_connect($host,$user,$password) or die('Erreur de connexion au SGBD.');
	mysql_select_db($base) or die('La base de données n\'existe pas');
	$query="insert into thes (type, nom, description, prix, quantite, image) values ('$type', '$nom', '$description', '$prix', '$quantite', '$image')";
	mysql_query($query);
	mysql_close();
	header('location:tool.php');
}

?>