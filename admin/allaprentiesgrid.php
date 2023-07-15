<!-- <div class='col-xl-3 col-lg-4 col-md-6 d-flex'>
<div class='card'>
<div class='card-body'>
<div class='student-box flex-fill'>
<div class='student-img'>
<a href='student-details.php'>
  <img src='assets/uploads/".$i['photo_apprentie']."' class='img-fluid'>
</a>
</div>
<div class='student-content pb-0'>
<h5><a href='student-details.html'>". $i['nom_apprentie']."</a></h5>
<h6>Student</h6>
</div>
</div>
</div>
</div>
</div> -->

<?php
require 'config.php';

if (!empty($_POST['sl'])){
$difl=$_POST['sl'];
$sql="SELECT * FROM apprenties,af,filiere
where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie and filiere.id_filiere='".$difl."'";
$res=mysqli_query($db,$sql);
$out="";
if($res)
{

  while ($i=mysqli_fetch_array($res)) {
     $out.="
     <div class='col-xl-3 col-lg-4 col-md-6 d-flex'>
     <div class='card'>
     <div class='card-body'>
     <div class='student-box flex-fill'>
     <div class='student-img'>
     <a href='student-details.php'>
       <img src='assets/uploads/".$i['photo_apprentie']."' class='img-fluid ii' >
     </a>
     </div>
     <div class='student-content pb-0'>
     <h5><a href='student-details.html'>". $i['nom_apprentie']."</a></h5>
     <h6>". $i['prenom_apprentie']."</h6>
     </div>
     </div>
     </div>
     </div>
     </div>
    ";
  }

echo $out;
}
}
else {
 
$sql="SELECT * FROM apprenties,af,filiere
where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie";
$res=mysqli_query($db,$sql);
$out="";
if($res)
{

  while ($i=mysqli_fetch_array($res)) {
     $out.="
     <div class='col-xl-3 col-lg-4 col-md-6 d-flex'>
     <div class='card'>
     <div class='card-body'>
     <div class='student-box flex-fill'>
     <div class='student-img'>
     <a href='student-details.php'>
       <img src='assets/uploads/".$i['photo_apprentie']."' class='img-fluid ii' >
     </a>
     </div>
     <div class='student-content pb-0'>
     <h5><a href='student-details.html'>". $i['nom_apprentie']."</a></h5>
     <h6>". $i['prenom_apprentie']."</h6>
     </div>
     </div>
     </div>
     </div>
     </div>
    ";
  }

echo $out;
}
}
?>