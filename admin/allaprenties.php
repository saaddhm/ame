

<?php
require 'config.php';
$difl=0;
if (isset($_POST['sl'])) {
  # code...
  $difl=$_POST['sl'];
}

$out="";
if (!empty($difl)){

$sql="SELECT * FROM apprenties,af,filiere
where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie and filiere.id_filiere='".$difl."'";
$res=mysqli_query($db,$sql);

if($res)
{

  while ($i=mysqli_fetch_array($res)) {
     $out.="
    <tr>
     <td>". $i['nom_apprentie']."</td>
     <td>". $i['prenom_apprentie']."</td>
     <td>". $i['genre_apprentie']."</td>
     <td>". $i['nom_filiere']."</td>
     <td>". $i['telephone_apprentie']."</td>
     <td>". $i['adresse_apprentie']."</td>
     <td class='text-center'><a href='absenceapprenties.php?idapp=".$i['id_apprentie']."' class='btn btn-warning text-light'>Absence</a>&nbsp;<a href='supapp.php?idapp=".$i['id_apprentie']."' class='btn btn-danger text-light'>Delete</a></td>

    </tr>
    ";
  }

echo $out;
}

}
elseif($difl==0) {
 
$sql="SELECT * FROM apprenties,af,filiere
where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie";
$res=mysqli_query($db,$sql);
$out="";
if($res)
{

  while ($i=mysqli_fetch_array($res)) {
     $out.="
    <tr>
    <td><img src='assets/uploads/".$i['photo_apprentie']."' class='imgrounded'></td>
     <td>". $i['nom_apprentie']."</td>
     <td>". $i['prenom_apprentie']."</td>
     <td>". $i['genre_apprentie']."</td>
     <td>". $i['nom_filiere']."</td>
     <td>". $i['telephone_apprentie']."</td>
     <td>". $i['adresse_apprentie']."</td>
     <td class='text-center'><a href='absenceapprenties.php?idapp=".$i['id_apprentie']."' class='btn btn-warning text-light'>Absence</a>&nbsp;<a href='#' class='btn btn-danger text-light'>Delete</a></td>
    </tr>
    ";
  }

echo $out;
}
}
?>