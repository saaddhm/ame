<?php

require 'config.php';
$id=$_GET['idf'];
$sql="DELETE FROM `formateur` WHERE  id_formateur=$id";
$res=mysqli_query($db,$sql);
if ($res) {
    header("Location: " . $_SERVER['HTTP_REFERER']);

}

?>


