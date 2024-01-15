<?php if(isset($message)){
    echo "$message";

}?>

<form method="post" action="?action=changepassword">
    <div class="mb-3">
        <label for="old_password" class="form-label">Altes Passwort:</label>
        <input type="password" class="form-control" id="old_password" name="old_password" required>
    </div>

    <div class="mb-3">
        <label for="new_password" class="form-label">Neues Passwort:</label>
        <input type="password" class="form-control" id="new_password" name="new_password" required>
    </div>

    <div class="mb-3">
        <label for="confirm_new_password" class="form-label">Neues Passwort bestätigen:</label>
        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
    </div>

    <a href="?page=profile" class="btn btn-secondary">Abbrechen</a>
    <button type="submit" class="btn btn-primary">Passwort ändern</button>
</form>