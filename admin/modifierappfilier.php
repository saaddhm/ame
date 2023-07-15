<?php

require_once "config.php";
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AMESIP</title>
    <style>
    
    /* .dataTables_paginate .pagination a:first-child{
    background-color: #FFC300 ;
    border-color:black;
    color:black;
}
.dataTables_paginate .pagination a:focus{
    background-color: #FFC300 ;
    color:black;
    border-color:white;
}
.dataTables_paginate .pagination a:hover:first-child{
    background-color: #FFC300 ;
    color:black;
    border-color:black;
} */


 </style>
 <link href='https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css' rel='stylesheet'>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    
    <script defer src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<script>
    // Function to show the success alert
function showSuccessAlert() {
  var successAlert = document.getElementById('successAlert');
  successAlert.style.display = 'block';
}

// Function to hide the success alert
function hideSuccessAlert() {
  var successAlert = document.getElementById('successAlert');
  successAlert.style.display = 'none';
}

</script>
</head>
<body>

<div class="main-wrapper">

<?php   
require_once 'navbar.php';
?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col-sm-12">
<div class="page-sub-header">
<h3 class="page-title">Modifier Apprentis</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="students.php">Apprentie</a></li>
<li class="breadcrumb-item active">Modifier Apprentis</li>

</ul>
</div>
</div>
</div>
</div>
<?php
// require_once 'addapp.php';
?>
<div class="row">
<div class="col-sm-12">
<div class="card comman-shadow">
<div class="card-body">
<form action="#" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
<h5 class="form-title student-info">Informations d'apprentis <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<?php
$idapp=$_GET['idapp'];



$req="select * from apprenties where id_apprentie='$idapp'";


$resq=mysqli_query($db, $req);
$rowapp= $resq->fetch_assoc();




if (isset($_POST['submit'])) {
    # code...
  
  $target_dir = "assets/uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    } 
  }
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $genre=$_POST['genre'];
  $date=$_POST['datee'];
  $nvs=$_POST['nvs'];
  $tele=$_POST['tele'];
  $adresse=$_POST['adresse'];
  
    // Insert image file name into database
    
    $image_name = $_FILES["image"]["name"];
if ($image_name=="") {
  # code...
  $image_name=$rowapp['photo_apprentie'];
}
$sql = "UPDATE apprenties SET nom_apprentie='$nom', prenom_apprentie='$prenom', date_naissance_apprentie='$date', telephone_apprentie='$tele', adresse_apprentie='$adresse', photo_apprentie='$image_name', genre_apprentie='$genre', niveaux_scolaire_apprentie='$nvs' WHERE id_apprentie='$idapp'";
$sql2 = "UPDATE `archive_apprenties` SET nom_apprentie='$nom', prenom_apprentie='$prenom', date_naissance_apprentie='$date', telephone_apprentie='$tele', adresse_apprentie='$adresse', photo_apprentie='$image_name', genre_apprentie='$genre', niveaux_scolaire_apprentie='$nvs' WHERE id_apprentie='$idapp'";
$dd=mysqli_query($db, $sql2);
$dd2=mysqli_query($db, $sql) ;
  if ( $dd ) {
       if ($dd2) {
        # code...
       
    echo "<script>Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: 'Apprentis est bien Modifier.',
      showConfirmButton: false,
      timer: 1500
    });
  
    </script>";
}

   } 
   else {
    echo "<script>Swal.fire({
      position: 'top-center',
      icon: 'warning',
      title: 'ERROR.',
      showConfirmButton: false,
      timer: 1500
    })</script>";
   }
   }



?>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Nom <span class="login-danger">*</span></label>
<input required class="form-control" type="text" value="<?php echo $rowapp['nom_apprentie'];  ?>" name="nom">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Prénom <span class="login-danger">*</span></label>
<input required class="form-control" type="text" value="<?php echo $rowapp['prenom_apprentie'];  ?>" name="prenom">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Genre <span class="login-danger">*</span></label>
<select class="form-control " name="genre" >
<option value="<?php echo $rowapp['genre_apprentie'];  ?>"><?php echo $rowapp['genre_apprentie'];  ?></option>
<option>Female</option>
<option>Male</option>
</select>
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms calendar-icon">
<label>Date de Naissance <span class="login-danger">*</span></label>
<input required class="form-control " type="date" value="<?php echo $rowapp['date_naissance_apprentie'];  ?>"  name="datee">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Niveau Scolaire <span class="login-danger">*</span></label>
<select class="form-control" name="nvs" required>
    <option value="<?php echo $rowapp['niveaux_scolaire_apprentie'];  ?>"><?php echo $rowapp['niveaux_scolaire_apprentie'];  ?></option>
	<option value="1 ère année primaire">1 ère année primaire</option>
	<option value="2 ème année primaire">2 ème année primaire</option>
	<option value="3 ème année primaire">3 ème année primaire</option>
	<option value="4 ème année primaire">4 ème année primaire</option>
	<option value="5 ème année primaire">5 ème année primaire</option>
	<option value="6 ème année primaire">6 ème année primaire</option>
	<option value="1 ére année de  l''Enseignement  Secondaire Collégial">1 ére année de  l''Enseignement  Secondaire Collégial</option>
	<option value="2 ème année de  l''Enseignement  Secondaire Collégial">2 ème année de  l''Enseignement  Secondaire Collégial</option>
	<option value="3 ème année de  l''Enseignement  Secondaire Collégial">3 ème année de  l''Enseignement  Secondaire Collégial</option>
	<option value="Tronc Commun de l'Enseignement Secondaire Qualifiant">Tronc Commun de l'Enseignement Secondaire Qualifiant</option>
	<option value="1 ère Année du Baccalauréat">1 ère Année du Baccalauréat</option>
	<option value="2 ème Année du Baccalauréat">2 ème Année du Baccalauréat</option>
	<option value="Baccalauréat">Baccalauréat</option>
	<option value="Bac+2">Bac+2</option>
	<option value="Bac+3">Bac+3</option>
	<option value="Bac+4">Bac+4</option>
	<option value="Bac+5">Bac+5</option>
</select>
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Téléphone <span class="login-danger">*</span> </label>
<input required class="form-control" type="text" value="<?php echo $rowapp['telephone_apprentie'];  ?>" name="tele">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Adresse <span class="login-danger">*</span></label>
<textarea cols="30" rows="10" class="form-control" placeholder="Address" name="adresse" value="<?php echo $rowapp['adresse_apprentie'];  ?>"><?php echo $rowapp['adresse_apprentie'];  ?></textarea>
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group students-up-files">
<label>Upload Student Photo (150px X 150px)</label>
<div class="uplod">
<label class="file-upload image-upbtn mb-0">
Photo File <input type="file" name="image" value="<?php echo $rowapp['photo_apprentie'];  ?> ">
</label>
</div>
</div>
</div>
<div class="col-12">
<div class="student-submit">
<a href="javascript: void(0);" id="alert-success" class="btn btn-primary btn-sm waves-effect waves-light">
<button type="submit" class="btn btn-primary" name="submit" >Valider</button>
</a>

</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/plugins/alertify/alertify.min.js"></script>
<script src="assets/plugins/alertify/custom-alertify.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>