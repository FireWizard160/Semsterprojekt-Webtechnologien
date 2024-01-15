<?php

if(isset($message)){
    echo "$message";
    echo '<br>';
}

include 'db/db_conncect.php';
$db = getDBConnection();

// Überprüfe, ob die Verbindung erfolgreich hergestellt wurde
if ($db->connect_error) {
    die("Verbindung zur DB konnte nicht hergestellt werden: " . $db->connect_error);
}

// SQL-Statement als Prepared Statement vorbereiten mit JOIN
$sql = "SELECT r.reservationID, u.username, r.reservationStatus 
        FROM reservations r 
        JOIN users u ON r.userID = u.userID";
$stmt = $db->prepare($sql);

// Überprüfe, ob das Prepared Statement erfolgreich vorbereitet wurde
if ($stmt) {
    // Statement ausführen
    $stmt->execute();

    // Ergebnisse binden
    $stmt->bind_result($reservationID, $username, $reservationStatus);

    // Ergebnisse abrufen und Karten erstellen
    while ($stmt->fetch()) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ReservationID: <?php echo $reservationID; ?></h5>
                            <p class="card-text">Username: <?php echo $username; ?></p>
                            <p class="card-text">Status: <?php
                                if ($reservationStatus == 0) {
                                    echo 'Neu';
                                } elseif ($reservationStatus == 1) {
                                    echo 'Bestätigt';
                                } elseif ($reservationStatus == 2) {
                                    echo 'Storniert';
                                } else {
                                    echo 'Unbekannt';
                                }
                                ; ?></p>
                            <a href="?page=adminreservationdetails&reservationID=<?php echo $reservationID; ?>" class="btn btn-primary">Details ansehen / Status ändern</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    // Statement schließen
    $stmt->close();
} else {
    die('Fehler beim Vorbereiten des Statements: ' . $db->error);
}

// Datenbankverbindung schließen
$db->close();
?>
