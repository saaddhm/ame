<?php
session_start();
unset($_SESSION['nom']); 
unset($_SESSION['prenom']); 
header('location:login.php');
?>