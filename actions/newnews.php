<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["assignment"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    // Check if the file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        echo "<br>";
        $uploadOk = 0;
    }

    // Check if the file size is below the maximum limit
    if ($_FILES["assignment"]["size"] > 15000000) {
        echo "Sorry, your file is too large.";
        echo "<br>";
        $uploadOk = 0;
    }

    // Check if the file is of the accepted file type
    if($pdfFileType != "pdf") {
        echo "<div class='red'>'Sorry, only PDF-files can be accepted!'</div>";
        echo "<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        echo "<br>";
        // If everything is OK, upload the file
    } else {
        if (move_uploaded_file($_FILES["assignment"]["tmp_name"], $target_file)) {
            echo "<div class='green'>The file ". htmlspecialchars( basename( $_FILES["assignment"]["name"])). " has been uploaded.</div>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}
?>