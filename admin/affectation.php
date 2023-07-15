<?php
require 'config.php';
  $selectedFiliere = $_POST['formation'];
  $selectedApprenties = $_POST['apprentie'];


  foreach ($selectedApprenties as $selectedApprentie) {
      // Perform the database INSERT query using $selectedFiliere and $selectedApprentie

      // Example query using mysqli prepared statement:
      $stmt = $db->prepare("INSERT INTO af (id_filiere, id_apprentie) VALUES (?, ?)");
      $stmt->bind_param("ii", $selectedFiliere, $selectedApprentie);
      $stmt->execute();
      $stmt->close();
        header("location:allapprenties.php");

  }

?>


