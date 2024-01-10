<?php

include 'db/db_conncect.php';

$db = getDBConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Profildaten aktualisieren
    $newAnrede = $_POST['anrede'];
    $newVorname = $_POST['vorname'];
    $newNachname = $_POST['nachname'];
    $newEmail = $_POST['email'];
    $newUsername = $_POST['username'];
    $password = $_POST['passwort'];
    $userID = $_POST['userID'];

    if ($_POST['status'] === 'aktiv'){
        $status = 0;
    } else{
        $status = 1;
    }



   $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $updateProfileSQL = "UPDATE users 
                         SET Anrede = '$newAnrede', 
                             Vorname = '$newVorname', 
                             Nachname = '$newNachname', 
                             EMail = '$newEmail', 
                             Username = '$newUsername', 
                            Passwort = '$hashedpassword',
                            status = '$status'
                         WHERE userID = '$userID'";

    if ($db->query($updateProfileSQL) === TRUE) {
        echo "Profil erfolgreich aktualisiert.";
        $_GET['page'] = "userverwaltung";
    } else {
        echo "Fehler beim Aktualisieren des Profils: " . $db->error;
        $_GET['page'] = "changeprofiledata-form";
    }
}

$db->close();

