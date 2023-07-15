<?php

include('config.php');


$sql1="SELECT COUNT(apprenties.id_apprentie) as tt ,apprenties.nom_apprentie as nomb,apprenties.prenom_apprentie as preb,apprenties.photo_apprentie as img  FROM absence_apprenties,apprenties
WHERE absence_apprenties.id_apprentie=apprenties.id_apprentie 
GROUP BY absence_apprenties.id_apprentie
order by tt DESC
";

   $result1 = $conn->query($sql1);

while ($row1 = $result1->fetch_assoc()) {

    echo "
    <li class='notification-message'>
    <a href='>
    <div class='media d-flex'> 
    <img class='avatar-img rounded-circle alae'  src='assets/uploads/".$row1['img']."'>&nbsp; &nbsp;&nbsp; ".$row1['nomb']."  &nbsp;   ".$row1['preb']." ".$row1['tt']. "  
    </div>
    </a>
    </li>
    
    
    ";

}
     






?>
               <!-- <img class='avatar-img rounded-circle" src="image/"'.$row1['img'].'"> -->

<!-- $row1['nomb'].' '.$row1['preb'] .' '.$row1['tt'] -->