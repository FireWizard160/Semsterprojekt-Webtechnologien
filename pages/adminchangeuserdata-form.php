<?php include 'db/db_conncect.php';

$db = getDBConnection();
// SQL-Abfrage vorbereiten und ausführen
$userID = $_GET['userID'];
$sql = "SELECT * FROM users WHERE userID = '$userID'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

?>


<form method="post" action="?action=admineditusers">

    <input type="hidden" name="userID" value="<?= $userID ?>">

    <div class="mb-3">
        <label for="anrede" class="form-label">Anrede:</label>
        <input type="text" class="form-control" id="anrede" name="anrede" value="<?= $row['Anrede'] ?>">
    </div>

    <div class="mb-3">
        <label for="vorname" class="form-label">Vorname:</label>
        <input type="text" class="form-control" id="vorname" name="vorname" value="<?= $row['Vorname'] ?>">
    </div>

    <div class="mb-3">
        <label for="nachname" class="form-label">Nachname:</label>
        <input type="text" class="form-control" id="nachname" name="nachname" value="<?= $row['Nachname'] ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-Mail:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $row['EMail'] ?>">
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $row['Username'] ?>">
    </div>

    <div class="mb-3">
        <label for="passwort" class="form-label">Passwort:</label>
        <input type="password" class="form-control" id="passwort" name="passwort" value="****">
    </div>

    <div class="form-group">
        <label for="aktivitaet">Aktivitätsstatus</label>
        <select class="form-control" id="status" name="status">
            <option>aktiv</option>
            <option>inaktiv</option>
        </select>
    </div>

    <a href="?page=userverwaltung" class="btn btn-secondary">Abbrechen</a>
    <button type="submit" class="btn btn-primary">Bestätigen</button>
</form>


<?php $db->close();?>

