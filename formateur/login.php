<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Formateur</title>
<link href='https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css' rel='stylesheet'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js'></script>
<link rel="shortcut icon" href="assets/img/logo.png">


<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left" style='display:flex;align-items:center'>
<img class="img-fluid" style=' display:flex;
      justify-content:center;
      align-items:center; height:100%' src="../admin/assets/img/loo.png" alt="Logo">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1 class="text-center">Formateur</h1>
<br><br>
<h2>log in</h2>


<?php
if (isset($_POST['submit']) && isset($_POST['password']) && isset($_POST['username'])) {
    
   $username=$_POST['username'];
   $password=$_POST['password'];

   $sql1="SELECT * FROM `login_formateur`,formateur
   WHERE login_formateur.id_formateur=formateur.id_formateur
   AND login_formateur.username='".$username."'
   AND  login_formateur.password='".$password."'";
   $result1 = $db->query($sql1);
   $row= $result1->fetch_assoc();



   if(mysqli_num_rows($result1)>0 ){
      $st="UPDATE login_formateur set `status`='1' WHERE id_login=".$row['id_login']."";
      $resst= $db->query($st);
      $_SESSION['idf']=$row['id_formateur'];
      $_SESSION['idlog']=$row['id_login'];

   $_SESSION['imgf']=$row['photo_formateur'];
   $_SESSION['nomf']=$row['nom_formateur'];
   $_SESSION['prenomf']=$row['prenom_formateur'];
   $_SESSION['passwordf']=$row['password'];
   header("location:index.php");
   echo "
   <script>
   function fct(){
      Swal.fire({
         position: 'top-center',
         icon: 'success',
         title: 'Bienvenue .',
         showConfirmButton: false,
         timer: 2500
       });
      setTimeout(function() {
         window.location.href = 'index.php';
       }, 1000);
   }
  
   fct();

   </script>";
 
}
else{
   echo "
   <script>Swal.fire({
     position: 'top-center',
     icon: 'danger',
     title: 'Le mot de passe ou Email est invalid.',
     showConfirmButton: false,
     timer: 1500
   })</script>";
}
   

}

?>

<form action="#" method="post">
<div class="form-group">
    
<label>Username <span class="login-danger">*</span></label>

<input class="form-control" type="text" name="username">
<span class="profile-views"><i class="fas fa-user-circle"></i></span>
</div>
<div class="form-group">
<label>Password <span class="login-danger">*</span></label>

<input class="form-control pass-input" type="text" name="password">
<span class="profile-views feather-eye toggle-password"></span>
</div>
<div class="forgotpass ">
<div class="remember-me ">
<!-- <a href="../login.php"><label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Admin</a> -->
<span class="checkmark"></span>
</label>
</div>

</div>
<div class="form-group">
<input type="submit" value="login" class="btn btn-primary btn-block" name="submit">
</div>
</form>



</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>