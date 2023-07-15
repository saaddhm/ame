<?php
require_once "config.php";


    $nom = $_GET['nom'];
    $matier = $_GET['matier'];
    $filier = $_GET['ff'];
    $nt1 = $_GET['nt1'];
    $nt2 = $_GET['nt2'];
    $nt3 = $_GET['nt3'];
    $nt4 = $_GET['nt4'];

    $sql1 = "SELECT lanote.id_matier as mt, lanote.id_apprentie as ap
    FROM lanote
    JOIN apprenties ON lanote.id_apprentie = apprenties.id_apprentie
    JOIN matier ON lanote.id_matier = matier.id_matier
    WHERE lanote.id_matier='$matier' AND apprenties.id_apprentie='$nom'";

    $res1 = mysqli_query($db, $sql1);
    $row = mysqli_fetch_assoc($res1);

    if ( $row['mt'] > 0 && $row['ap'] > 0) {
        // UPDATE
        $sql = "UPDATE lanote SET note_1 = $nt1, note_2 = $nt2, note_3 = $nt3, note_4 = $nt4 WHERE id_matier = $matier AND lanote.id_apprentie = '$nom'";

        $res = mysqli_query($db, $sql);

        if ($res) {
            header('Location: all_note.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    } else {
        // INSERT

        if (!empty($nt1)) {
            # code...
            $nt4=0;
            $nt2=0;
            $nt3=0;
              $sql = "INSERT INTO lanote (id_filiere, id_matier, id_apprentie, note_1, note_2, note_3, note_4) VALUES ( $filier, $matier, $nom, $nt1, $nt2, $nt3, $nt4)";
        $res = mysqli_query($db, $sql);

        if ($res) {
            header('Location: all_note.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        }
      
    }

?>
