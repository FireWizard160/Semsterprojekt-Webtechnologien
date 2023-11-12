<!DOCTYPE html>

<html>



<head>

<?php include "header.html"?>


</head>
<body>
<?php include "navigation.html"?>
<h2>FAQ</h2>
<div id="accordion">

    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                Wie kann ich ein Zimmer buchen?
            </a>
        </div>
        <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Zimmer können Sie ausschließlich über unsere Website buchen.
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
               Kann man Reservierungen stornieren?
            </a>
        </div>
        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Stornierungen sind möglich. Sollten die Stornierung mindestens 14 Tage vor Beginn des Aufenthalts eingereicht haben, erhalten Sie eine vollständige Rückerstattung der Preises. Andernfalls ist keine Rückerstattung möglich.
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                Darf man Haustiere mitnehmen?
            </a>
        </div>
        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                Ja, die Mitnahme ist erlaubt, allerdings müssen Sie einen kleinen Aufpreis dafür bezahlen und die Mitnahme muss bei der Reservierung bekannt gegeben werden.
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
            Gibt es Parkmöglichkeiten vor dem Hotel?
        </a>
    </div>
    <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
        <div class="card-body">
            Ja, Parkplätze sind vorhanden. Einen Parkplatz beantragen Sie bei der Reservierung, jedoch müssen kleinen Aufpreis dafür bezahlen.
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFive">
        Ist das Frühstück in der Standardreservierung inkludiert?
        </a>
    </div>
    <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
        <div class="card-body">
            Nein, ein Frühstück erhalten Sie nur durch ankreuzen des Feldes "mit Frühstück" bei der Reservierung.
        </div>
    </div>
</div>

<?php include "footer.html"?>
</body>



</html>


