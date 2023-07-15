
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

</head>
<body>

<div class="main-wrapper">


<?php 
require_once "navbar.php";
$_SESSION['idfi']=$_GET['idf'];
?>


<div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Welcome <?php  echo $_SESSION['nomf']." ".$_SESSION['prenomf']   ?></h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
<?php
$nomf=$_GET['cin'];
$sql = "SELECT *, `nom_apprentie` AS mm,prenom_apprentie as pp FROM `apprenties` WHERE apprenties.id_apprentie = '".$nomf."';

";


$res = mysqli_query($db, $sql);
$j = mysqli_fetch_array($res);
$sql1 = "SELECT *,nom_matier as nn FROM `formateur`,login_formateur,matier WHERE formateur.id_formateur=login_formateur.id_formateur AND formateur.id_matier=matier.id_matier AND login_formateur.id_formateur = '".$_SESSION['idf']."'";


$res1 = mysqli_query($db, $sql1);
$i = mysqli_fetch_array($res1);


$sql2 = "SELECT *,lanote.id_matier as mt, lanote.id_apprentie as ap
    FROM lanote
    JOIN apprenties ON lanote.id_apprentie = apprenties.id_apprentie
    JOIN matier ON lanote.id_matier = matier.id_matier
    WHERE lanote.id_apprentie='".$nomf."' ";

    $res2 = mysqli_query($db, $sql2);
    $row = mysqli_fetch_assoc($res2);
    $sql3 = "SELECT filiere.id_filiere as ff
    FROM af
    JOIN apprenties ON af.id_apprentie = apprenties.id_apprentie
    JOIN filiere ON filiere.id_filiere = af.id_filiere
    WHERE apprenties.id_apprentie = '".$nomf."'; ";

    $res3 = mysqli_query($db, $sql3);
    $row1 = mysqli_fetch_assoc($res3);
?>
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form action="ajnote.php"  methode="post"  >
<div class="row">
<div class="col-12">

<h5 class="form-title"><span>Les Informations d'apprentis</span></h5>
</div>
<div class="col-12 col-sm-6">
    
<div class="form-group">
<label>apprentie</label>
<input type="text" class="form-control" value="<?php  echo $j['mm']." ".$j['pp']  ?>" disabled >
<input type="hidden" value="<?php  echo $j['id_apprentie'];  ?>" name='nom'>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Matier </label>
<input type="text" class="form-control" value="<?php  echo $i['nn']  ?>" disabled >
<input type="hidden" value="<?php  echo $i['id_matier']; ?>"  name='matier'>
<input type="hidden" value="<?php  echo $row1['ff']; ?>"  name='ff'>
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>la note 1</label>
<input type="number" class="form-control" max="20" min="0" name='nt1' value='<?php  echo $row['note_1']; ?>'>
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>la note 2</label>
<input type="number" class="form-control" max="20" min="0" name='nt2'  value='<?php  echo $row['note_2']; ?>'>
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>la note 3</label>
<input type="number" class="form-control" max="20" min="0" name='nt3'  value='<?php  echo $row['note_3']; ?>'>
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>la note 4</label>
<input type="number" class="form-control" max="20" min="0" name='nt4'  value='<?php  echo $row['note_4']; ?>'>
</div>
</div>
<div class="col-12">
<input type="submit" value="submit" class="btn btn-primary" name="submit">
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
<?php


if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $matier = $_POST['matier'];
    $filier = $_POST['filier'];
    $note = $_POST['note'];

    // Insert image file name into database

    $sql = "INSERT INTO note (id_matier, id_apprentie, note, id_filiere) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $matier, $nom, $note, $filier);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
         Bien Ajouter.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    
    mysqli_stmt_close($stmt);
}
?>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>