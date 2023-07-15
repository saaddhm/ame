<?php

require_once "config.php";
$idf=$_GET['nomfr'];

?>
    <?php
  
  $sql="SELECT * FROM apprenties,af,filiere
  where af.id_filiere=filiere.id_filiere and af.id_apprentie=apprenties.id_apprentie and filiere.id_filiere='".$idf."'";
  $res=mysqli_query($db,$sql);
  $req="SELECT * FROM `filiere` WHERE `id_filiere`='$idf'";
  $rs=mysqli_query($db,$req);
  $j=mysqli_fetch_array($rs);
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?php echo $j['nom_filiere'];  echo date("Y/m/d"); ?></title>
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
    
    <script>
      function PrintPage() {
    window.print();
    
}
window.addEventListener('DOMContentLoaded',(event)=>{
    PrintPage()
    setTimeout(() => {
        window.close();
        window.history.back();
    }, 750);
});
    </script>
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
    <div class="col-12 mt-5">
    
        <samp style="font-size: 50px; "><?php echo $j['nom_filiere']; ?></samp>
        <br>
    <?php echo date("Y/m/d"); ?>
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
    
  
    <table border=1>
    
      <tr class='table border-1 text-center'>
      
  <th class='table border-1'>Nom et Prénom</th >
  <th class='table border-1' colspan=2>Lundi</th >
  <th class='table border-1' colspan=2>Mardi</th >

  <th class='table border-1' colspan=2>Mercredi</th >
  <th class='table border-1' colspan=2>Jeudi</th >
  <th  class='table border-1'colspan=2>Vendredi</th >
      </tr>
    
      <tbody id='tb'>
        <?php

       
        if ($res->num_rows > 0) 
        {
          $m=0;
           while($i= $res->fetch_assoc())
           {
            $m++;

                 echo "<tr class='text-center'>

     <td  class='table border-1'>". $i['nom_apprentie']." ".$i['prenom_apprentie']."</td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     <td  class='table border-1'><input type='checkbox' name=' id='></td>
     
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
    
    <!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>