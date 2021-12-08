<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.min.js"></script>
</head>
<body>

    <h2>facebook</h2>
    <!-- here we show the list of images -->
    <div id="show">
    </div>
    <input type="button" id="logout" value="Logout">
   
</body>
</html>

<script>
    $(document).ready(function(){
        // this function load all images from database by ajax 

        function loadData(){
            $.ajax({
            url : "selecteAll.php",
            type : "POST",
            success : function(data){
                $("#show").html(data);
            }
        });
        }
        // calling function for load data 
        loadData();
        //this is like btn Onclick geting img id 
        $(document).on("click",".lk",function(){
            
            var imgid = $(this).data("imgid");

            $.ajax({
                url : "likepage.php",
                type : "POST",
                data : {Imgid:imgid},
                success : function(data){
                    loadData();  
                }
            });
        });
        $("#logout").click(function(){
            $.ajax({
                url:"logout.php",
                type:"POST",
                success: function(){
                    
                window.location.replace("index.php");
                    
                }
            });
        })
    });
        </script>