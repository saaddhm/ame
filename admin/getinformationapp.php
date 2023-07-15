<?php
require 'config.php';

if (isset($_POST['sl'])) {
  $difl = $_POST['sl'];

  if ($difl == '0') {
    $sql = "SELECT * FROM apprenties, af, filiere
            WHERE af.id_filiere = filiere.id_filiere
            AND af.id_apprentie = apprenties.id_apprentie";
    $res = mysqli_query($db, $sql);

    $out = "<option disabled selected>Select Apprentie</option>";
    if ($res) {
      while ($i = mysqli_fetch_assoc($res)) {
        $out .= "<option value='" . $i['id_apprentie'] . "'>" . $i['nom_apprentie'] . " " . $i['prenom_apprentie'] . "</option>";
      }
    }

    echo $out;
  } else {
    $sql = "SELECT * FROM apprenties, af, filiere
            WHERE af.id_filiere = filiere.id_filiere
            AND af.id_apprentie = apprenties.id_apprentie
            AND filiere.id_filiere = '" . $difl . "'";
    $res = mysqli_query($db, $sql);

    $out = "<option disabled selected>Select Apprentie</option>";
    if ($res) {
      while ($i = mysqli_fetch_assoc($res)) {
        $out .= "<option value='" . $i['id_apprentie'] . "'>" . $i['nom_apprentie'] . " " . $i['prenom_apprentie'] . "</option>";
      }
    }

    echo $out;
  }
}
?>
