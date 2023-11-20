<?php
session_start();



if (isset($_GET['action'])){
    $action = $_GET['action'];

    switch($action) {

        case "login": include("actions/login.php");
            break;

    }

}

if(isset($_GET['page']) && $_GET['page'] === 'logout'){


include 'actions/logout.php';

}


include 'templates/header.html';
include 'templates/navigation.php';

if (!isset($_GET['page'])){


} else{

    $page = $_GET['page'];

?>
<main class="container">
    <?php









    switch($page) {



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

        case 'logout': include "actions/logout.php";
            break;


        default:
            include "errors/404.html";
    }


}
    ?>
</main>

<?php
include 'templates/footer.html';


?>
