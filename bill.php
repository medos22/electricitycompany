<?php
include("DB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer's Bill</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .gradient-background {
            height: 100%;
            background: linear-gradient(160deg, rgba(107,245,143,1) 0%, rgba(75,171,111,1) 76%, rgba(44,98,79,1) 100%, rgba(36,81,71,1) 100%, rgba(80,183,116,1) 100%, rgba(88,200,124,1) 100%, rgba(92,210,128,1) 100%, rgba(68,154,103,1) 100%, rgba(52,117,87,1) 100%, rgba(36,81,71,1) 100%, rgba(47,105,82,1) 100%, rgba(44,98,79,1) 100%, rgba(32,71,67,1) 100%, rgba(25,54,60,1) 100%, rgba(62,139,97,1) 100%, rgba(14,27,48,1) 100%, rgba(2,0,36,1) 100%, rgba(67,99,93,1) 100%);
        }

        .form-container{
            box-shadow: 1px 2px 35px rgb(85, 83, 83);
            width: 750px;
            height: 650px;
            background-color: rgb(53, 61, 51);
            margin-top: 160px;
            margin-left: 30%;
            position: absolute;
            border-radius: 30px;
        }

        .receipt{
            width: 450px;
            position: absolute;
            height: 400px;
            left: 0px;
            bottom: 160px;
            
            
        }

        form input{
            display: block;
            margin: 30px;
            width: 250px;
            height: 40px;
            border-radius: 30px;
            border-style: none;
            font-size:14px;
            padding-left: 20px;
            font-family:Arial, Helvetica, sans-serif;
            font-weight:750;
            background-color: rgb(74, 81, 72);
            color: aliceblue;
        }

        .input-container{
            position: absolute;
            left: 370px;
            top: 150px;
            
        }

        .button{
            padding: 0;
        }

         .button:hover{
            cursor: pointer;
        }

        .title{
            position: absolute;
            right: 90px;
            top: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 30px;
            color: rgb(255, 255, 255);

        }
    </style>
</head>
<body>
    
    <div class="gradient-background">
        <center>
        <div class="form-container">
            <div><img class="receipt" src="Receipt_.png" alt="Receipt"></div>
            <div class="input-container" >
                <form action="bill.php" method="post">
                <input type="search" name="no">
                <input class="button" type="submit" value="Get Bill">
                <p style="color: white; font-size:25px "><?php
                
                
                
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $no = $_POST["no"];
                    $sql="SELECT Amountrequired FROM consumption WHERE CustomerNo = '$no'";
                    $db = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($db) > 0){
                        $row = mysqli_fetch_assoc($db);
                        echo $row["Amountrequired"] . '$';
                    }
                    
                }
                mysqli_close($conn);                
                ?></p>
                </form>
            </div>
            <p class="title"><span style="color:#359593;">Electricity</span> company</p>
        </div>
        </center>
    </div>
    
</body>
</html>