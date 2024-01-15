<?php
include 'db/db_conncect.php';

$db = getDBConnection();
$message = "";


if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];

    // Benutzer-ID abrufen
    $getUserIDQuery = "SELECT userID FROM users WHERE username = '$loggedInUsername'";
    $userIDResult = $db->query($getUserIDQuery);

    if ($userIDResult && $userIDResult->num_rows > 0) {
        $userIDRow = $userIDResult->fetch_assoc();
        $loggedInUserID = $userIDRow['userID'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["picture"]["name"]);
            $uploadOk = 1;
            $pdfFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if the file already exists
            if (file_exists($target_file)) {
                $message = "<div class='red'>Sorry, file already exists.</div>";
                $uploadOk = 0;
            }

            // Schauen ob $uploadOk auf 0 gesetzt wurde durch einen Fehler
            if ($uploadOk == 0) {
                $message .= "<div class='red'>Sorry, your file was not uploaded.</div>";
            } else {
                if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                    // Datum für den Zeitpunkt der Erstellung
                    $currentDateTime = date('Y-m-d H:i:s');

                    // Daten in die Datenbank einfügen
                    $title = $_POST['newstitle'];
                    $text = $_POST['newstext'];
                    $path = $target_file;

                    $insertSQL = "INSERT INTO news (userID, title, text, path, date) VALUES ('$loggedInUserID', '$title', '$text', '$path', '$currentDateTime')";
                    if ($db->query($insertSQL) === TRUE) {
                        $message .= "<div class='green'>The file " . htmlspecialchars(basename($_FILES["picture"]["name"])) . " has been uploaded and saved to the database.</div>";
                    } else {
                        $message .= "<div class='red'>Fehler beim Speichern der Daten in der Datenbank aufgetreten " . $db->error . "</div>";
                    }
                } else {
                    $message .= "<div class='red'>Feher beim Hochladen der Datei</div>";
                }
            }
        }
    } else {
        $message .= "<div class='red'>BenutzerID konnte nicht abgerufen werden.</div>";
    }
} else {
    $message .= "<div class='red'>User nicht eingeloggt</div>";
}

$db->close();

$_GET['page'] = "news";

?>
