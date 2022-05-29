<?php 
 session_start();

 $conn = mysqli_connect("localhost","root","","test_data") or die("Errore: ".mysqli_connect_error());

 $user_id = $_SESSION["user_id"];

 $query = "SELECT img, url FROM ultimi_ascolti WHERE id_user = $user_id limit 6";

 $res = mysqli_query($conn,$query);

 $ultimi_ascolti=array();

 while($row=mysqli_fetch_assoc($res)){
     $ultimi_ascolti[]=$row;
 }
 echo json_encode($ultimi_ascolti);
  
 ?>
