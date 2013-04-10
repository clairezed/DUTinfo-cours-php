<?php
session_start();
require'bin/params.php';
$login = $_POST['login'];
$password = $_POST['password'];
if($login == $adminLogin && $password == $adminPassword)
{
	$_SESSION['admin'] = true;
}
header('location:index.php');
?>