<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>AMESIP</title>


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

        $(document).ready(
            function () {
                $('#mytable').DataTable();
            }
        );

    
// function getallf(){
//   $.ajax({
//     url: "allfilier.php",
//     type: "POST",
//     dataType: "html",
//     success: function(data){
//       $("#allfillier").html(data);
//     }
//   });
// }
// getallf();
  </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
  function getallappt(){
    $.ajax({
      url: "formateur.php",
      type: "GET",
      dataType: "html",
      success: function(data){
        $("#tbapp").html(data);
      }
    });

  }
  getallappt();


</script>
</head>

<body>

    <div class="main-wrapper">
<?php
require 'navbar.php';
?>

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Welcome Admin!</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
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
                    
                <div class="row">
<div class="col-sm-12">
<div class="card card-table comman-shadow">
<div class="card-body">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Formateurs</h3>
</div>
<div class="col-auto text-end float-end ms-auto download-grp">

</div>
</div>
</div>

<div class="row">
  
<!-- </div>
  <div class="col-4"><input id="ser" class="form-group form-control"type="text" placeholder="Recherche.." style="width:500px"></div>
</div> -->

<div class="table-responsive" >
<table id='mytable' class="table table-striped m-4 border text-ceter" style="width:100%">
  <thead class='student-thread'>
  <tr >
  <th >Photo</th>
  <th>Nom</th>
  <th>Prenom</th>
  <th>Téléphone</th>
  <th>Adresse</th>
  <th>Matier</th>
  <th>Status</th>
  <th class="textcenter">action</th>
  </tr>
  </thead>
  <tbody >
    <?php
  $sql="SELECT  * FROM formateur,matier,login_formateur
  WHERE formateur.id_matier=matier.id_matier
  AND formateur.id_formateur=login_formateur.id_formateur";
$res=mysqli_query($db,$sql);

if($res)
{

  while ($i=mysqli_fetch_array($res)) {
    if ($i['status']==1) 
    {
        # code...
 
    ?>

    <tr>

    <td><img src='../formateur/assets/uploads/<?php echo $i['photo_formateur']?>' class='alae' style='width: 50px;border-radius:50%  ;height: 50px;' ></td>
     <td><?php echo $i['nom_formateur']?></td>
     <td><?php  echo$i['prenom_formateur']?></td>
     <td><?php echo$i['telephone_formateur']?></td>
     <td><?php echo$i['adresse_formateur'] ?></td>
     <td><?php echo$i['nom_matier'] ?></td>
     <td><span class="badge bg-success">Enligne</span></td>
     <td class="text-center"><a href='supformateur.php?idf=<?php echo $i['id_formateur']?>' class='btn btn-danger mx-2 px-3 text-light'>Delete</a>
     <a href='#' class='btn btn-success mx-2 px-3 text-light'>Modifier</a>
   

    </td>
      </tr>
  <?php
  }

else {
    ?>
 <tr>

<td><img src='../formateur/assets/uploads/<?php echo $i['photo_formateur']?>' class='alae' style='width: 50px;border-radius:50%  ;height: 50px;' ></td>
 <td><?php echo $i['nom_formateur']?></td>
 <td><?php  echo$i['prenom_formateur']?></td>
 <td><?php echo$i['telephone_formateur']?></td>
 <td><?php echo$i['adresse_formateur'] ?></td>
 <td><?php echo$i['nom_matier'] ?></td>
 <td><span class="badge bg-danger">Hors_ligne</span></td>
 <td class="text-center"><a href='supformateur.php?idf=<?php echo $i['id_formateur']?>' class='btn btn-danger mx-2 px-3 text-light'>Delete</a>
 <a href='#' class='btn btn-success mx-2 px-3 text-light'>Modifier</a>

</td>
  </tr>
    <?php
}
}
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
            <footer>
                <p>Copyright © 2022 Dreamguys.</p>
            </footer>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>