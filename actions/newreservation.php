<?php
include 'db/db_conncect.php';
$_GET['page'] = "myreservations";
$db = getDBConnection();

// Annahme: Die userID wird aus der Session geholt
// Achte darauf, dass du die Benutzerauthentifizierung implementierst und die userID in der Session gespeichert ist.

$username = $_SESSION['username'];

// userID basierend auf dem Benutzernamen abrufen
$userID_query = "SELECT userID FROM users WHERE username = '$username'";
$userID_result = $db->query($userID_query);

if ($userID_result->num_rows > 0) {
    $row = $userID_result->fetch_assoc();
    $userID = $row['userID'];
} else {
    // Hier solltest du eine Fehlerbehandlung implementieren, falls die userID nicht gefunden wird.
    die("Fehler beim Abrufen der userID.");
}

// Formulardaten überprüfen und in die Datenbank einfügen

    $anreisedatum = $_POST["anreisedatum"];
    $abreisedatum = $_POST["abreisedatum"];
    $fruehstueck = isset($_POST["breakfast"]) ? 1 : 0;
    $haustiere = isset($_POST["pets"]) ? 1 : 0;
    $parkplatz = isset($_POST["parking"]) ? 1 : 0;

    // Anzahl der Tage berechnen
    $start_date = new DateTime($anreisedatum);
    $end_date = new DateTime($abreisedatum);
    $interval = $start_date->diff($end_date);
    $anzahl_tage = $interval->days;

    // Preis berechnen
    $preis_pro_tag = 20;
    $zusatzangebote_preis = ($fruehstueck + $haustiere + $parkplatz) * 10;
    $gesamt_preis = $anzahl_tage * $preis_pro_tag + $zusatzangebote_preis;

    // SQL-Query zum Einfügen der Daten
    $sql = "INSERT INTO reservations (userID, anreisedatum, abreisedatum, frühstück, haustiere, parkplatz, preis) VALUES ('$userID', '$anreisedatum', '$abreisedatum', $fruehstueck, $haustiere, $parkplatz, $gesamt_preis)";

    if ($db->query($sql) === TRUE) {
        echo "Reservierung erfolgreich eingetragen";
    } else {
        echo "Fehler beim Einfügen der Reservierung: " . $db->error;
    }



// Verbindung schließen
$db->close();


?>