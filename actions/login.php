<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    include 'db/db_conncect.php';

    $db = getDBConnection();





    // SQL-Abfrage vorbereiten und ausführen
    $sql = "SELECT * FROM users WHERE Username = '$username'";
    $result = $db->query($sql);

    // Überprüfen, ob ein Datensatz gefunden wurde
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPasswordInDB = $row["Passwort"];

        if (password_verify($password,$hashedPasswordInDB)){
            echo "Anmeldung erfolgreich!";
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_GET['page'] = "profile";

        } else {
            
            $failedAttempt = true;
            $_GET['page'] = "anmeldung";


        }


        //$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
        //$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);




    } else {

        $failedAttempt = true;
        $_GET['page'] = "anmeldung";


    }
}

// Verbindung schließen
$db->close();





// error_reporting(E_ALL);
// ini_set("display_errors", true);



