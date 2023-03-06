<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (isset($_POST['username'])) {echo $_SESSION['username'] .  " is logged in!";}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listiify</title>
    <link rel="stylesheet" href="stylee.css">
</head>

<body>

    </head>

    <body>
        <header>
            <span class="image-clickable">
                <a href="index.php">
                    <img src="img/Listiify.png" alt="main-logo" class="logo" />
                </a>
            </span>

            <?php
            
            if ($_SESSION == NULL) {

            ?>

                <nav>
                    <ul class="nav-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>

                    </ul>
                </nav>




                <a href="login.php"><button>LOGIN</button></a>
                <a href="signup.php"><button>SIGNUP</button></a>


            <?php

            } else {
                // Logged in

            ?>

                <nav>
                    <ul class="nav-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="list.php">MyList</a></li>
                    </ul>
                </nav>

                <a href="includes/logout.inc.php"><button>LOGOUT</button></a>



            <?php
            }
            ?>
        </header>