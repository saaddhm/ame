<?php
require 'config.php';


$out="";


$sql="SELECT  * FROM apprenties";
$res=mysqli_query($db,$sql);

if($res)
{

  while ($i=mysqli_fetch_array($res)) {
     $out.="
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

echo $out;
}

?>