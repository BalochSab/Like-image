<?php 
    $username = $_POST['un'];
    $userpass = $_POST['up'];
    $con  = mysqli_connect("localhost","root","","fb");

    $sql_check = "SELECT * FROM user WHERE username = '{$username}' AND u_pass = '{$userpass}'";
    $result = mysqli_query($con,$sql_check) or die(mysqli_error($con));
    $count = mysqli_num_rows($result) or die(mysqli_error($con));
    if ($count>0) {

        
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["u_id"] = $row["u_id"];
        $_SESSION["username"] = $row["username"];
        
        echo 1;
        
    }else{
        echo 0;
    }
    
?>