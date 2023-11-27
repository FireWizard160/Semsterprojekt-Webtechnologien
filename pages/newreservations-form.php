<html>
<h1>Neue Reservierung</h1>
<br><br>


<form action="index.php?action=newreservation" method="post" id="newreservationform">
    <div class="container mt-10" id="newreservationformcontent">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="datepicker">Wähle ein Anreisedatum aus:</label>
                    <input type="date" id="anreisedatum" name="datepicker" class="form-control">
                </div>
            </div>
        

        <br> <br>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="datepicker">Wähle ein Abreisedatum aus:</label>
                    <input type="date" id="abreisedatum" name="datepicker" class="form-control">
                </div>
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