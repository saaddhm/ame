<?php
require_once "db.php";

   $username=$_POST['username'];
   $password=$_POST['password'];
   $sql1="SELECT * FROM log_in WHERE  email='".$username."' and passeword='".$password."'";
   $result1 = $conn->query($sql1);
$row= $result1->fetch_assoc();
   if(mysqli_num_rows($result1)>0){
    $_SESSION['user']=$row['email'];
    $_SESSION['pass']=$row['passeword'];
    header("location:index.php");
   }
   else{
   echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
   <strong>Holy guacamole!</strong> You should check in on some of those fields below.
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>";
   }




?>