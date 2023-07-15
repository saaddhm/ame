<?php
require 'config.php';
$idapp=$_GET['idapp'];
$dt=date('y/m/d');
$sql="INSERT INTO absence_apprenties(id_apprentie,date_absence) VALUES ($idapp,'$dt')";
$res=mysqli_query($db,$sql);
if($res){
header("location:students.php");
}


?>