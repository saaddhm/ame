<?php
require 'config.php';





$sql11="SELECT  * FROM apprenties";
$res11=mysqli_query($db,$sql);

if($res11)
{

  while ($i=mysqli_fetch_array($res11)) {
     echo"
    <tr>
  border-radius: ;
    <td><img src='assets/uploads/".$i['photo_apprentie']."' class='alae' style='width: 50px;border-radius:50%  ;height: 50px;' ></td>
     <td>". $i['nom_apprentie']."</td>
     <td>". $i['prenom_apprentie']."</td>
     <td>". $i['genre_apprentie']."</td>
     <td>". $i['telephone_apprentie']."</td>
     <td>". $i['adresse_apprentie']."</td>
     <td><div id='allfl'>
</div>
     </td>
      </tr>
    ";
  }


}

?>