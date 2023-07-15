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

        $(document).ready(
            function () {
                $('#mytable').DataTable();
            }
        );


  function getallappt(){
    $.ajax({
      url: "allbene.php",
      type: "GET",
      dataType: "html",
      success: function(data){
        $("#tbapp").html(data);
      }
    });

  }
//   getallappt();

$(document).ready(function(){
  $("#ser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbapp tr").filter(
      function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>

<body>

    <div class="main-wrapper">
<?php
require 'navbar.php';
?>
<input type="checkbox" >
        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Welcome <?php  echo $_SESSION['nomf']." ".$_SESSION['prenomf']   ?></h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ul>
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
<h3 class="page-title">Apprenties</h3>
</div>
<div class="col-auto text-end float-end ms-auto download-grp">

</div>
</div>
</div>
<div class="row">
  
</div>
  <!-- <div class="col-4"><input id="ser" class="form-group form-control"type="text" placeholder="Recherche.." style="width:500px"></div> -->
</div>
<div class="table-responsive m-4">
<table id="mytable" class="table table-striped m-4 border" style="width:100%">
    <thead class="text-light" STYLE="background:#B0C4DE">
        <tr>
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>examen 1</th>
            <th>examen 2</th>
            <th>examen 3</th>
            <th>examen 4</th>

            <th>total</th>
        </tr>
    </thead>
    <tbody id="tbapp">
    <?php
       
       $sql111 = "SELECT `photo_apprentie`,`nom_apprentie`,`prenom_apprentie`,note_1,note_2,note_3,note_4 FROM apprenties,lanote,formateur,login_formateur,matier WHERE lanote.id_apprentie=apprenties.id_apprentie AND lanote.id_matier=matier.id_matier AND formateur.id_matier=matier.id_matier AND formateur.id_formateur=login_formateur.id_formateur
       AND login_formateur.id_formateur= '".$_SESSION['idf']."';
       ";
       
 
       $res111 = mysqli_query($db, $sql111);

      
       

       if ($res111 && mysqli_num_rows($res111) > 0) {
           while ($j = mysqli_fetch_array($res111)) {
            $total=($j['note_1']+$j['note_2']+$j['note_3']+$j['note_4'])/4;
               echo "
               <tr>
                   <td ><img src='../admin/assets/uploads/" . $j['photo_apprentie'] . "' class='alae' style='width: 50px;border-radius:50%;height: 50px;'></td>
                   <td>" . $j['nom_apprentie'] . "</td>
                   <td>" . $j['prenom_apprentie'] . "</td>
                   <td>" . $j['note_1'] . "</td>
                   <td>" . $j['note_2'] . "</td>
                   <td>" . $j['note_3'] . "</td>

                   <td>" . $j['note_4'] . "</td>
                   <td>" . $total . "</td>

               </tr>";
           }
       }
       ?>
    </tbody>
</table>

  </tbody>
</table>
</div>
<!-- all students -->

</div>
</div>
</div>
</div>
</div>

</div>
            </div>
            <footer>
                <p>Copyright © 2022 AMESIP.</p>
            </footer>
        </div>
    </div>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>