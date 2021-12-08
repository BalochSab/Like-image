<?php 
    
    session_start();
    $imgId = $_POST['Imgid'];
    $user_like = $_SESSION["u_id"];
    
    $con  = mysqli_connect("localhost","root","","fb");
    
    $sql_check = "SELECT * FROM img_like_quanity WHERE user_like = '{$user_like}' AND img_like = '{$imgId}'";
    
    $result = mysqli_query($con,$sql_check) ;
    $count = mysqli_num_rows($result);
    
    if ($count>0) {
        $DELquery = "DELETE FROM img_like_quanity WHERE user_like = '{$user_like}' AND img_like = '{$imgId}'";
        $dlt = mysqli_query($con,$DELquery);
        
    }else{
        $insquery = "INSERT INTO img_like_quanity VALUES(NULL,{$user_like},{$imgId})";
        $dlt = mysqli_query($con,$insquery);
    }
    // echo "nothing";
    
?>