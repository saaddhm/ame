<!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>

$(document).ready(function() {
  var selectbox = document.querySelector('#sl');
  dselect(selectbox, {
    search: true
  });
});

</script> -->
<?php
require 'config.php';

$sql="SELECT * FROM filiere";

$res=mysqli_query($db,$sql);
$out="";
if($res)
{
  $out.="<select   class='form-control  sl' id='sl' onchange='getappr(this.id,tb)'>
   <option disabled selected>Recherche Filiére</option>
   <option value='0' selected>All</option>";
  while ($i=mysqli_fetch_array($res)) {
    $out.="<option value=". $i['id_filiere']."  id=". $i['id_filiere'].">". $i['nom_filiere']."</option>";
  }
  $out.="</select>";
echo $out;

}

?>