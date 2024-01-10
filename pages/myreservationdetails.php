<?php
include 'db/db_conncect.php';

$db = getDBConnection();

// Überprüfen, ob eine Reservierungs-ID übergeben wurde
if (isset($_GET['reservationID'])) {
    $reservationID = $_GET['reservationID'];

    // SQL-Abfrage vorbereiten und ausführen
    $sql = "SELECT r.*, u.username FROM reservations r
            JOIN users u ON r.userID = u.userID
            WHERE r.reservationID = '$reservationID'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Reservierungsdaten anzeigen
        ?>

        <form method="post" action="?action=admineditreservation">

            <div class="mb-3">
                <label for="reservationID" class="form-label">Reservierungs-ID:</label>
                <input type="text" class="form-control" id="reservationID" name="reservationID" value="<?= $reservationID ?>" readonly>
            </div>

            <input type="hidden" name="userID" value="<?= $row['userID'] ?>">

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $row['username'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="anreisedatum" class="form-label">Anreisedatum:</label>
                <input type="text" class="form-control" id="anreisedatum" name="anreisedatum" value="<?= $row['anreisedatum'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="abreisedatum" class="form-label">Abreisedatum:</label>
                <input type="text" class="form-control" id="abreisedatum" name="abreisedatum" value="<?= $row['abreisedatum'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="fruehstueck" class="form-label">Frühstück:</label>
                <input type="text" class="form-control" id="fruehstueck" name="fruehstueck" value="<?= ($row['frühstück'] == 0) ? 'Ja' : 'Nein' ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="haustiere" class="form-label">Haustiere:</label>
                <input type="text" class="form-control" id="haustiere" name="haustiere" value="<?= ($row['haustiere'] == 0) ? 'Ja' : 'Nein' ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="parkplatz" class="form-label">Parkplatz:</label>
                <input type="text" class="form-control" id="parkplatz" name="parkplatz" value="<?= ($row['parkplatz'] == 0) ? 'Ja' : 'Nein' ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="preis" class="form-label">Preis:</label>
                <input type="text" class="form-control" id="preis" name="preis" value="<?= $row['preis'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status: </label>
                <input type="text" class="form-control" id="preis" name="preis" value="<?= ($row['reservationStatus'] == 'neu') ? 'Neu' : (($row['reservationStatus'] == 'bestaetigt') ? 'Bestätigt' : 'Storniert') ?>" readonly>
                <span></span>
            </div>

            <a href="?page=myreservations" class="btn btn-secondary">Zurück</a>

        </form>

        <?php
    } else {
        echo "Reservierung nicht gefunden.";
    }
} else {
    echo "Reservierungs-ID nicht übergeben.";
}

$db->close();
?>

