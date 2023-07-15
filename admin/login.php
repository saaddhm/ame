<?php

require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Admin</title>
<link href='https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css' rel='stylesheet'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js'></script>

<link rel="shortcut icon" href="assets/img/logo.png">
<style>

   .php_check_syntax{
      display:flex;
      justify-content:center;
      align-items:center;
   }
</style>

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
      align-items:center; height:100%' src="assets/img/loo.png" alt="Logo">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1 class="text-center">Admin</h1>
<br><br>
<h2>Log in</h2>

<?php

if (isset($_POST['submit'])) {
    
   $username=$_POST['username'];
   $password=$_POST['password'];
   $sql1="SELECT * FROM log_in WHERE  username='".$username."' and password='".$password."'";
   $result1 = $db->query($sql1);
$row= $result1->fetch_assoc();
   if(mysqli_num_rows($result1)>0 ){
      $_SESSION['id']=$row['id_loginad'];
    $_SESSION['nom']=$row['nom'];
    $_SESSION['prenom']=$row['prenom'];
    $_SESSION['img']=$row['img'];
    echo "
      <script>
      function fct(){
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Bienvenue.',
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
<!-- <a href="formateur/login.php"><label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Formateur</a> -->
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