<?php
$message="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    // Check if the file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        echo "<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        echo "<br>";
        // If everything is OK, upload the file
    } else {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
          $message="<div class='green'>The file ". htmlspecialchars( basename( $_FILES["picture"]["name"])). " has been uploaded.</div>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
    $_GET['page'] = "news";
?>