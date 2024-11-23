<?php
// Funzione per validare il codice fiscale
function validaCodiceFiscale($codiceFiscale) {
    // Rimuove eventuali spazi e converte in maiuscolo
    $codiceFiscale = strtoupper(trim($codiceFiscale));

    // Verifica che la lunghezza sia esattamente di 16 caratteri
    if (strlen($codiceFiscale) !== 16) {
        return "Errore: Il codice fiscale deve essere di 16 caratteri.";
    }

    // Pattern di controllo formale del codice fiscale italiano
    // Le prime 6 lettere (cognome e nome): A-Z
    // Le successive 2 cifre (anno): 0-9
    // Una lettera (mese): A-Z
    // Due cifre (giorno): 0-9
    // Quattro caratteri alfanumerici (codice del comune): A-Z, 0-9
    // Una lettera di controllo finale: A-Z
    $pattern = "/^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z0-9]{4}[A-Z]$/";

    // Verifica che il codice fiscale rispetti il pattern
    if (!preg_match($pattern, $codiceFiscale)) {
        return "Errore: Il codice fiscale non rispetta il formato previsto.";
    }

    return "Il codice fiscale è formalmente corretto.";
}

// Esempio di utilizzo
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $codiceFiscale = $_POST['codice_fiscale'];
    $risultato = validaCodiceFiscale($codiceFiscale);
    echo "<p>$risultato</p>";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Verifica Codice Fiscale</title>
</head>
<body>
    <h2>Controlla Codice Fiscale</h2>
    <form method="post">
        <label for="codice_fiscale">Inserisci il codice fiscale:</label>
        <input type="text" name="codice_fiscale" id="codice_fiscale" required><br>
        <input type="submit" value="Verifica">
    </form>
</body>
</html>
