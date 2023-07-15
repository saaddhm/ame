<?php
require 'config.php';
if (isset($_POST['submit'])) {
  # code...


$nom=$_POST['form'];
$prenom=$_POST['mat'];


  // Insert image file name into database
  $sql = "INSERT INTO `mf`( `id_filiere`, `id_matier`) VALUES ('".$nom."','".$prenom."')";
  
?>
<?php
if (mysqli_query($db, $sql)  ) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong></strong> Bien Ajouter.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  
 } 
 else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
 }
?>