<?php
session_start();
include 'config.php';
$st="UPDATE `login_formateur` set `status`='0' WHERE id_login=".$_SESSION['idlog']."";
$resst= $db->query($st);
if ($resst) {
    unset($_SESSION['nomf']);
    unset($_SESSION['prenomf']);
header('location:login.php');
}

?>