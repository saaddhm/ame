<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>AMESIP</title>
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
</head>
<body >
<?php
if (isset($_POST['submit'])) {
    # code...
    $new = $_POST['new'];
    

    // Check if old password matches the stored password and new password matches the confirmed password
  
        
            $st="UPDATE `login_formateur` SET `password`='".$new."' WHERE id_login=".$_SESSION['idlog']."";
            $resst= $db->query($st);
       
        if ($resst) {
        echo "
        <script>Swal.fire({
          position: 'top-center',
          icon: 'success',
          title: 'Le mot de passe a été changé avec succès.',
          showConfirmButton: false,
          timer: 1500
        })</script>";
    } 
    else {
        echo "
        <script>Swal.fire({
          position: 'top-center',
          icon: 'danger',
          title: 'Le mot de passe n est pas changé avec succès.',
          showConfirmButton: false,
          timer: 1500
        })</script>";
    }
}
    


    // Retrieve form values
    

?>
<div class="main-wrapper">




<?php
include "navbar.php"
?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">Profile</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
<li class="breadcrumb-item active">Profile</li>
</ul>
</div>
</div>
</div>
<?php

$sql="SELECT * FROM `formateur`,login_formateur,matier WHERE formateur.id_formateur=login_formateur.id_formateur AND formateur.id_matier=matier.id_matier AND login_formateur.id_formateur=".$_SESSION['idf']."";
$result = $db->query($sql);
$i= $result->fetch_assoc()
?>
<div class="row">
<div class="col-md-12">
<div class="profile-header">
<div class="row align-items-center">
<div class="col-auto profile-image">
<a href="#">
<img class="rounded-circle" alt="User Image" src='assets/uploads/<?php echo $i['photo_formateur'] ?>'>
</a>
</div>
<div class="col ms-md-n2 profile-user-info">
<h4 class="user-name mb-0"><?php echo $i['nom_formateur'];echo" "; echo $i['prenom_formateur'] ?> </h4>
<h6 class="text-muted"><?php echo $i['nom_matier'] ?></h6>
<div class="user-Location"><i class="fas fa-map-marker-alt"></i> <?php echo $i ['adresse_formateur'] ?></div>

</div>
<div class="col-auto profile-btn">
<a href class="btn btn-primary">
Edit
</a>
</div>
</div>
</div>
<div class="profile-menu">
<ul class="nav nav-tabs nav-tabs-solid">
<li class="nav-item">
<a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Mes Iformations</a>
</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="tab" href="#password_tab">Mot de passe</a>
</li>
</ul>
</div>
<div class="tab-content profile-tab-cont">

<div class="tab-pane fade show active" id="per_details_tab">

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<h5 class="card-title d-flex justify-content-between">
<span>Personal Details</span>
<button class="edit-link" data-bs-toggle="modal" href="#edit_personal_details" ><i class="far fa-edit me-1"></i>Edit</button>
</h5>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
<p class="col-sm-9"><?php echo $i['nom_formateur'];echo" "; echo $i['prenom_formateur'] ?> </p>
</div>

<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email </p>
<p class="col-sm-9"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6e040106000a010b2e0b160f031e020b400d0103"><?php echo $i['username'];?> </a></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Telephone </p>
<p class="col-sm-9"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6e040106000a010b2e0b160f031e020b400d0103"><?php echo $i['telephone_formateur'];?> </a></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
<p class="col-sm-9 mb-0"> <?php echo $i ['adresse_formateur'] ?><br>
</div>
</div>
</div>
</div>
<div class="col-lg-3">
</div>
</div>
</div>
<div id="password_tab" class="tab-pane fade">
<div class="card">
<div class="card-body">
<h5 class="card-title">Change mote de passe</h5>
<div class="row">
<div class="col-md-10 col-lg-6">
<form action="#" method="post" enctype="multipart/form-data">

<div class="form-group">
<label>nouvelle mote de passe</label>
<input type="password" class="form-control" name='new'>
</div>

<input type="submit" class="btn btn-primary" value="Valider" name="submit">
</form>

</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>

</div>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>