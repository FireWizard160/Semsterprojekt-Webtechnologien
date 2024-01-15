<?php
$message = "";
include 'db/db_conncect.php';

$db = getDBConnection();

$username = $_SESSION['username'];

// userID basierend auf dem Benutzernamen abrufen
$userID_query = "SELECT userID FROM users WHERE username = '$username'";
$userID_result = $db->query($userID_query);

if ($userID_result->num_rows > 0) {
    $row = $userID_result->fetch_assoc();
    $userID = $row['userID'];
} else {
    die("Fehler beim Abrufen der userID.");
}

// Formulardaten überprüfen und in die Datenbank einfügen
$anreisedatum = $_POST["anreisedatum"];
$abreisedatum = $_POST["abreisedatum"];

if (isset($_POST["breakfast"])) {
    $fruehstueck = 1;
} else {
    $fruehstueck = 0;
}

if (isset($_POST["pets"])) {
    $haustiere = 1;
} else {
    $haustiere = 0;
}

if (isset($_POST["parking"])) {
    $parkplatz = 1;
} else {
    $parkplatz = 0;
}

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
    $message = "Reservierung erfolgreich eingetragen";
} else {
    $message = "Fehler beim Einfügen der Reservierung ";
}

$db->close();
$_GET['page'] = "myreservations";

?>
