<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Students</title>


<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="getscript.js">  
	</script>
  <script>
$(document).ready(function(){
  $("#ser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tb tr").filter(
      function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
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
  </script>
  
  <style>
    .imgrounded{
      width: 50px;
      height:50px;
      border-radius:50%
    }
  </style>
</head>
<body>

<div class="main-wrapper">


<?php   
require_once 'navbar.php';

?>



<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-12">
<div class="page-sub-header">
<h3 class="page-title">Students</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="students.html">Student</a></li>
<li class="breadcrumb-item active">All Students</li>
</ul>
</div>
</div>
</div>
</div>

<div class="student-group-form">
<div class="row">
<div class="col-lg-3 col-md-6">

</div>

</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card card-table comman-shadow">
<div class="card-body">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Apprentissages</h3>
</div>

<div class="col-auto text-end float-end ms-auto download-grp">
<form action="inparfi.php" method="post">
  <input type="submit" value="Download" class="btn btn-outline-primary me-2" name="submit">
</form>
<a href="students-grid.php" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>

<a href="add-student.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>

</div>
</div>
</div>
<div class="row">
  <div class="col-4"><div class="form-group" id="allfillier">
</div></div>
  <div class="col-4"><input id="ser" class="form-group form-control"type="text" placeholder="Recherche.." style="width:500px"></div>
</div>

<div class="table-responsive" id="allstudents">
<table class='table border-0 star-student table-hover table-center mb-0 datatable table-striped' >
  <thead class='student-thread'>
  <tr>
  <th>Photo</th>
  <th>Nom</th>
  <th>Prenom</th>
  <th>Genre</th>
  <th>Filiére</th>
  <th>Téléphone</th>
  <th>adresse</th>
  <th class='text-center'>Action</th>
  </tr>
  </thead>
  <tbody id='tb'>

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

</div>



<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- <script src="assets/plugins/datatables/datatables.min.js"></script> -->

<script src="assets/js/script.js"></script>
</body>
</html>