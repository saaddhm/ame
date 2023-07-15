
<?php

require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AMESIP</title>
    <style>
    
    /* .dataTables_paginate .pagination a:first-child{
    background-color: #FFC300 ;
    border-color:black;
    color:black;
}
.dataTables_paginate .pagination a:focus{
    background-color: #FFC300 ;
    color:black;
    border-color:white;
}
.dataTables_paginate .pagination a:hover:first-child{
    background-color: #FFC300 ;
    color:black;
    border-color:black;
} */


 </style>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    
    <script defer src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

  
<script>
        $(document).ready(function() {
    $('#mytable').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json'
        }
    });
});

$(document).ready(function() {
  // DataTables initialization code with state saving
  $('#myTable').DataTable({
    stateSave: true
  });
});

</script>

  <!-- <script>
  function getallappt(){
    $.ajax({
      url: "allapp.php",
      type: "POST",
      dataType: "html",
      success: function(data){
        $("#tbapp").html(data);
      }
    });

  }
  getallappt();

$(document).ready(function(){
  $("#ser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbapp tr").filter(
      function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> -->

  
  <style>
    .imgrounded{
      width: 50px;
      height:50px;
      border-radius:50%
    }
  </style>
</head>
<body>

<div class="main-wrapper">


<?php   
require_once 'navbar.php';
?>



<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-12">
<div class="page-sub-header">
<h3 class="page-title">Apprentis</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="students.php">Apprentis</a></li>
<li class="breadcrumb-item active">All</li>
</ul>
</div>
</div>
</div>
</div>
<div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Apprenties</h6>
                                        <h3><?php
         $sql="SELECT COUNT(*) as total FROM `apprenties` ";
         $result = $db->query($sql);
         $row= $result->fetch_assoc();
         echo $row['total'];
           
         ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Formateurs</h6>
                                        <h3><?php
         $sql=" SELECT COUNT(*) as total FROM `formateur` ";

         $result = $db->query($sql);
         $row= $result->fetch_assoc();
         echo $row['total'];
           
         ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/formateur.png" alt="Dashboard Icon" width='50px'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Matière</h6>
                                        <h3><?php
         $sql=" SELECT COUNT(*) as total FROM `matier` ";

         $result = $db->query($sql);
         $row= $result->fetch_assoc();
         echo $row['total'];
           
         ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/matier.png" alt="Dashboard Icon" width='50px'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Filiers</h6>
                                        <h3><?php
         $sql=" SELECT COUNT(*) as total FROM `filiere` ";

         $result = $db->query($sql);
         $row= $result->fetch_assoc();
         echo $row['total'];
           
         ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/filier.png" alt="Dashboard Icon" width='50px'>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
<div class="student-group-form">
<div class="row">
<div class="col-lg-3 col-md-6">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card card-table comman-shadow">
<div class="card-body">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Affectation des Apprentissages</h3>
</div>
<div class="col-auto text-end float-end ms-auto download-grp">
<!-- <a href="#.php" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a> -->
<!-- <a href="students-grid.php" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a> -->

<!-- <a href="add-student.php" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
</div>
</div>
</div>
<div class="row">
  <?php
if(isset($_POST['submit']))
{
    $selectedFiliere = $_POST['formation'];
    $selectedApprenties = $_POST['apprentie'];
  
  
    foreach ($selectedApprenties as $selectedApprentie) {
        // Perform the database INSERT query using $selectedFiliere and $selectedApprentie
  
        // Example query using mysqli prepared statement:
        // $stmt = $db->prepare("INSERT INTO af (id_filiere, id_apprentie) VALUES (?, ?)");
        // $stmt->bind_param("ii", $selectedFiliere, $selectedApprentie);
        // $stmt->execute();
        $sqlinsert="INSERT INTO af (id_filiere, id_apprentie) VALUES ($selectedFiliere,$selectedApprentie)";   

        if (mysqli_query($db, $sqlinsert)  ) {
            echo "
            <link href='https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css' rel='stylesheet'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js'></script>
            <script>
            Swal.fire({
              position: 'top-center',
              icon: 'success',
              title: 'Apprentis est bien Affectez.',
              showConfirmButton: false,
              timer: 1500
            })
            </script>";
            
        }
        //   $stmt->close();
    }
}


?>
</div>
  <!-- <div class="col-4"><input id="ser" class="form-group form-control"type="text" placeholder="Recherche.." style="width:500px"></div> -->


</div>

<div class="table-responsive m-4">
<table  class="table table-striped m-4 border" style="width:100%">
  <thead class='student-thread'>
  <tr>
    <th>&nbsp;&nbsp;#</th>
  <th>Photo</th>
  <th>Nom</th>
  <th>Prenom</th>
  <th>Genre</th>
  <th>Téléphone</th>
  <th>adresse</th>
  <th>Affectation</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody id='tbapp'>
<?php



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
        <form action='#' method='post' enctype='multipart/form-data'>
            <tr>
                <td><input type='checkbox' value='" . $i['id_apprentie'] . "' name='apprentie[]' required></td>
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
                            <option disabled selected>choisir un filière</option>";

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
                <td><input type='submit' class='btn btn-success' value='affecter' name='submit'/></td>
            </tr>
        </form>";
    }

    echo $out;
}
?>

  </tbody>
</table>
<!-- all students -->
</div>
</div>
</div>
</div>
</div>
</div>

</div>

</div>



<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- <script src="assets/plugins/datatables/datatables.min.js"></script> -->

<script src="assets/js/script.js"></script>
</body>
</html>