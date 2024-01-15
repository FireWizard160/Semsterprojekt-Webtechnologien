<?php
$message = ''; // Initialize the message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    include_once 'db/db_conncect.php';

    $db = getDBConnection();

    // Prepare and bind the SQL statement
    $sql = "SELECT * FROM users WHERE Username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result set
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
                // Set global variable isAdmin based on user role (adjust the condition accordingly)
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

    // Close the statement, result set, and database connection
    $stmt->close();
    $result->close();
    $db->close();

}



?>
