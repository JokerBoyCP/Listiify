<?php

require "header.php";

?>

<main>
    <div class="wrapper-main">
        <h1>Login</h1>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
        </form>
    </div>
</main>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
    }

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
    }

    .wrapper-main {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
        border: none;
        border-radius: 8px;
        padding: 10px;
        font-size: 16px;
        background-color: #f2f2f2;
    }


</style>

<?php

require "footer.php";

?>