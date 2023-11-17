<?php
// Benutzername und Passwörter aus dem Formular erhalten
$benutzername = $_POST['username'];
$password = $_POST['pwd'];
$passwordconfirm = $_POST['pwdconfirm'];

// Überprüfen, ob die Passwörter übereinstimmen
if ($password !== $passwordconfirm) {
    echo "Die Passwörter stimmen nicht überein. Bitte versuche es erneut.";
} else {
    // Hier kannst du den Benutzer registrieren oder weitere Aktionen durchführen
    echo "Registrierung erfolgreich!";
    // Füge hier Code für die erfolgreiche Weiterleitung oder Datenbankoperationen ein.
}
?>
