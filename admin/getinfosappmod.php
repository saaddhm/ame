



<?php
if(isset($_GET['appid']) && !empty($_GET['appid']))
{
    include 'config.php';
$appid=$_GET['appid'];
$_SESSION['idapp']=$appid;
$out="";
$sql="SELECT * FROM apprenties WHERE id_apprentie=$appid group by id_apprentie ";
$res=mysqli_query($db,$sql);
if ($res) {
$tt=mysqli_fetch_array($res);
$_SESSION['imageapp']=$tt['photo_apprentie'];


$out.="
<link href='https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css' rel='stylesheet'>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js'></script>
<script>$(document).ready(function() {
    $('#updateForm').submit(function(e) {
      e.preventDefault(); // Prevent form submission
  
      // Get form data
      var formData = $(this).serialize();
      // Send AJAX request to the PHP script
      $.ajax({
        url: 'modifierapp.php',
        type: 'POST',
        data: formData,
        success: function(response) {
          // Handle the response from the PHP script
          Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Apprentis est bien modifier.',
            showConfirmButton: false,
            timer: 1500
          })
          console.log(response);
          // if(response==='succes')
          // {
          //   alert('Bien');
          // }
          // You can display a success message or perform any other action here
        },
        error: function(xhr, status, error) {
          // Handle the error, if any
          console.log(error);
        }
      });
    });
  });</script>
  
<form id='updateForm'  enctype='multipart/form-data' methode='post'>

<div class='row'>
 <div class='row'>
     <div class='col-12'>
     <h5 class='form-title student-info'>Informations d'apprenti(e)<span><a href='javascript:;'><i class='feather-more-vertical'></i></a></span></h5>
     </div>
     <div class='col-12 col-sm-4'>
     <div class='form-group local-forms'>
     <label>Nom <span class='login-danger'>*</span></label>
     <input class='form-control' type='text' placeholder='Nom' name='nom' value=".$tt['nom_apprentie'].">
     </div>
     </div>
     <div class='col-12 col-sm-4'>
     <div class='form-group local-forms'>
     <label>Prénom <span class='login-danger'>*</span></label>
     <input class='form-control' type='text' placeholder='Prénom' name='prenom' value=".$tt['prenom_apprentie'].">
     </div>
     </div>
     <div class='col-12 col-sm-4'>
     <div class='form-group local-forms'>
     <label>Genre <span class='login-danger'>*</span></label>
     <select class='form-control ' name='genre' >
     <option value=".$tt['genre_apprentie'].">".$tt['genre_apprentie']."</option>
     <option value='femal'>Female</option>
     <option value='male'>Male</option>
     </select>
     </div>
     </div>
     <div class='col-12 col-sm-4'>
     <div class='form-group local-forms calendar-icon'>
     <label>Date de Naissance <span class='login-danger'>*</span></label>
     <input class='form-control ' type='date'  name='datee' value=".$tt['date_naissance_apprentie'].">
     </div>
     </div>
     <div class='col-12 col-sm-4'>
     <div class='form-group local-forms'>
     <label>Niveau Scolaire <span class='login-danger'>*</span></label>
     <select class='form-control' name='nvs' required>
     <option value=".$tt['niveaux_scolaire_apprentie'].">".$tt['niveaux_scolaire_apprentie']."</option>
	<option value='1 ère année primaire'>1 ère année primaire</option>
	<option value='2 ème année primaire'>2 ème année primaire</option>
	<option value='3 ème année primaire'>3 ème année primaire</option>
	<option value='4 ème année primaire'>4 ème année primaire</option>
	<option value='5 ème année primaire'>5 ème année primaire</option>
	<option value='6 ème année primaire'>6 ème année primaire</option>
	<option value='1 ére année de  l''Enseignement  Secondaire Collégial'>1 ére année de  l''Enseignement  Secondaire Collégial</option>
	<option value='2 ème année de  l''Enseignement  Secondaire Collégial'>2 ème année de  l''Enseignement  Secondaire Collégial</option>
	<option value='3 ème année de  l''Enseignement  Secondaire Collégial'>3 ème année de  l''Enseignement  Secondaire Collégial</option>
	<option value='Tronc Commun de l'Enseignement Secondaire Qualifiant'>Tronc Commun de l'Enseignement Secondaire Qualifiant</option>
	<option value='1 ère Année du Baccalauréat'>1 ère Année du Baccalauréat</option>
	<option value='2 ème Année du Baccalauréat'>2 ème Année du Baccalauréat</option>
	<option value='Baccalauréat'>Baccalauréat</option>
	<option value='Bac+2'>Bac+2</option>
	<option value='Bac+3'>Bac+3</option>
	<option value='Bac+4'>Bac+4</option>
	<option value='Bac+5'>Bac+5</option>
</select>
     </div>
     </div>   
     <div class='col-12 col-sm-4'>
     <div class='form-group local-forms'>
     <label>Téléphone <span class='login-danger'>*</span> </label>
     <input class='form-control' type='text' placeholder='Numéro de Téléphone' name='tele' value=".$tt['telephone_apprentie'].">
     </div>
     </div>
     <div class='col-12 col-sm-4'>
     <div class='form-group local-forms'>
     <label>Adresse <span class='login-danger'>*</span></label>
     <textarea cols='30' rows='10' class='form-control'  name='adresse' >".$tt['adresse_apprentie']."</textarea>
     </div>
     </div>
     </div>   
 </div>
 <div class='col-12'>
 <button type='submit' class='btn btn-success'>Modifier</button>
     </div>
</form> 

 ";


echo $out;
}
else {
    $out="Vide";
    echo $out;
}




 }


?>










<!-- <div class='col-12 col-sm-4'>
     <div class='form-group students-up-files'>
    <img src='assets/uploads/".$tt['photo_apprentie']."' style='width:100px;height:100px;border-radius:50%' />
     Photo File <input type='file' class='btn btn-success' name='imgup'  >
     </div>
     </div>
  -->