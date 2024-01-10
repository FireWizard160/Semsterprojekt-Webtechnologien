<?php
$message = "";
// Benutzername und Passwörter aus dem Formular erhalten
$benutzername = $_POST['username'];
$anrede = $_POST['foa'];
$vorname = $_POST['firstname'];
$nachname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['pwd'];
$passwordconfirm = $_POST['pwdconfirm'];

// Überprüfen, ob die Passwörter übereinstimmen
if ($password !== $passwordconfirm) {
    $message = "Die Passwörter stimmen nicht überein. Bitte versuche es erneut.";
    $_GET['page'] = "registrierung";
} else {
    // Hier kannst du den Benutzer registrieren oder weitere Aktionen durchführen
    // Hier kannst du den Benutzer registrieren oder weitere Aktionen durchführen
    $message = "Registrierung erfolgreich! Sie können sich nun einloggen!";

    include 'db/db_conncect.php';
    $db = getDBConnection();

// Verwende ein vorbereitetes Statement, um SQL-Injektionen zu verhindern
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (Anrede, Vorname, Nachname, EMail, Username, Passwort, admin) VALUES (?, ?, ?, ?, ?, ?, 0)");
    $stmt->bind_param("ssssss", $anrede, $vorname, $nachname, $email, $benutzername, $hashedpassword);
}
// Überprüfe, ob das Prepared Statement erfolgreich vorbereitet wurde
    if ($stmt) {
        // Statement ausführen
        $stmt->execute();

        // Statement schließen
        $stmt->close();
    } else {
        die('Fehler beim Vorbereiten des Statements: ' . $db->error);
    }

    $db->close();
    $_GET['page'] = "anmeldung";
// Füge hier Code für die erfolgreiche Weiterleitung oder Datenbankoperationen ein.

?>