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

$sql="SELECT * FROM apprenties,af,filiere
where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie and apprenties.id_apprentie='".$idapp."'";
$res=mysqli_query($db,$sql);
$out="";
if($res)
{
 
 $i=mysqli_fetch_array($res) ;
    $out.="
 <div class='row'>
    <div class='col-12'>
    <h5 class='form-title student-info'>Student Information <span><a href='javascript:;'><i class='feather-more-vertical'></i></a></span></h5>
    </div>
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms'>
    <label>Nom <span class='login-danger'>*</span></label>
    <input class='form-control' type='text' placeholder='Nom' name='nom' value='".$i['nom_apprentie']."'>
    </div>
    </div>
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms'>
    <label>Prénom <span class='login-danger'>*</span></label>
    <input class='form-control' type='text' placeholder='Prénom' name='prenom' value='".$i['prenom_apprentie']."'>
    </div>
    </div>
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms'>
    <label>Genre <span class='login-danger'>*</span></label>
    <select class='form-control select' name='genre'>
    <option value='".$i['genre_apprentie']."'>".$i['genre_apprentie']."</option>
    <option disbled>Select Genre</option>
    <option value='femal'>Female</option>
    <option value='male'>Male</option>
    </select>
    </div>
    </div>
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms calendar-icon'>
    <label>Date de Naissance <span class='login-danger'>*</span></label>
    <input class='form-control ' type='date'  name='datee' value='".$i['date_naissance_apprentie']."'>
    </div>
    </div>
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms'>
    <label>Niveau Scolaire <span class='login-danger'>*</span></label>
    <select class='form-control select' name='nvs' >
    <option value='".$i['niveaux_scolaire_apprentie']."'>".$i['niveaux_scolaire_apprentie']."</option>
    <option disabled>Niveaux</option>
    <option value='12'>12</option>
    <option value='11'>11</option>
    <option value='10'>10</option>
    </select>
    </div>
    </div>   
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms'>
    <label>Téléphone <span class='login-danger'>*</span> </label>
    <input class='form-control' type='text' placeholder='Numéro de Téléphone' name='tele' value='".$i['telephone_apprentie']."'>
    </div>
    </div>
    <div class='col-12 col-sm-4'>
    <div class='form-group local-forms'>
    <label>Adresse <span class='login-danger'>*</span></label>
    <textarea cols='30' rows='10' class='form-control'  name='adresse' value='".$i['adresse_apprentie']."'>".$i['adresse_apprentie']."</textarea>
    </div>
    </div>
    <div class='col-12 col-sm-4'>
    <div class='form-group students-up-files'>
   <img src='assets/uploads/".$i['photo_apprentie']."' style='width:100px;height:100px;border-radius:50%'/>
    <div class='uplod'>
    <label class='file-upload image-upbtn mb-0'>
    Photo File <input type='file' name='image' value=".$i['photo_apprentie'].">
    </label>
    </div>
    </div>
    </div>
    <div class='col-12'>
    <div class='student-submit'>
    <button type='submit' class='btn btn-primary'>Submit</button>
    </div>
    </div>
    </div>   
   ";
  

echo $out;

}
}
?>
