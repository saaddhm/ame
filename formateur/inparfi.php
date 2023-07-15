<?php

require_once "config.php";
$idf=$_POST['sl'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AMESIP</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body >
     
  <div class="row">
    
    <div class="col-sm-12">
    <div class="card card-table comman-shadow">
    <div class="card-body">
    <div class="row text-center">
            <div class="col-12">
            <img src="assets/img/logo-small.png" class="img-fluid" style="height: 90px;width: 90px;border-radius: 50%;">
    </div>
    
    <br><br>
    <div class="col-12">
        
        <samp style="font-size: 20px;">la table de apprenties</samp>
    
  </div>
    <div class="page-header">
    <div class="row align-items-center">
    <div class="col">
    <h3 class="page-title"></h3>
    </div>
    <div class="col-auto text-end float-end ms-auto download-grp">
      
           </div>
    
   
    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-4"><div class="form-group" id="allfillier">
    </div>
</div>
    </div>
    
    <div class="table-responsive" id="allstudents">
    <table class='table border-0 star-student table-hover table-center mb-0 datatable table-striped' n>
      <thead class='student-thread'>
      <tr>
      
  <th>Nom</th>
  <th>Prenom</th>
  <th>Genre</th>
  <th>Filiére</th>
  <th>Téléphone</th>
  <th>adresse</th>
      </tr>
      </thead>
      <tbody id='tb'>
        <?php
       $sql="SELECT * FROM apprenties,af,filiere
       where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie and filiere.id_filiere='".$idf."'";
       $res=mysqli_query($db,$sql);
       
        if ($res->num_rows > 0) 
        {
           while($i= $res->fetch_assoc())
           {
                 echo "<tr>
     <td>". $i['nom_apprentie']."</td>
     <td>". $i['prenom_apprentie']."</td>
     <td>". $i['genre_apprentie']."</td>
     <td>". $i['nom_filiere']."</td>
     <td>". $i['telephone_apprentie']."</td>

     <td>". $i['adresse_apprentie']."</td>
                 </tr>";
    
               }
            }
            else{
                echo "<tr><td colspan=2><center>0 results </center></td></tr>";
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
    
    <!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>