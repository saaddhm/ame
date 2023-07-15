<?php
include 'config.php';

    // Retrieve form values
    $old = $_POST['old'];
    $new = $_POST['new'];
    $con = $_POST['con'];

    // Check if old password matches the stored password and new password matches the confirmed password
    if ($old == $_SESSION['pass']  && $old==$con ) {
        // Update the password in the database
        $st="UPDATE `login_formateur` SET `password`='$con' WHERE id_login=".$_SESSION['idf']."";
        $resst= $db->query($st);
        if ($res) {
        echo "
        <script>Swal.fire({
          position: 'top-center',
          icon: 'success',
          title: 'Le mot de passe a été changé avec succès.',
          showConfirmButton: false,
          timer: 1500
        })</script>";
    } 
    else {
        echo "
        <script>Swal.fire({
          position: 'top-center',
          icon: 'danger',
          title: 'Le mot de passe n est pas changé avec succès.',
          showConfirmButton: false,
          timer: 1500
        })</script>";
    }
    } 

?>