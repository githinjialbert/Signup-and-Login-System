<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signupModel.inc.php';
        require_once 'signupContr.inc.php';

        $errors = [];

        if (is_input_empty($firstname, $lastname, $email, $pwd)) {
            $errors["input_empty"] = "Fill in all fields";
        }

        if (is_email_invalid($email)) {
            $errors["email_invalid"] = "Enter a valid email";
        }

        if (is_username_taken($pdo, $firstname, $lastname)) {
            $errors["username_taken"] = "Username is already taken";
        }

        if (is_email_registered($pdo, $email)) {
            $errors["registered_email"] = "Email already exists";
        }

        require_once '../session.php';

        if ($errors) {
            $_SESSION["error_signup"] = $errors;

            $signupData = [
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email,
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: signupPage.php");
            die();
        }

        create_user($pdo, $firstname, $lastname, $email, $pwd);

        header("Location: signupPage.php?signup=success");

        $pdo = null;
        $stmt = null;

        die(); 

    } catch (PDOException $e) {
        die("Connection Failed: " . $e->getMessage());
    }
} else {
    header("Location: signupPage.php");
    die();
}