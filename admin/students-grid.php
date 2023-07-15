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
<style>
  .ii{
    width: 100px;
    height:100px;
    border-radius:50%;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	</script>
  <script>
     $(document).ready(function(){
  $('#sl').on('change', function(){
      var sl = $(this).val();
          $.ajax({
              type:'POST',
              url:'allaprentiesgrid.php',
              data:'sl='+sl,
              success:function(html){
                $('#tb2').html(html);
              }
          });
        });
  });
     function getallapp2(){
    $.ajax({
      url: "allaprentiesgrid.php",
      type: "POST",
      dataType: "html",
      success: function(data){
        $("#tb2").html(data);
      }
    });

  }
  getallapp2();
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
<li class="breadcrumb-item"><a href="students.php">Student</a></li>
<li class="breadcrumb-item active"><a href="allapprenties.php">All Students</a></li>
</ul>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card card-table comman-shadow">
<div class="card-body pb-0">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Students</h3>
</div>
<div class="col-auto text-end float-end ms-auto download-grp">
<a href="students.php" class="btn btn-outline-gray me-2"><i class="feather-list"></i></a>
<a href="students-grid.php" class="btn btn-outline-gray me-2 active"><i class="feather-grid "></i></a>
</div>
</div>
</div>
<div class="student-group-form">
<div class="row">
<div class="col-lg-3 col-md-6">
<div class="form-group" id="allfillier">
</div>
</div>
<div class="student-pro-list">

<div class="row" id="tb2">





</div>
</div>
</div>
</div>
</div>
</div>
</div>

<footer>
<p>Copyright © 2022 Dreamguys.</p>
</footer>

</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>