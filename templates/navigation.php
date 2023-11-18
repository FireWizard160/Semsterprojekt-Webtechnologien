<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light container">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if(isset($_SESSION['logged_in'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="?page=profile">Profil</a>
            </li>
            <?php endif;?>
            <?php if(isset($_SESSION['logged_in'])): ?>
                <li class="nav-item">
                    <a class="nav-link" id="logout" href="?page=logout">Logout</a>
                </li>
            <?php endif;?>

            <li class="nav-item">
                <a class="nav-link" href="?page=registrierung">Registrierung</a>
            </li>

            <?php if(!isset($_SESSION['logged_in'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="?page=anmeldung">Login</a>
                </li>
            <?php endif;?>

            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>