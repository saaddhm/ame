<?php
require 'config.php';
if (isset($_POST['submit'])) {
  # code...

$target_dir = "assets/uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}



// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } 
}
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$cin=$_POST['cin'];
$mat=$_POST['mat'];
$tele=$_POST['tele'];


  // Insert image file name into database
  $image_name = $_FILES["image"]["name"];
  $sql = "INSERT INTO `login_formateur`( `nom`, `prenom`, `id_formateur`, `username`, `password`, `img`) VALUES
   ('".$nom."','".$prenom."','".$mat."','".$cin."','".$tele."','".$image_name."')";

?>
<?php
if (mysqli_query($db, $sql) ) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>".$nom. " ". $prenom."!</strong> Bien Ajouter.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  
 } 
 else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
 }
?>