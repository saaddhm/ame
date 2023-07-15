<?php
require 'config.php';

$out = "";

$sql = "SELECT * FROM apprenties
        WHERE id_apprentie NOT IN (
            SELECT id_apprentie FROM af
            WHERE af.id_apprentie = apprenties.id_apprentie
        )";
$res = mysqli_query($db, $sql);

if ($res) {
    while ($i = mysqli_fetch_array($res)) {
        $out .= "
        <form action='#' method='post'>
            <tr>
                <td><input type='checkbox' value='" . $i['id_apprentie'] . "' name='apprentie[]'></td>
                <td><img src='assets/uploads/" . $i['photo_apprentie'] . "' class='img-rounded' style='width: 50px; border-radius: 50%; height: 50px;'></td>
                <td>" . $i['nom_apprentie'] . "</td>
                <td>" . $i['prenom_apprentie'] . "</td>
                <td>" . $i['genre_apprentie'] . "</td>
                <td>" . $i['telephone_apprentie'] . "</td>
                <td>" . $i['adresse_apprentie'] . "</td>
                <td>";

        $sql2 = 'SELECT * FROM filiere';
        $result2 = $db->query($sql2);

        if ($result2) {
            if ($result2->num_rows > 0) {
                $out .= "<select name='formation' class='form-control'>
                            <option disabled selected>Select Formation</option>";

                while ($row2 = $result2->fetch_assoc()) {
                    $out .= "<option value='" . $row2['id_filiere'] . "'>" . $row2['nom_filiere'] . "</option>";
                }

                $out .= "</select>";
            } else {
                $out .= "No formations found.";
            }
        } else {
            $out .= "Error fetching formations: " . $db->error;
        }

        $out .= "</td>
                <td><input type='submit' class='btn btn-light' value='affecter' name='submit'/></td>
            </tr>
        </form>";
    }

    echo $out;
}

if (isset($_POST['submit'])) {
    $selectedFiliere = $_POST['formation'];
    $selectedApprenties = $_POST['apprentie'];

    foreach ($selectedApprenties as $selectedApprentie) {
        // Perform the database INSERT query using $selectedFiliere and $selectedApprentie

        // Example query using mysqli prepared statement:
        $stmt = $db->prepare("INSERT INTO af (id_filiere, id_apprentie) VALUES (?, ?)");
        $stmt->bind_param("ii", $selectedFiliere, $selectedApprentie);
        $stmt->execute();
        $stmt->close();
    }
}
?>
