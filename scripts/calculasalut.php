<?php
if (isset($_POST['nom'], $_POST['cognoms'], $_POST['correu'], $_POST['sexe'], $_POST['pes'],
 $_POST['alçada'], $_POST['edat'], $_POST['activitat'], $_POST['comunitat'])) {

    $nom = $_POST['nom'];
    $cognoms = $_POST['cognoms'];
    $correu = $_POST['correu'];
    $sexe = $_POST['sexe'];
    $pes = floatval($_POST['pes']);
    $alçada_cm = floatval($_POST['alçada']);
    $edat = intval($_POST['edat']);
    $activitat = $_POST['activitat'];
    $comunitat = $_POST['comunitat'];

    $alçada_m = $alçada_cm / 100;

    $imc = $pes / ($alçada_m * $alçada_m);

    if ($imc < 18.5) {
        $missatge_imc = "Estás per sota del pes saludable.";
    } elseif ($imc >= 18.5 && $imc < 24.9) {
        $missatge_imc = "Tens un pes saludable.";
    } elseif ($imc >= 25 && $imc < 29.9) {
        $missatge_imc = "Tens sobrepès.";
    } else {
        $missatge_imc = "Tens obesitat.";
    }

    $aigua = $pes * 0.035;

    if ($activitat == "Alt") {
        $aigua *= 1.2;
    }

    $imc = number_format($imc, 2);
    $aigua = number_format($aigua, 2);

    echo "<h2>Hola <strong style='color: darkblue;'>$nom $cognoms</strong>,</h2>";
    echo "<p>El teu índex de massa corporal (IMC) és <strong style='color: darkgreen;'>$imc</strong>.</p>";
    echo "<p><strong style='color: darkgreen;'>$missatge_imc</strong></p>";
    echo "<p>La quantitat d’aigua recomanada que hauries de consumir diàriament és <strong style='color: darkgreen;'>$aigua litres</strong>.</p>";
    echo "</div>";
} else {
    echo "<p style='color: red;'><strong>Error!: No s'han enviat les dades correctament!</strong></p>";
}
?>