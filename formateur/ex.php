<?php
require_once "config.php";

if (isset($_GET['nom']) && isset($_GET['date']) && isset($_GET['filier'])) {
    $nom = $_GET['nom'];
    $filier = $_GET['filier'];
    $date = $_GET['date'];

    // Insert image file name into database

    $sql = "INSERT INTO examen (date_ex, nom_ex, id_mat) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $date, $nom, $filier);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_stmt_close($stmt);
} else {
    echo 'Error VR';
}
?>
