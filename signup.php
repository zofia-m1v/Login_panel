<?php
        session_start();
        include("connection.php");
        include("functions.php");
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //something was posted
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];

            if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
            {
                //save to database
                $user_id = random_num(20);
                $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

                mysqli_query($con, $query);
                header("Location: login.php");
                die;
            }else {
                echo "Please enter some valid information!";
            }

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="tlo">
        <form method="post">
            <h1 style="font-size: 5vh;margin: 10px;">Signup</h1>
            <input id="text" type="text" name="user_name" placeholder="username...">
            <input id="text" type="password" name="password" placeholder="password..."><br>
            <input class="button" id="button" type="submit" value="Signup"><br>
            <a href="login.php">Click here to login</a>
        </form>
    </div>
</body>
</html>