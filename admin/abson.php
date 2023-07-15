<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Students</title>

<link rel="shortcut icon" href="https://static.wixstatic.com/media/b53106_41b49e4182c64c0d97cffbc47022eabb~mv2.png/v1/fill/w_102,h_132,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/AMESIP%20LOGO%20Final.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css">


	</script>
  <script>
    
function getallf(){
  $.ajax({
    url: "allfilier.php",
    type: "POST",
    dataType: "html",
    success: function(data){
      $("#allfillier").html(data);
    }
  });
}
getallf();


$(document).ready(function(){
  $('#sl').on('change', function(){
      var sl = $(this).val();
          $.ajax({
              type:'POST',
              url:'getinformationapp.php',
              data:'sl='+sl,
              success:function(html){
                $('#tb').html(html);
              }
          }); 
        });
  });

 function getallapp(){
    $.ajax({
      url: "getinformationapp.php",
      type: "POST",
      dataType: "html",
      success: function(data){
        $("#tb").html(data);
      }
    });

  }

  $(document).ready(function(){
  $('#tb').on('change', function(){
      var sl = $(this).val();
          $.ajax({
              type:'POST',
              url:'abso.php',
              data:'sl='+sl,
              success:function(html){
                $('#infos').html(html);
              }
          }); 
        });
  });

  getallapp();
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
<h3 class="page-title">Edit Students</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="students.html">Student</a></li>
<li class="breadcrumb-item active">Edit Students</li>
</ul>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card comman-shadow">
<div class="card-body">
<form>

<div class="row">

<div class="col-12 col-sm-4">
<div class="form-group local-forms" id="allfillier">
<label>Filiere <span class="login-danger">*</span></label>
<div class="col-4" id="allfillier"></div>
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Nom et Prenom <span class="login-danger">*</span></label>
<div class="col-6" >
<select   class='form-control px-4' id="tb">
   <option disabled selected>Nom et Prénom</option>
</select>
</div>
</div>
</div>


</div>

<div class="row" id="infos">
<div class='row'>
 
<div class="table-responsive" id="allstudents">
<table class='table border-0 star-student table-hover table-center mb-0 datatable table-striped'>
  <thead class='student-thread'>
  <tr>
    
  <th>Photo</th>
  <th>Nom</th>
  <th>Prenom</th>
 
  <th>Téléphone</th>
  
  <th>date_absence</th>
  
  </tr>
  </thead>
  <tbody id='tbapp'>


  </tbody>
</table>
<!-- all students -->
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

<script src="assets/js/script.js"></script>
</body>
</html>