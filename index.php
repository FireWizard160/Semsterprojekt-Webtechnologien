<?php


$action = $_GET['action'];

switch($action) {

    case "login": include("actions/login.php");
        break;

}
include 'templates/header.html';
include 'templates/navigation.php';
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
