<?php
if (isset($message)){
    echo "$message";
}
$message ="";
if (isset($_SESSION['logged_in'])){
    echo '<a class="btn btn-primary " href="?page=newreservation" role="button" style="margin-top: 100px">Neues Zimmer reservieren</a>';

}


include 'db/db_conncect.php';
$db = getDBConnection();

// Überprüfe, ob die Verbindung erfolgreich hergestellt wurde
if ($db->connect_error) {
    die("Verbindung zur DB konnte nicht hergestellt werden: " . $db->connect_error);
}


// Überprüfen, ob der Benutzername in der Session vorhanden ist
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];

    // SQL-Statement als Prepared Statement vorbereiten mit JOIN und Bedingung für den eingeloggten Benutzer
    $sql = "SELECT r.reservationID, r.preis, r.reservationStatus 
            FROM reservations r 
            JOIN users u ON r.userID = u.userID
            WHERE u.username = ?";

    $stmt = $db->prepare($sql);

    // Überprüfe, ob das Prepared Statement erfolgreich vorbereitet wurde
    if ($stmt) {
        // Parameter binden
        $stmt->bind_param("s", $loggedInUsername);

        // Statement ausführen
        $stmt->execute();

        // Ergebnisse binden
        $stmt->bind_result($reservationID, $preis, $reservationStatus);

        // Ergebnisse abrufen und Karten erstellen
        while ($stmt->fetch()) {
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ReservationID: <?php echo $reservationID; ?></h5>
                                <p class="card-text">Preis: <?php echo $preis; ?> €</p>
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
                                <a href="?page=myreservationdetails&reservationID=<?php echo $reservationID; ?>" class="btn btn-primary">Details ansehen</a>
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

} else {
    $message = "Benutzer nicht angemeldet, bitte loggen Sie sich ein";
    echo "$message";
}


?>
