<html>
<h1>Neue Reservierung</h1>
<br><br>


<form action="index.php?action=login" method="post" id="newreservationform">
    <div class="container mt-10" id="newreservationformcontent">
    <h2>Anreisedatum (bitte wählen):</h2>

    <div class="row">
        <div class="col-sm-4">
            <label for="selectOption" class="form-label" >Tag:</label>
            <select class="form-select form-select-lg" id="anreisetag">

                    <?php
                    for ($x = 1; $x <= 31; $x++) {
                        echo "<option>$x</option>";
                    }
                    ?>

            </select>
        </div>


        <div class="col-sm-4">
            <label for="selectOption" class="form-label" >Monat:</label>
            <select class="form-select form-select-lg" id="anreisemonat">
                <?php
                for ($x = 1; $x <= 12; $x++) {
                    echo "<option>$x</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-sm-4">
            <label for="selectOption" class="form-label" >Jahr:</label>
            <select class="form-select form-select-lg" id="anreisejahr">
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
            </select>


        </div>
    </div>
    <br> <br>
    <h2>Abreisedatum (bitte wählen):</h2>
    <div class="row">
        <div class="col-sm-4">
            <label for="selectOption" class="form-label">Tag:</label>
            <select class="form-select form-select-lg" id="abreisetag">

                <?php
                for ($x = 1; $x <= 31; $x++) {
                    echo "<option>$x</option>";
                }
                ?>

            </select>
        </div>


        <div class="col-sm-4">
            <label for="selectOption" class="form-label">Monat:</label>
            <select class="form-select form-select-lg" id="abreisemonat">
                <?php
                for ($x = 1; $x <= 12; $x++) {
                    echo "<option>$x</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-sm-4">
            <label for="selectOption" class="form-label">Jahr:</label>
            <select class="form-select form-select-lg" id="abreisejahr">
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
            </select>


        </div>
    </div>
    <br>
    <br>

    <h2>Zusatzangebote (mit Aufpreis): </h2>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="breakfast" name="breakfast" value="breakfast">
        <label class="form-check-label">Frühstück</label>
        <br>
        <input class="form-check-input" type="checkbox" id="pets" name="pets" value="pets">
        <label class="form-check-label">Mitnahme von Haustieren</label>
        <br>
        <input class="form-check-input" type="checkbox" id="parking" name="parking" value="parking">
        <label class="form-check-label">Parkplatz</label>
    </div>
    <br>

    <input type="submit" class="btn btn-primary" value="Reservieren">
    <br><br>
</div>
</form>


</html>


