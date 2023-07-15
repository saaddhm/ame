
<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AMESIP</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper">


<?php 
require_once "navbar.php";

?>


<div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Welcome <?php  echo $_SESSION['nomf']." ".$_SESSION['prenomf']   ?></h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form action="ex.php"  methode="post"  >
<div class="row">
<div class="col-12">

<h5 class="form-title"><span>ajouter  examen</span></h5>
</div>
<div class="col-12 col-sm-6">
    
<div class="form-group">
<label>nom de examen</label>
<input type="text" class="form-control" name="nom" >

</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>date de examen </label>
<input type="date" class="form-control" name="date" >


</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Filier</label>
<select class="form-control select" id="exampleFormControlSelect1" name='filier'>

    <?php
$sql2 = "SELECT filiere.nom_filiere, filiere.id_filiere AS tt
FROM filiere, mf, login_formateur, formateur, matier
WHERE filiere.id_filiere = mf.id_filiere
  AND matier.id_matier = mf.id_matier
  AND login_formateur.id_formateur = formateur.id_formateur
  AND formateur.id_matier = matier.id_matier
  AND login_formateur.id_login = '".$_SESSION['idf']."';
";
$result2 = $db->query($sql2);
    // $_SESSION['nomfr'] = $row2['ide'];
   
    
if ($result2 && $result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        ?>
        <option value="<?php echo $row2['tt']; ?>">
            <?php echo $row2['nom_filiere']; ?>
        </option>
        <?php
    }
} else {
    echo '0 results';
}
?>

</select>


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


// if (isset($_POST['submit'])) {
//     $nom = $_POST['nom'];
//     $date = $_POST['date'];
    
//     // Insert image file name into database
    
//     $sql = "INSERT INTO examen (date_ex, nom_ex) VALUES (?, ?)";
//     $stmt = mysqli_prepare($db, $sql);
//     mysqli_stmt_bind_param($stmt, 'ss', $date, $nom);
    
//     if (mysqli_stmt_execute($stmt)) {
//         echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
//         <strong>".$nom."!</strong> Bien Ajouter.
//         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
//         </div>";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($db);
//     }
    
//     mysqli_stmt_close($stmt);
    
// }
?>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>