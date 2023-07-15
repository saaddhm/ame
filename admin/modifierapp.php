
<?php
// error_reporting(0);
include 'config.php';

//probleme d'image

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    // $imgup = $_POST['imgup'];
    // $img_name = $_FILES['imgup']['name']; // Get the actual file name
    // $tmp_name = $_FILES['imgup']['tmp_name'];
    // $folder = 'assets/uploads/';
    // move_uploaded_file($tmp_name, $folder . $img_name);

  // $image = isset($_FILES['image']['name']);

$img_name='logoame.jpg';
  $nvs = isset($_POST['nvs']) ? $_POST['nvs'] : "";
  $appid = isset($_POST['appid']) ? $_POST['appid'] : "";
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $genre = $_POST['genre'];
  $datee = $_POST['datee'];
  $tele = $_POST['tele'];
  $adresse = $_POST['adresse'];

  // if ($image=="") {
  //   # code...
  //   $image=$_SESSION['imageapp'];
  // }
  // if (empty($image)) {
  //   $sqlimg = "SELECT * FROM apprenties WHERE id_apprentie=" . $_SESSION['idapp'];
  //   $resimg = mysqli_query($db, $sqlimg);
  //   $t = mysqli_fetch_array($resimg);

  //   $sql = 'UPDATE apprenties SET nom_apprentie=?, prenom_apprentie=?, date_naissance_apprentie=?, telephone_apprentie=?, adresse_apprentie=?, photo_apprentie=?, genre_apprentie=?, niveaux_scolaire_apprentie=? WHERE id_apprentie=?';
  //   $stmt = mysqli_prepare($db, $sql);
  //   mysqli_stmt_bind_param($stmt, 'ssssssssi', $nom, $prenom, $datee, $tele, $adresse, $t['photo_apprentie'], $genre, $nvs, $_SESSION['idapp']);
  //   $res = mysqli_stmt_execute($stmt);

   
  // }else {
    
    $sqlimg = "SELECT * FROM apprenties WHERE id_apprentie=" . $_SESSION['idapp'];
    $resimg = mysqli_query($db, $sqlimg);
    $t = mysqli_fetch_array($resimg);

    $sql = 'UPDATE apprenties SET nom_apprentie=?, prenom_apprentie=?, date_naissance_apprentie=?, telephone_apprentie=?, adresse_apprentie=?, photo_apprentie=?, genre_apprentie=?, niveaux_scolaire_apprentie=? WHERE id_apprentie=?';
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssssi', $nom, $prenom, $datee, $tele, $adresse, $img_name, $genre, $nvs, $_SESSION['idapp']);
    $res = mysqli_stmt_execute($stmt);

   
  // }
  // Perform necessary validations and checks on the uploaded image if required

 
  
  if ($res) {
  
    echo "success";
  } else {
    echo 'Failed';
  }
}

?>
