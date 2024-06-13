<?php

declare(strict_types=1);

function get_username(object $pdo, string $firstname, string $lastname) {
    $query = "SELECT * FROM users WHERE firstname = :firstname AND lastname = :lastname;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email (object $pdo, string $email) {
    $query = "SELECT * FROM users WHERE email = :email;";
    $stmt= $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function set_user(PDO $pdo, string $firstname, string $lastname, string $email, string $pwd) {

    // Insert user into the database
    $query = "INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);


    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPwd);
    $stmt->execute();

    // Redirect to a success page or login page
    header("Location: ../signupSuccess.php");
    exit();
}