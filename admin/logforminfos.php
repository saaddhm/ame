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

if (isset($_GET['flid'])){
    require 'config.php';
$idfor=$_GET['flid'];

$sql="SELECT * FROM `formateur` where id_formateur='".$idfor."'";
$res=mysqli_query($db,$sql);
$out="";
if($res)
{
 
 $i=mysqli_fetch_array($res) ;
    $out.="<div class='row'>
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms'>
    <label>Nom <span class='login-danger'>*</span></label>
    <input class='form-control' type='text' placeholder='Nom' name='nom'   value='".$i['nom_formateur']."'>
    </div>
    </div>
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms'>
    <label>Prénom <span class='login-danger'>*</span></label>
    <input class='form-control' type='text' placeholder='Prénom' name='prenom'  value='".$i['prenom_formateur']."'>
    </div>
    </div>
    </div>
    <div class='row'>
    <div class='col-12 col-sm-4'>
<div class='form-group local-forms'>
<label>username <span class='login-danger'>*</span></label>
<input class='form-control' type='text' placeholder='username' name='username'>

</div>
</div>

<div class='col-12 col-sm-4'>
<div class='form-group local-forms'>
<label>password <span class='login-danger'>*</span> </label>
<input class='form-control' type='text' placeholder='password' name='password'>
</div>
</div>
</div>
   ";
  

echo $out;

}
}
?>
