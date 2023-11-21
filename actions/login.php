<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

function isValidUser($username, $password)
{
    include "testData/testUsers.php";
    $testUsers = getTestUsers();

    foreach ($testUsers as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            return true;
        }
    }

    return false;
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

if (isValidUser($username, $password)) {


    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    $_GET['page'] = "profile";


} else {
    $failedAttempt = true;
    $_GET['page'] = "login-form";
}


