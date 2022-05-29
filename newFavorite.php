<?php
    session_start();

    if(!isset($_SESSION["user_id"])){
        header("Location: login.php");
        exit;
    }
    
    $conn = mysqli_connect("localhost","root","","test_data");
        
    /*echo $_GET["img"];
    echo $_GET["url"];*/

    $user_id = $_SESSION['user_id'];
    $img = mysqli_real_escape_string($conn,$_GET["img"]);
    $url = mysqli_real_escape_string($conn,$_GET["url"]);         

    $queryIns = "INSERT INTO favorites( id_user, img, url) VALUES ('$user_id','$img','$url')";  
    
    $res=mysqli_query($conn,$queryIns) or die("errore: ".mysqli_error($conn));
    mysqli_close($conn);
    
?>