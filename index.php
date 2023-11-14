<?php
include 'templates/header.html';

$action = $_GET['action'];

switch($action) {

    case "login": include("actions/login.php");
        break;

}
$page = $_GET['page'];

switch($page) {

    case 'anmeldung': include "pages/login-form.php";
        break;

    case 'hilfe': include "pages/hilfe.php";
        break;

    case 'impressum': include "pages/impressum.php";
        break;

    case 'registrierung': include "pages/registrierung.php";
        break;

    case 'profile': include "pages/profile.php";
        break;

    default:
        include "errors/404.html";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.html' ?>

<title>Startseite</title>




</head>

<body>
<?php include 'templates/navigation.html' ?>
    <nav id="navigation-top">

        <ul>
            <li> <a href="pages/impressum.php" target="_blank">Impressum</a> </li>
            <li> <a href="pages/registrierung.php">Registrierung</a> </li>
        </ul>

    </nav>

<!-- TODO Newsbeiträge mit Jumbotron machen -->
<div class="mt-4 p-5 bg-secondary text-white rounded">
    <h1>News Thema 1</h1>
    <p>Unser hotel ist jetzt krasser als vorher</p>
</div>

     <br>

      
<?php include 'footer.html'; ?>


<!-- Farben ändern
    Sachen zentriern
    switch case für content
    -->

</body>
</html>