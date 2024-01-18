<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    include_once 'db/db_conncect.php';

    $db = getDBConnection();

    // SQL-Statement wird prepared und eingebunden
    $sql = "SELECT * FROM users WHERE Username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    // Überprüfen, ob ein Datensatz gefunden wurde
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Überprüfen, ob der Account inaktiv ist
        if ($row["status"] == 1) {
            $message = "Profil inaktiv, bitte wenden Sie sich an einen Administrator.";
            $_GET['page'] = "anmeldung";
        } else {
            // Account ist aktiv, weiter mit Passwortüberprüfung
            $hashedPasswordInDB = $row["Passwort"];

            if (password_verify($password, $hashedPasswordInDB)) {
                // Variable (isAdmin) wird gesetzt, wenn der user ein Admin ist
                if ($row["admin"] == "1") {
                    $_SESSION['isAdmin'] = true;
                }

                $message = "Anmeldung erfolgreich!";
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;

                $_GET['page'] = "profile";
            } else {
                $failedAttempt = true;
                $_GET['page'] = "anmeldung";
                $message = "Anmeldung fehlgeschlagen. Bitte überprüfen Sie Benutzername und Passwort.";
            }
        }
    } else {
        $failedAttempt = true;
        $_GET['page'] = "anmeldung";
        $message = "Anmeldung fehlgeschlagen. Bitte überprüfen Sie Benutzername und Passwort.";
    }

    // Statement, Db und alle Resulte aus der DB werden geschlossen
    $stmt->close();
    $result->close();
    $db->close();

}



?>
