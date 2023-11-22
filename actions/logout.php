<?php
    session_destroy();
    $_GET['page'] = "anmeldung";
    header('Refresh: 1; URL =index.php?page=anmeldung');
?>
