<?php
include("DB.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
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

        .lamp{
            width: 300px;
            position: absolute;
            height: 400px;
            left: 20px;
            bottom: 130px;
            right: 90px;
            
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
            top: 90px;
            
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
            <div><img class="lamp" src="lamp.png" alt="lamp"></div>
            <div class="input-container" >
                <form action="add.php" method="post">
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="address" placeholder="Address">
                    <input type="tel" name="pno" placeholder="PhoneNumber: 07X - XXX - XXX - X">
                    <input type="text" name="cno" placeholder="Customer.No">
                    <input class="button" name="submit" type="submit" value="ADD">
                    <hr>
                    <input type="text" name="del" placeholder="Delete Customer">
                    <input class="button" name="dele" type="submit" value="Delete">
                </form>
            </div>
            <p class="title"><span style="color: orange;">Electricity</span> company</p>
        </div>
        </center>
    </div>
    
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" and  $_POST['cno'] &&$_POST['submit'] ){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $pno = $_POST["pno"];
    $cno = $_POST["cno"];
    if(empty($name) || empty($address) || empty($pno) || empty($cno)){
        echo"some fields are empty";
    }

    else{
        $sql = "INSERT INTO CUSTOMER (name,address,pno,customerno) 
        values ('$name' , '$address' , '$pno' , '$cno')";
        $db= mysqli_query($conn,$sql);

    }
}

elseif($_SERVER["REQUEST_METHOD"] == "POST"&& $_POST['del']&&$_POST['dele']){
    $del = $_POST["del"];
    $sqldel = "DELETE FROM customer WHERE `CustomerNo` = '$del'";
    $dbdel=mysqli_query($conn,$sqldel);
}




mysqli_close($conn);
?>