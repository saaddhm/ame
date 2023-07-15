<?php
require 'config.php';
$id=$_GET['idapp'];
$sql="DELETE FROM `apprenties` WHERE  id_apprentie=$id";
$res=mysqli_query($db,$sql);
if ($res) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
exit();

}

?>