<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div class="container">

    <?php if(isset($message)){
        echo '<br>';
        echo $message;
        echo '<br>';
    }
    ?>

    <h1>Anmeldung</h1><br><br>

    <?php if (isset($failedAttempt)): ?>
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i>
            Username oder Passwort ist falsch. Bitte probieren Sie es erneut.
        </div>
    <?php endif; ?>


    <form action="index.php?action=login" method="post">

        <div class="form-group">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username"
                   class="form-control" required="required"/>

        </div>

        <div class="form-group">
            <label for="password">Passwort </label>
            <input type="password" id="password" name="password"
                   class="form-control" required="required"/>

        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Login">


    </form>

</div>



</body>

</html>

