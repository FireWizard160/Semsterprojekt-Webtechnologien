<?php

include 'db/db_conncect.php';
$db = getDBConnection();

// Überprüfe, ob die Verbindung erfolgreich hergestellt wurde
if ($db->connect_error) {
    die("Verbindung zur DB konnte nicht hergestellt werden: " . $db->connect_error);
}

// SQL-Statement als Prepared Statement vorbereiten
$sql = "SELECT userID, username, status FROM users";
$stmt = $db->prepare($sql);

// Überprüfe, ob das Prepared Statement erfolgreich vorbereitet wurde
if ($stmt) {
    // Statement ausführen
    $stmt->execute();

    // Ergebnisse binden
    $stmt->bind_result($userID, $username, $status);

    // Ergebnisse abrufen und Karten erstellen
    while ($stmt->fetch()) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">UserID: <?php echo $userID; ?></h5>
                            <p class="card-text">Username: <?php echo $username; ?></p>
                            <p class="card-text">Status: <?php
                                if ($status == 0) {
                                    echo 'aktiv';
                                } else {
                                    echo 'inaktiv';
                                }
                                ; ?></p>
                            <a href="?page=adminchangeusers-form&userID=<?php echo $userID; ?>" class="btn btn-primary">Daten ändern</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    $stmt->close();
} else {
    die('Fehler beim Vorbereiten des Statements');
}


$db->close();
?>
