<?php
include 'config.php';
if(isset($_GET['flid']) && !empty($_GET['flid']))
{


$difl=$_GET['flid'];
$out="";
$sql="SELECT * FROM apprenties,af,filiere
where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie and filiere.id_filiere='$difl'";
$res=mysqli_query($db,$sql);
if ($res) {
    

$out.="<option disabled selected>Choisir Nom Prénom</option>";

while ($tt=mysqli_fetch_array($res)) 
{
 
    $out.= "<option value=".$tt['id_apprentie'].">".$tt['nom_apprentie']." ".$tt['prenom_apprentie']."</option>";

}
echo $out;
}
else {
    $out="Vide";
    echo $out;
}
}
else {
    echo 'error data';
}



?>