<?php
// Funzione per estrarre le consonanti, seguita dalle vocali
function estraiConsonantiVocali($stringa) {
    $consonanti = '';
    $vocali = '';
    $stringa = strtoupper($stringa);
    foreach (str_split($stringa) as $lettera) {
        if (preg_match('/[AEIOU]/', $lettera)) {
            $vocali .= $lettera;
        } elseif (preg_match('/[A-Z]/', $lettera)) {
            $consonanti .= $lettera;
        }
    }
    return [$consonanti, $vocali];
}

// Funzione per ottenere le tre lettere per nome e cognome
function generaTreLettere($stringa, $isNome = false) {
    list($consonanti, $vocali) = estraiConsonantiVocali($stringa);
    if (strlen($consonanti) >= 3) {
        return $isNome && strlen($consonanti) > 3 ? $consonanti[0] . $consonanti[2] . $consonanti[3] : substr($consonanti, 0, 3);
    }
    $risultato = $consonanti . substr($vocali, 0, 3 - strlen($consonanti));
    return str_pad($risultato, 3, 'X');
}

// Funzione per calcolare il mese
function calcolaMese($mese) {
    $mesi = ['A', 'B', 'C', 'D', 'E', 'H', 'L', 'M', 'P', 'R', 'S', 'T'];
    return $mesi[$mese - 1];
}

// Funzione per ottenere il codice catastale
function codiceComune($comune) {
    $csvFile = fopen("comuniItaliani.csv", "r");
    while (($data = fgetcsv($csvFile)) !== FALSE) {
        if (strtolower(trim($data[1])) === strtolower(trim($comune))) {
            fclose($csvFile);
            return trim($data[6]);
        }
    }
    fclose($csvFile);
    return false;
}

// Funzione per calcolare il codice fiscale completo
function calcolaCodiceFiscale($nome, $cognome, $anno, $mese, $giorno, $comune, $genere) {
    // Prime tre lettere del cognome
    $codiceCognome = generaTreLettere($cognome);

    // Prime tre lettere del nome
    $codiceNome = generaTreLettere($nome, true);

    // Codice anno (ultime due cifre)
    $codiceAnno = substr($anno, -2);

    // Codice mese
    $codiceMese = calcolaMese($mese);

    // Codice giorno con l'aggiunta di 40 se femmina
    $codiceGiorno = str_pad($genere === 'F' ? $giorno + 40 : $giorno, 2, '0', STR_PAD_LEFT);

    // Codice catastale
    $codiceCatastale = codiceComune($comune);

    // Combinazione finale senza il carattere di controllo
    $codiceBase = $codiceCognome . $codiceNome . $codiceAnno . $codiceMese . $codiceGiorno . $codiceCatastale;

    // Calcolo del carattere di controllo
    $carattereControllo = calcolaCarattereControllo($codiceBase);

    return $codiceBase . $carattereControllo;
}

// Funzione per calcolare il carattere di controllo
function calcolaCarattereControllo($codice) {
    $pari = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5];
    $dispari = [1, 0, 5, 7, 9, 13, 15, 17, 19, 21, 1, 0, 5, 7, 9, 13, 15, 17, 19, 21, 1, 0, 5, 7, 9, 13];
    $somma = 0;

    for ($i = 0; $i < 15; $i++) {
        $char = $codice[$i];
        $val = is_numeric($char) ? $char : ord($char) - ord('A');
        $somma += ($i % 2 === 0) ? $dispari[$val] : $pari[$val];
    }

    return chr(($somma % 26) + ord('A'));
}

// Validazione e calcolo codice fiscale
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $anno = $_POST['anno'];
    $mese = $_POST['mese'];
    $giorno = $_POST['giorno'];
    $comune = $_POST['comune'];
    $genere = $_POST['genere'];

    $codiceFiscale = calcolaCodiceFiscale($nome, $cognome, $anno, $mese, $giorno, $comune, $genere);

    echo "<p>Il tuo codice fiscale è: <strong>$codiceFiscale</strong></p>";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Calcolo Codice Fiscale</title>
</head>
<body>
    <h2>Calcolo Codice Fiscale</h2>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" id="cognome" required><br>

        <label for="anno">Anno di nascita:</label>
        <input type="number" name="anno" id="anno" min="1900" max="2100" required><br>

        <label for="mese">Mese di nascita:</label>
        <input type="number" name="mese" id="mese" min="1" max="12" required><br>

        <label for="giorno">Giorno di nascita:</label>
        <input type="number" name="giorno" id="giorno" min="1" max="31" required><br>

        <label for="comune">Comune di nascita:</label>
        <input type="text" name="comune" id="comune" required><br>

        <label for="genere">Genere:</label>
        <select name="genere" id="genere" required>
            <option value="M">Maschio</option>
            <option value="F">Femmina</option>
        </select><br>

        <input type="submit" value="Calcola Codice Fiscale">
    </form>
</body>
</html>
