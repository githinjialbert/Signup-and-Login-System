<?php

require_once 'session.php';
require_once 'includes/signupView.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Signup Page</title>
</head>
<body>
<main>
        <h2>Get Free Email Updates!</h2>
        <p>Join us for FREE to get instant email updates!</p>
        <form action="includes/signupHandler.inc.php" method="post">
            <?php signup_inputs(); ?>
            <p>Your Information is Safe With Us!</p>
            <button type="submit">Get Access Today</button>
        </form>
    </main>

    <?php
    check_signup_errors();
    ?>
</body>
</html>
