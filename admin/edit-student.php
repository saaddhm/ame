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
 </style>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script>

$(document).ready(function(){
  $('#sl').on('change', function(){
      var flid = $(this).val();
        $.get(
          "getallapp.php",
          {
            flid:flid,
          },
          function(data) {
            $('#tb').html(data);
          }
        );

  })});



  $(document).ready(function(){
  $('#tb').on('change', function(){
      var appid = $(this).val();
        $.get(
          "getinfosappmod.php",
          {
            appid:appid,
          },
          function(data) {
            $('#infs').html(data);
          }
        );
  })});





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
<h3 class="page-title">Modifier Apprentis(e)</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="students.html">Apprentis(e)</a></li>
<li class="breadcrumb-item active">Modifier</li>
</ul>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card comman-shadow">
<div class="card-body">
<div class="suc"></div>
<form>

<div class="row">

<div class="col-12 col-sm-4">
<div class="form-group local-forms" >

<label>Filiere <span class="login-danger">*</span></label>
<?php
$sql="SELECT * FROM filiere";
$res=mysqli_query($db,$sql);
if($res)
{
  ?>
  <select   class='form-control  sl' id='sl'>
   <option disabled selected>Recherche Filiére</option>";
   <?php
  while ($i=mysqli_fetch_array($res)) {
    ?>
    <option value=<?php echo $i['id_filiere']; ?> ><?php echo $i['nom_filiere']; ?></option>";
    <?php
  }
  ?>
  </select>

<?php
}

?>
<div class="col-4" >

</div>
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Nom et Prenom <span class="login-danger">*</span></label>
<select   class='form-control px-4 tb' id="tb">
<option>Choisir Nom Prénom</option>
</select>
<div class="col-6"  >

</div>
</div>
</div>


</div>


  <div id="infs">

  </div>
 

</div>
</div>
</div>
</div>
</div>

</div>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>



