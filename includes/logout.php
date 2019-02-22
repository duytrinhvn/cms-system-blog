<?php 
session_start();
$_SESSION['username'] = null;
$_SESSION['password'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['role'] = null;
$_SESSION['email'] = null;
$_SESSION['id'] = null;
header('LOCATION: ../index.php');
?>