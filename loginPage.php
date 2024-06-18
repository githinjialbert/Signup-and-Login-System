<?php

require_once 'session.php';
require_once 'loginIncludes/loginView.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
        if (!isset($_SESSION["user_id"])) {?>



        <form action="loginIncludes/login.inc.php" method="post">
            <h3>Login Page</h3>
            <div>
                <label for="emails">Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="pwd" placeholder="Password">
            </div>
            <button type="submit">Log In</button>
        </form>

        <?php } ?>

        <?php
        check_login_errors();
        ?>

<form action="loginIncludes/logout.inc.php" method="post">
    <h3>Log Out</h3>
            <button type="submit">Log Out</button>

        </form>

    </main>
</body>
</html>