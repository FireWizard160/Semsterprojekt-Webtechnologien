<?php

    if (!isset($_SESSION['logged_in'])){
        echo'Keine Berechtigung';
        exit();
    }
    if(isset($message)){
        echo '<br> </br>';
        echo $message;
    }
    ?>





<a class="btn btn-primary " href="?page=createnews" role="button" style="margin-top: 100px">Neuen Beitrag erstellen</a>
<?php
   // Verzeichnis, das die Bilder enthält
   $verzeichnis = 'uploads/';

   // Alle Dateien im Verzeichnis auflisten
   $bilder = scandir($verzeichnis);

foreach ($bilder as $bild) {
    $dateipfad=$verzeichnis.$bild;
    if (is_file($dateipfad) && getimagesize($dateipfad)){
      echo '<div class="card" id="newsbeiträge" style="width: 64rem;">
      <div class="card-header">
          Breaking News!
      </div>
      <img src="' . $verzeichnis . $bild . '" alt="' . $bild . '" style="max-width: 300px; margin: 10px;">
      <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
      </div>
  </div>';
    }
}

echo $dateipfad;
   ?>



<div class="card" id="newsbeiträge" style="width: 64rem;">
    <div class="card-header">
        Quote
    </div>
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
</div>