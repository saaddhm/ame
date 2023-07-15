<?php
require 'config.php';
if (isset($_POST['submit'])) {
  # code...


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$cin=$_POST['cin'];

  // Insert image file name into database
  $sql = "INSERT INTO `filiere`( `nom_filiere`, `period_filier`) VALUES ('".$nom."','".$prenom."')";
  $sql2 = "INSERT INTO `matier`( `nom_matier`) VALUES ('".$cin."')";
?>
<?php
if (mysqli_query($db, $sql) && mysqli_query($db, $sql2)  ) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>".$nom. " ". $cin."!</strong> Bien Ajouter.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  
 } 
 else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
 }
?>