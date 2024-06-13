<?php

declare(strict_types=1);

function is_input_empty (string $firstname, string $lastname, string $email, string $pwd) {
    if (empty($firstname) || empty($lastname) || empty($email) || empty($pwd)) {
        return true; 
    }
    else {
        return false;
    }
}

function is_email_invalid (string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; 
    }
    else {
        return false;
    }
}

function is_username_taken (object $pdo, string $firstname, string $lastname) {
    if (get_username($pdo, $firstname, $lastname)) {
        return true; 
    }
    else {
        return false;
    }
}

function is_email_registered ($pdo, $email) {
    if (get_email ($pdo, $email)) {
        return true; 
    }
    else {
        return false;
    }
}   

function create_user(PDO $pdo, string $firstname, string $lastname, string $email, string $pwd) {
    set_user($pdo, $firstname, $lastname, $email, $pwd);
}