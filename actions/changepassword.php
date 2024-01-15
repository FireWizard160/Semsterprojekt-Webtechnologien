<?php
include 'db/db_conncect.php';

$db = getDBConnection();
$error = 0;
$message = "";

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

            // Überprüfen, ob das neue Passwort und die Bestätigung übereinstimmen
            if ($newPassword == $confirmNewPassword) {
                // Passwort hashen und in der Datenbank aktualisieren
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $updatePasswordSQL = "UPDATE users 
                                      SET Passwort = '$hashedNewPassword' 
                                      WHERE Username = '" . $_SESSION['username'] . "'";

                if ($db->query($updatePasswordSQL) === TRUE) {
                    $message = "Passwort erfolgreich geändert.";

                } else {
                    $message = "Fehler beim Ändern des Passworts: " . $db->error;
                    $error = 1;
                }
            } else {
                $message = "Die neuen Passwörter stimmen nicht überein.";
                $error = 1;
            }
        } else {
            $message = "Das alte Passwort ist nicht korrekt.";
            $error = 1;
        }
    } else {
        $message = "Benutzer nicht gefunden.";
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
