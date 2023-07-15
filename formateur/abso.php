<!-- <div class='row'>
<div class='col-12'>
<h5 class='form-title student-info'>Student Information <span><a href='javascript:;'><i class='feather-more-vertical'></i></a></span></h5>
</div>
<div class='col-12 col-sm-4'>
<div class='form-group local-forms'>
<label>Nom <span class='login-danger'>*</span></label>
<input class='form-control' type='text' placeholder='Nom' name='nom'>
</div>
</div>
<div class='col-12 col-sm-4'>
<div class='form-group local-forms'>
<label>Prénom <span class='login-danger'>*</span></label>
<input class='form-control' type='text' placeholder='Prénom' name='prenom'>
</div>
</div>
<div class='col-12 col-sm-4'>
<div class='form-group local-forms'>
<label>Genre <span class='login-danger'>*</span></label>
<select class='form-control select' name='genre'>
<option disbled>Select Genre</option>
<option>Female</option>
<option>Male</option>
</select>
</div>
</div>
<div class='col-12 col-sm-4'>
<div class='form-group local-forms calendar-icon'>
<label>Date de Naissance <span class='login-danger'>*</span></label>
<input class='form-control ' type='date'  name='datee'>
</div>
</div>
<div class='col-12 col-sm-4'>
<div class='form-group local-forms'>
<label>Niveau Scolaire <span class='login-danger'>*</span></label>
<select class='form-control select' name='nvs'>
<option disabled>Niveaux</option>
<option>12</option>
<option>11</option>
<option>10</option>
</select>
</div>
</div>


<div class='col-12 col-sm-4'>
<div class='form-group local-forms'>
<label>Téléphone <span class='login-danger'>*</span> </label>
<input class='form-control' type='text' placeholder='Numéro de Téléphone' name='tele'>
</div>
</div>
<div class='col-12 col-sm-4'>
<div class='form-group local-forms'>
<label>Adresse <span class='login-danger'>*</span></label>
<textarea cols='30' rows='10' class='form-control' placeholder='Address' name='adresse'></textarea>
</div>
</div>
<div class='col-12 col-sm-4'>
<div class='form-group students-up-files'>
<label>Upload Student Photo (150px X 150px)</label>
<div class='uplod'>
<label class='file-upload image-upbtn mb-0'>
Photo File <input type='file' name='image'>
</label>
</div>
</div>
</div>
<div class='col-12'>
<div class='student-submit'>
<button type='submit' class='btn btn-primary' name='submit'>Valider</button>
</div>
</div>
</div> -->





<?php
require 'config.php';
if (isset($_POST['sl'])){
$idapp=$_POST['sl'];
$sql="SELECT * FROM apprenties,af,filiere,absence_apprenties
where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie and apprenties.id_apprentie=absence_apprenties.id_apprentie and apprenties.id_apprentie='".$idapp."'";
$res=mysqli_query($db,$sql);
$out="";
if($res)
{
 
 $i=mysqli_fetch_array($res) ;
    $out.="
    <tr>
    <td>       <img src='assets/uploads/".$i['photo_apprentie']."' class='img-fluid ii' style='width: 50px;border-radius:50%  ;height: 50px;'></td>

    <td>". $i['nom_apprentie']."</td>
    <td>". $i['prenom_apprentie']."</td>
   
    
    <td>". $i['telephone_apprentie']."</td>
    <td>". $i['date_absence']."</td>
    

   </tr>
   ";
  

echo $out;

}
}
?>
