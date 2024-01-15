<?php
    session_destroy();
    $_GET['page'] = "anmeldung";
    header('Refresh: 0.00000000000001; URL =index.php?page=anmeldung');
?>
