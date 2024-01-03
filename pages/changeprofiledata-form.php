
<?php include 'db/db_conncect.php';

$db = getDBConnection();
// SQL-Abfrage vorbereiten und ausführen
$sql = "SELECT * FROM users WHERE Username = '".$_SESSION['username']."'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

?>


<form method="post" action="?action=changeprofiledata">
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

    <a href="?page=profile" class="btn btn-secondary">Abbrechen</a>
    <button type="submit" class="btn btn-primary">Bestätigen</button>
</form>


<?php $db->close();?>
