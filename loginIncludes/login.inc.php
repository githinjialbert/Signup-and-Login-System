<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : '';

    // Validate that both fields are not empty
    if (empty($email) || empty($pwd)) {
        $errors["input_empty"] = "Fill in all fields";
        $_SESSION["errors_login"] = $errors;
        header("Location: ../loginPage.php");
        die();
    }

    try {
        require_once '../includes/dbh.inc.php';
        require_once 'loginModel.inc.php';
        require_once 'loginContr.inc.php';

        $errors = [];

        // Check for empty input
        if (is_input_empty($email, $pwd)) {
            $errors["input_empty"] = "Fill in all fields";
        }

        // Check if email exists
        $result = get_email($pdo, $email);

        if (is_email_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once '../session.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../loginPage.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../loginPage.php?login=success");

        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

} else {
    header("Location: ../loginPage.php");
    die();
}
