<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>like</title>
    <script src="jquery.min.js"></script>
</head>
<body>
    <!-- <div id="loginform" > -->
    <h1>Login</h1>
    <label for="uname">User Name</label>
    <input type="text" id="uname" name="uname">
    <label for="upass">Password</label>
    <input type="text" id="upass" name="upass">
    <input type="button" name="submit" id="login" value="login">
    <!-- </form> -->
    <div id="errors"></div>
    <div id="show"></div>
    
</body>
</html>
<script>
    $(document).ready(function(){
        
        $("#login").click(function(){

            // var formData = $("#loginform").serialize();
            var uname = $("#uname").val();
            var upass = $("#upass").val();
            // alert("btn is working"+uname+upass);
            
            $.ajax({
                url:"login.php",
                data: {un:uname,up:upass},
                type:"POST",
                success: function(dataReturn){
                    alert(dataReturn);
                    if (dataReturn == 1) {
                        // $("#loginform").hide();
                        // $("#uname").val("");
                        // $("#upass").val("");
                        // $("#errors").hide();
                        window.location.replace("images.php");
                    }
                    else{
                    $("#errors").html("Username or Password is incorrect!");
                    }
                    
                }
            });


        });
    });

</script>