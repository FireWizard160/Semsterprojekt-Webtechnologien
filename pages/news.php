<?php
if (isset($message)) {
    echo '<br> </br>';
    echo $message;
}
?>

<?php if (isset($_SESSION['logged_in']) && isset($_SESSION['isAdmin'])): ?>
    <a class="btn btn-primary " href="?page=createnews" role="button" style="margin-top: 100px">Neuen Beitrag erstellen</a>
<?php endif; ?>

<?php
include 'db/db_conncect.php';

// Verzeichnis, das die Bilder enthält

$db = getDBConnection();

// SQL-Abfrage für die neuesten Beiträge
$sql = "SELECT title, text, path, date FROM news ORDER BY date DESC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Das Datum ohne Uhrzeit im Format "d.m.Y"
        $formattedDate = date('d.m.Y', strtotime($row['date']));

        echo '<div class="card" id="newsbeiträge" style="width: 64rem;">
                <div class="card-header d-flex justify-content-between align-items-center">
                   <h5 class="card-title">' . $row['title'] . '</h5>
                   <span class="text-end">Veröffentlichungsdatum: ' . $formattedDate . '</span>
                </div>
                <img src="' . $row['path'] . '" alt="' . $row['path'] . '" style="max-width: 300px; margin: 10px;">
                <div class="card-body">
                    <p class="card-text">' . $row['text'] . '</p>
                </div>
              </div>';
    }
} else {
    echo "Keine Beiträge gefunden.";
}

$db->close();
?>
