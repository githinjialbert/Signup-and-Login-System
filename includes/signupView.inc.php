<?php

declare(strict_types=1);

function signup_inputs() {
    // First Name
    echo '<div>';
    echo '<label for="firstname">First Name</label>';
    if (isset($_SESSION["signup_data"]["firstname"]) && !isset($_SESSION["error_signup"]["username_taken"])) {
        echo '<input type="text" name="firstname" placeholder="First Name" value="' . htmlspecialchars($_SESSION["signup_data"]["firstname"]) . '">';
    } else {
        echo '<input type="text" name="firstname" placeholder="First Name">';
    }
    echo '</div>';

    // Last Name
    echo '<div>';
    echo '<label for="lastname">Last Name</label>';
    if (isset($_SESSION["signup_data"]["lastname"]) && !isset($_SESSION["error_signup"]["username_taken"])) {
        echo '<input type="text" name="lastname" placeholder="Last Name" value="' . htmlspecialchars($_SESSION["signup_data"]["lastname"]) . '">';
    } else {
        echo '<input type="text" name="lastname" placeholder="Last Name">';
    }
    echo '</div>';

    // Email
    echo '<div>';
    echo '<label for="email">Email</label>';
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["registered_email"]) && !isset($_SESSION["error_signup"]["email_invalid"])) {
        echo '<input type="email" name="email" placeholder="Email" value="' . htmlspecialchars($_SESSION["signup_data"]["email"]) . '">';
    } else {
        echo '<input type="email" name="email" placeholder="Email">';
    }
    echo '</div>';

    // Password
    echo '<div>';
    echo '<label for="password">Password</label>';
    echo '<input type="password" name="pwd" placeholder="Password">';
    echo '</div>';
}


function check_signup_errors() {
    if(isset($_SESSION["error_signup"])) {
        $errors = $_SESSION["error_signup"];

        echo "<br>";

        foreach($errors as $error) {
            
        echo '<p class="errors">' . $error . '</p>';

    }

        unset($_SESSION["error_signup"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {

        echo "<br>";
        echo '<p class="form-succeess">Signup success!</p>';

    }
}