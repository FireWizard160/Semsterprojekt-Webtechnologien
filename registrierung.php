<!DOCTYPE html>
<html>
<head>
    <title>Anmeldung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1>Registrierung</h1><br><br>



<div class="row">
    <div class="col-3">col-3</div>




    <div class="col-6">
        
        <form>

        <div class="mb-3">
            <label for="foa" class="form-label">Anrede:</label>
            <input type="text" class="form-control" id="foa" placeholder="Enter form of adress" name="formofadress">
          </div>
          
          <div class="mb-3">
            <label for="firstname" class="form-label">Vorname:</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname">
          </div>
    
          <div class="mb-3">
            <label for="lastname" class="form-label">Nachname:</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
          </div>
    
          <div class="mb-3 mt-3">
            <label for="email" class="form-label">E-Mail:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
    
          <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
          </div>
          
          <div class="mb-3">
            <label for="pwd" class="form-label">Passwort:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
          </div>
    
          <div class="mb-3">
            <label for="pwdconfirm" class="form-label">Passwort bestätigen:</label>
            <input type="password" class="form-control" id="pwdconfirm" placeholder="Confirm password" name="pswdconfirm">
          </div>
    
        <button type="submit" class="btn btn-primary">Registrierung abschließen</button>
      </form>
        
        
        
    
    
    </div>




    <div class="col-3">col-3</div>


  </div>



    

    

<!-- TODO: auslagern -->

<h1>Anmeldung</h1><br><br>

<form title="Anmeldung">
    <label for="username">Username: </label>
    <input type="text" id="username"><br>

    <label for="password">Passwort: </label>
    <input type="password" id="password">


</form>

<a href="index.php"> Zurück zur Hauptseite</a>
</body>


</html>