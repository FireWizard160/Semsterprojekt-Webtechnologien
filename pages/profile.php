

<div class="container">
    <h1>Profil</h1>
    <b>Willkommen <?=$_SESSION['username']?></b>
</div>

   <?php include_once 'db/db_conncect.php';

    $db = getDBConnection();
   // SQL-Abfrage vorbereiten und ausführen
   $sql = "SELECT * FROM users WHERE Username = '".$_SESSION['username']."'";
   $result = $db->query($sql);
   $row = $result->fetch_assoc();
   
   ?>





<div class="mb-3">
    <label for="anrede" class="form-label">Anrede:</label>
    <input type="text" class="form-control" id="anrede" placeholder="<?= $row['Anrede'] ?>" readonly>
</div>

<div class="mb-3">
    <label for="vorname" class="form-label">Vorname:</label>
    <input type="text" class="form-control" id="vorname" placeholder="<?= $row['Vorname'] ?>" readonly>
</div>

<div class="mb-3">
    <label for="nachname" class="form-label">Nachname:</label>
    <input type="text" class="form-control" id="nachname" placeholder="<?= $row['Nachname'] ?>" readonly>
</div>

<div class="mb-3">
    <label for="email" class="form-label">E-Mail:</label>
    <input type="text" class="form-control" id="email" placeholder="<?= $row['EMail'] ?>" readonly>
</div>

<div class="mb-3">
    <label for="username" class="form-label">Username:</label>
    <input type="text" class="form-control" id="username" placeholder="<?= $row['Username'] ?>" readonly>
</div>



<a class="btn btn-primary " href="?page=changeprofiledata-form" role="button" style="margin-top: 100px">Profildaten ändern</a>
<a class="btn btn-primary " href="?page=changepassword-form" role="button" style="margin-top: 100px">Passwort ändern</a>


<?php $db->close();?>


