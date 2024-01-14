<?php
include 'db/db_conncect.php';

$db = getDBConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Reservierungsdaten aktualisieren
    $reservationID = $_POST['reservationID'];
    $userID = $_POST['userID'];
    $status = $_POST['status'];

    // Anpassung des Status gemäß der Datenbank
    if ($status === 'neu') {
        $statusValue = 0;
    } elseif ($status === 'bestaetigt') {
        $statusValue = 1;
    } elseif ($status === 'storniert') {
        $statusValue = 2;
    } else {
        // Falls ein unbekannter Status übergeben wird, handle es hier entsprechend.
        echo "Ungültiger Status übergeben.";
        // Beende das Skript, um weitere Ausführung zu verhindern.
        exit();
    }

    $updateReservationSQL = "UPDATE reservations 
                             SET reservationStatus = '$statusValue'
                             WHERE reservationID = '$reservationID'";

    if ($db->query($updateReservationSQL) === TRUE) {
        echo "Reservierung erfolgreich aktualisiert.";
        $_GET['page'] = "reservationverwaltung";
    } else {
        echo "Fehler beim Aktualisieren der Reservierung: " . $db->error;
    }
}

$db->close();
?>
