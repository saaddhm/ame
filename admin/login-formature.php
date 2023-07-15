<?php
require_once "config.php";
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
<script>
    $(document).ready(function(){
  $('#sl').on('change', function(){
      var flid = $(this).val();
        $.get(
          "logforminfos.php",
          {
            flid:flid,
          },
          function(data) {
            $('#tb').html(data);
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
<h3 class="page-title">Add formateur</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="students.html">formateur</a></li>
<li class="breadcrumb-item active">Add formateur</li>

</ul>
</div>
</div>
</div>
</div>
<?php

if (isset($_POST['submit'])) {
  # code...


// Allow certain file formats

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$username=$_POST['username'];
$idfor=$_POST['idfor'];
$pass=$_POST['password'];


  // Insert image file name into database

  $sql = "INSERT INTO `login_formateur`(  `id_formateur`, `username`, `password`) VALUES
   ('".$idfor."','".$username."','".$pass."')";


if (mysqli_query($db, $sql) ) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>".$nom. " ". $prenom."!</strong> Bien Ajouter.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  
 } 
 else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
<h5 class="form-title student-info">Student Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>formateur <span class="login-danger">*</span> </label>
<select name="idfor" class="form-control" id="sl">
    <option class="disabled">Select formateur</option>
    <?php
    $sql1 = "SELECT * FROM formateur";
    $result1 = $db->query($sql1);
    
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {

            echo '<option value="' . $row1['id_formateur'] . '">' . $row1['nom_formateur'] . ' ' . $row1['prenom_formateur'] . '</option>';
        }
    } else {
        echo '0 results';
    }
    ?>
</select>


</div>
</div>
<div class="row" id="tb"></div>



<!-- 
<div class="col-12 col-sm-4">
<div class="form-group students-up-files">
<label>Upload Student Photo (150px X 150px)</label>
<div class="uplod">
<label class="file-upload image-upbtn mb-0">
Photo File <input type="file" name="image">
</label>
</div>
</div>
</div> -->
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