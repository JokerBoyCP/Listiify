<!DOCTYPE html>
<html lang="en">

<?php

include('db_connector.inc.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listiify</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <nav class="topnav">
            <ul>
                <li><a class="active" href="index.php">HOME</a></li>
                <li><a href="#">LIST</a></li>
                <li><a href="#">ACCOUNT</a></li>
                <li ><a href="signup.php">SIGNUP</a></li>

                <div class="login-container">
                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username/Email...">
                        <input type="password" name="pwd" placeholder="Password...">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    
                    <form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="login-submit">Logout</button>
                    </form>
                </div>
            </ul>
        </nav>
    </header>