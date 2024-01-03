<?php
include 'db/db_conncect.php';

$db = getDBConnection();
$error = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Überprüfen, ob das alte Passwort korrekt ist
    $checkOldPasswordSQL = "SELECT * FROM users WHERE Username = '" . $_SESSION['username'] . "'";
    $result = $db->query($checkOldPasswordSQL);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedOldPassword = $row['Passwort'];

        // Passwortüberprüfung
        if (password_verify($oldPassword, $hashedOldPassword)) {
            // Das alte Passwort ist korrekt

            // Überprüfen, ob das neue Passwort und die Bestätigung übereinstimmen
            if ($newPassword == $confirmNewPassword) {
                // Passwort hashen und in der Datenbank aktualisieren
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $updatePasswordSQL = "UPDATE users 
                                      SET Passwort = '$hashedNewPassword' 
                                      WHERE Username = '" . $_SESSION['username'] . "'";

                if ($db->query($updatePasswordSQL) === TRUE) {
                    echo "Passwort erfolgreich geändert.";

                } else {
                    echo "Fehler beim Ändern des Passworts: " . $db->error;
                    $error = 1;
                }
            } else {
                echo "Die neuen Passwörter stimmen nicht überein.";
                $error = 1;
            }
        } else {
            echo "Das alte Passwort ist nicht korrekt.";
            $error = 1;
        }
    } else {
        echo "Benutzer nicht gefunden.";
        $error = 1;
    }
}

if ($error == 1){
    $_GET['page'] = "changepassword-form";

} else{
    $_GET['page'] = "profile";
}

$db->close();
?>
