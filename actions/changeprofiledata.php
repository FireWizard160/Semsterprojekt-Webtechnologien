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

    $updateProfileSQL = "UPDATE users 
                         SET Anrede = '$newAnrede', 
                             Vorname = '$newVorname', 
                             Nachname = '$newNachname', 
                             EMail = '$newEmail', 
                             Username = '$newUsername' 
                         WHERE Username = '" . $_SESSION['username'] . "'";

    if ($db->query($updateProfileSQL) === TRUE) {
        echo "Profil erfolgreich aktualisiert.";
        $_GET['page'] = "profile";
    } else {
        echo "Fehler beim Aktualisieren des Profils: " . $db->error;
        $_GET['page'] = "changeprofiledata-form";
    }
}

$db->close();

