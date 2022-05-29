<?php 
 session_start();

    $conn = mysqli_connect("localhost","root","","test_data") or die("Errore: ".mysqli_connect_error());

    $user_id = $_SESSION["user_id"];

    $img = mysqli_real_escape_string($conn,$_GET["img"]);
    $url = mysqli_real_escape_string($conn,$_GET["url"]);   

    $query_insert = "INSERT into ultimi_ascolti VALUES ('$user_id', '$img', '$url')";

    $res = mysqli_query($conn,$query_insert);

    mysqli_close($conn);

 ?>