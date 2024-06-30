<?php
    session_start();
    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-panel</title>
</head>
<body>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }

        .body{
            margin: 0px;
            height: 100%;
            width: 100%;
        }
        body .tlo{
            height: 100vh;
            width: 100vw;
            background-image: url("image4.jpg");
            position: relative;
            display: flex;
            background-size: 100vw 100vh;
        }

        .tlo h1{
            background-color: white;
            height: 10vh;
            width: 40vw;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10vh;           
            border-radius: 15px;
            opacity: 78%;
            text-justify: center;
            text-align: center;
            
            
        }
        .tlo h2{
            display: flex;
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);

        }
        .tlo a{
            width: 10%;
            height: 5%;
            display: flex;
            position: absolute;
            top: 60%;
            left: 50%;
            font-size: 25px;
            transform: translate(-50%, -50%);

        }

    </style>
    <div class="tlo">
        <h1>Logged in successfully!</h1>
        <h2>Welcome_<?php echo $user_data['user_name'];?>_this is your account!</h2><br>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>