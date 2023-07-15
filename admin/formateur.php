<?php
require 'config.php';





$sql="SELECT  * FROM formateur";
$res=mysqli_query($db,$sql);

if($res)
{

  while ($i=mysqli_fetch_array($res)) {
      echo "
    <tr>
  border-radius: ;
    <td><img src='assets/uploads/".$i['photo_formateur']."' class='alae' style='width: 50px;border-radius:50%  ;height: 50px;' ></td>
     <td>". $i['nom_formateur']."</td>
     <td>". $i['prenom_formateur']."</td>
     <td>". $i['telephone_formateur']."</td>
     <td>". $i['adresse_formateur']."</td>
     <td><a href='' class='btn btn-danger mx-2 px-3 text-light'>Delete</a>
     <a href='absenceformatur.php?id=".$i['id_formateur']."' class='btn btn-warning mx-2  px-3 text-light'>absence</a></td>

     <td><div id='allfl'>
</div>
     </td>
      </tr>
    ";
  }


}

?>