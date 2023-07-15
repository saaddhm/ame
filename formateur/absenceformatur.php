<?php
require 'config.php';
$idapp=$_GET['id'];
$dt=date('y/m/d');
$sql="INSERT INTO absence_formateur(id_formateur,date_absence) VALUES ($idapp,'$dt')";
$res=mysqli_query($db,$sql);
if($res){
header("location:index.php");
}


?>