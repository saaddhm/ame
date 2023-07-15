<?php


if (isset($_POST['submit'])) {
    $selectedFiliere = $_POST['formation'];
    $selectedApprenties = $_POST['apprentie'];
  
    $sqlaff="INSERT INTO `af`(`id_apprentie`, `id_filiere`) value($selectedApprenties,$selectedFiliere)";
    $resaff=mysqli_query($db, $sqlaff) ;
    if ($resaff) {
      # code...
      header('location:allapprenties.php');
    }else{
      echo "<script>alert('Apprentie non ajouter '); </script>";
    }
  
  }

  ?>