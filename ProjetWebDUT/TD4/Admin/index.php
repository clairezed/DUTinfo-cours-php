<?php

session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true)
    header('location:editThe.php');
else
    header('location:connectForm.php');
?>