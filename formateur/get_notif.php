<?php

include('config.php');


   $sql1="SELECT COUNT(apprenties.id_apprentie) as tt ,apprenties.nom_apprentie as nomb,apprenties.prenom_apprentie as preb,apprenties.photo_apprentie as img  FROM absence_apprenties,apprenties
   WHERE absence_apprenties.id_apprentie=apprenties.id_apprentie 
   GROUP BY absence_apprenties.id_apprentie
   order by tt DESC
   ";
   $result1 = $conn->query($sql1);

   

     $i=0; 
     while($row1= $result1->fetch_assoc())
     {
     if ($row1['tt']>=4) {
    $i++;
     }
    }

$data=$i;


echo json_encode($data);


?>