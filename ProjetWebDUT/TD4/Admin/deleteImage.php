<?php
session_start();
if(isset($_SESSION['admin'])&& $_SESSION['admin']==true)
{
	$page=$_POST['page'];
	require 'bin/params.php';
	mysql_connect($host,$user,$password) or die('Erreur de connexion au SGBD.');
	mysql_select_db($base) or die('La base de données n\'existe pas');

	$query="UPDATE page SET IMAGE='' WHERE id=$page";
	mysql_query($query);
	mysql_close();
	header("location:editPages.php?page=$page");
}

?>