<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Scrivi nel file</title>
</head>
<body>

<h2>Inserisci un testo da salvare nel file "modulo.txt"</h2>

<form action="" method="post">
    <label for="testo">Testo:</label><br>
    <textarea id="testo" name="testo" rows="4" cols="50"></textarea><br><br>
    <input type="submit" value="Salva nel file">
</form>

<?php
// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prendi il testo inviato dal modulo
    $testo = $_POST['testo'];
    
    // Nome del file
    $nome_file = "modulo.txt";

    // Scrivi il testo nel file
    file_put_contents($nome_file, $testo);

    echo "<p>Il testo è stato salvato con successo in $nome_file!</p>";
}
?>

</body>
</html>