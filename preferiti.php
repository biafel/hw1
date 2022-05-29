<?php 
 session_start();

 $conn = mysqli_connect("localhost","root","","test_data") or die("Errore: ".mysqli_connect_error());


 $user_id = $_SESSION["user_id"]; // non funziona perchè non trova la variabile session id, quindi devi inserirla quando fai il login.
 //dovrebbe funzionare
 $query = "SELECT img, url FROM favorites WHERE id_user = $user_id limit 6";
 $res = mysqli_query($conn,$query);

 $preferiti=array();

 while($row=mysqli_fetch_assoc($res)){
     $preferiti[]=$row;
 }
 echo json_encode($preferiti);
 
 ?>
