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
<body>
<?php


?>
<div class="main-wrapper">
<?php   
require_once 'navbar.php';
if (isset($_POST['submit'])) {
  
    $nom=$_POST['nommat'];
   
      $sql = "INSERT INTO matier(nom_matier) VALUES('$nom') ";
      $res=mysqli_query($db,$sql) ;
      if ( $res) {
          echo "  
          <script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '$nom est bin ajouter.',
            showConfirmButton: false,
            timer: 1500
          })</script>";
          
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


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col-sm-12">
<div class="page-sub-header">
<h3 class="page-title">Ajouter un Matier</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="matier.php">Matiers</a></li>
<li class="breadcrumb-item active">Home</li>

</ul>
</div>
</div>
</div>
</div>
<div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Apprenties</h6>
                                        <h3><?php
         $sql="SELECT COUNT(*) as total FROM `apprenties` ";
         $result = $db->query($sql);
         $row= $result->fetch_assoc();
         echo $row['total'];
           
         ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Formateurs</h6>
                                        <h3><?php
         $sql=" SELECT COUNT(*) as total FROM `formateur` ";

         $result = $db->query($sql);
         $row= $result->fetch_assoc();
         echo $row['total'];
           
         ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/formateur.png" alt="Dashboard Icon" width='50px'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Matière</h6>
                                        <h3><?php
         $sql=" SELECT COUNT(*) as total FROM `matier` ";

         $result = $db->query($sql);
         $row= $result->fetch_assoc();
         echo $row['total'];
           
         ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/matier.png" alt="Dashboard Icon" width='50px'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Filiers</h6>
                                        <h3><?php
         $sql=" SELECT COUNT(*) as total FROM `filiere` ";

         $result = $db->query($sql);
         $row= $result->fetch_assoc();
         echo $row['total'];
           
         ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/filier.png" alt="Dashboard Icon" width='50px'>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
<div class="row">
<div class="col-sm-12">
<div class="card comman-shadow">
<div class="card-body">
<form action="#" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
<h5 class="form-title student-info">Remplir le champ suivant<span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Nom Matier<span class="login-danger">*</span></label>
<input class="form-control" type="text" name="nommat">
</div>
</div>
<!-- <div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>period de filiere <span class="login-danger">*</span></label>
<input class="form-control" type="text"  name="prenom">
</div>
</div> -->


<!-- <div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>nom de matier <span class="login-danger">*</span></label>
<input class="form-control" type="text" name="cin">

</div>
</div> -->








<!-- </div>
</div> -->
<div class="col-12">
<div class="student-submit">
<a href="javascript: void(0);" id="alert-success" class="btn btn-primary btn-sm waves-effect waves-light">
<button type="submit" class="btn btn-primary " name="submit" >Ajouter</button>
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