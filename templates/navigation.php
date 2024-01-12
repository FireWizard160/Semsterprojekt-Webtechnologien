

<nav class="navbar navbar-expand-lg navbar-light">
    <div id="navbarcontent" class="container">

        <a class="navbar-brand" href="?page=start">
            <img src="/images/HoteLouvre4_transparent.png" width="300" height="60" class="d-inline-block align-top" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item me-auto" id="news">
                    <a class="nav-link" id="news" href="?page=news">News</a>
                </li>

                <?php if (!isset($_SESSION['logged_in'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=registrierung">Registrierung</a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['logged_in'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=myreservations">Meine Reservierungen</a>
                    </li>
                <?php endif; ?>








                <?php if (!isset($_SESSION['logged_in'])): ?>
                    <li class="nav-item me-auto" id="loginbutton">
                        <a class="nav-link" href="?page=anmeldung">Login</a>
                    </li>
                <?php endif; ?>



                <?php if (isset($_SESSION['logged_in']) && $_SESSION['isAdmin'] = 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=userverwaltung">Userverwaltung</a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['logged_in'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=reservationverwaltung">Reservationverwaltung</a>
                    </li>
                <?php endif; ?>



                <?php if (isset($_SESSION['logged_in'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=profile"> <?php echo $_SESSION['username']?></a>
                    </li>
                <?php endif; ?>





                <?php if (isset($_SESSION['logged_in'])): ?>
                    <li class="nav-item me-auto" id="logoutbutton" value="logout">
                        <a class="nav-link" id="logout" href="?action=logout">Logout</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>