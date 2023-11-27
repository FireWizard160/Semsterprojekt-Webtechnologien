<?php
session_start();



if (isset($_GET['action'])){
    $action = $_GET['action'];

    switch($action) {

        case "login": include("actions/login.php");
            break;

        case "logout": include("actions/logout.php");
            break;

        case"registrierung": include ("actions/registrierung.php");
            break;

        case "newreservation": include("actions/newreservation.php");
            break;
        case "newnews": include("actions/newnews.php");
            break;

        // case "img-upload"
    }

}

/*if(isset($_GET['page']) && $_GET['page'] === 'logout'){


    include 'actions/logout.php';

}
*/

include 'templates/header.html';
include 'templates/navigation.php';

?>
<main class="container">
    <?php


if (!isset($_GET['page'])){

include 'pages/start.php';

} else{

    $page = $_GET['page'];










    switch($page) {

        case 'start': include "pages/start.php";
            break;

        case 'anmeldung': include "pages/login-form.php";
            break;

        case 'hilfe': include "pages/hilfe.php";
            break;

        case 'impressum': include "pages/impressum.php";
            break;

        case 'registrierung': include "pages/registrierung-form.php";
            break;

        case 'profile': include "pages/profile.php";
            break;


        case 'myreservations': include "pages/myreservations.php";
            break;

        case 'newreservation': include "pages/newreservations-form.php";
            break;

        case 'profiledata': include "pages/profiledata.php";
            break;

        case 'changeprofiledata': include "pages/changeprofiledata-form.php";
            break;

        case 'news': include "pages/news.php";
            break;

        case 'createnews': include "pages/createnews.php";
            break;

     //   case ''
        default:
            include "errors/404.html";
    }


}
    ?>
</main>

<?php
include 'templates/footer.html';


?>
