<?php

require 'config.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>AMESIP</title>


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
<h3 class="page-title">Add formateur</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="students.html">formateur</a></li>
<li class="breadcrumb-item active">Add formateur</li>

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

<?php

if (isset($_POST['submit'])) {
    # code...
  
  $target_dir = "../formateur/assets/uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists

  
  
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
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
  $cin=$_POST['cin'];
  $mat=$_POST['mat'];
  $tele=$_POST['tele'];
  $adresse=$_POST['adresse'];
  
    // Insert image file name into database
    $image_name = $_FILES["image"]["name"];
    $sql = "INSERT INTO `formateur`( `nom_formateur`, `prenom_formateur`, `cin_formateur`, `telephone_formateur`, `adresse_formateur`, `id_matier`, `photo_formateur`) 
    VALUES ('".$nom."','".$prenom."','".$cin."','".$tele."','".$adresse."','".$mat."','".$image_name."')";
  
  
  if (mysqli_query($db, $sql) ) {
 

    echo "
    <link href='https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js'></script>
    <script> 
    
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: 'Formateur est bien Ajouter.',
      showConfirmButton: false,
      timer: 1500
    })
    </script>";

    
   } 
   else {
    echo "
    <link href='https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js'></script>
    <script> 
    
    Swal.fire({
      position: 'top-center',
      icon: 'warning',
      title: 'Formateur Non ajouter.',
      showConfirmButton: false,
      timer: 1500
    })
    </script>";
   }
   }
?>

                
<div class="row">
<div class="col-sm-12">
<div class="card comman-shadow">
<div class="card-body">
<form action="#" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
<h5 class="form-title student-info"> Les Formations Formateur <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Nom <span class="login-danger">*</span></label>
<input class="form-control" type="text" placeholder="Nom" name="nom">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Prénom <span class="login-danger">*</span></label>
<input class="form-control" type="text" placeholder="Prénom" name="prenom">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>cin <span class="login-danger">*</span></label>
<input class="form-control" type="text" placeholder="cin" name="cin">

</div>
</div>




<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Téléphone <span class="login-danger">*</span> </label>
<input class="form-control" type="text" placeholder="Numéro de Téléphone" name="tele">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Adresse <span class="login-danger">*</span></label>
<textarea cols="30" rows="10" class="form-control" placeholder="Address" name="adresse"></textarea>
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>matier <span class="login-danger">*</span> </label>
<select name="mat" class="form-control">
    <option class="disabled">Select matier</option>
    <?php
    $sql1 = "SELECT * FROM matier";
    $result1 = $db->query($sql1);
    
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {

            echo '<option value="' . $row1['id_matier'] . '">' . $row1['nom_matier'] . '</option>';
        }
    } else {
        echo '0 results';
    }
    ?>
</select>


</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group students-up-files">
<label>Upload Student Photo (150px X 150px)</label>
<div class="uplod">
<label class="file-upload image-upbtn mb-0">
Photo File <input type="file" name="image">
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