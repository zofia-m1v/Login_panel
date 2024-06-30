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
        //read from the database
        $user_id = random_num(20);
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "Wrong username or password!";

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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="tlo">
        <form method="post">
            <h1 style="font-size: 5vh;margin: 10px;">Login</h1>
            <input id="text" type="text" name="user_name" placeholder="username...">
            <input id="text" type="password" name="password" placeholder="password..."><br>
            <input class="button" id="button" type="submit" value="Login"><br>
            <a href="signup.php">Click here to signup</a>
        </form>
    </div>
</body>
</html>