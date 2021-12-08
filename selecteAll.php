<?php 
    $con  = mysqli_connect("localhost","root","","fb");
    session_start();
    $user_id = $_SESSION["u_id"];
    $sql = "SELECT * FROM tbl_img;";
     
    $dbquery = mysqli_query($con,$sql) or dir(mysqli_error($con));
    $count = mysqli_num_rows($dbquery);
    if ( $count > 0) {
        while ($imgs = mysqli_fetch_array($dbquery)) {
            $lk = mysqli_query($con,"SELECT * FROM img_like_quanity where img_like = {$imgs[0]} and user_like = {$user_id}");
            $Tlkimg = mysqli_query($con,"SELECT * FROM img_like_quanity where img_like = {$imgs[0]}");
            $TotalLikeSingle_img = mysqli_num_rows($Tlkimg);
            echo "<div style='float:left;margin:10px;'><img src='./images/$imgs[1]' alt='$imgs[1]' width='100px' height='100px'><br>";
            if (mysqli_num_rows($lk) > 0) {
                echo "<input type='button' class='lk' value='Dislike ' data-imgid='$imgs[0]'>$TotalLikeSingle_img</div>";

            }else{
            echo "<input type='button' class='lk' value='Like' data-imgid='$imgs[0]'>$TotalLikeSingle_img</div>";
            }
        }
    }else{
        echo 'Record Not Found';
    }


?>