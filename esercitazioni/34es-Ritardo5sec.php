<?php
// Imposta un ritardo di 5 secondi
sleep(5);

// Legge il contenuto del file JSON
$jsonFile = '16es-menuLaterale.json';
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);

    // Decodifica il JSON in un array PHP
    $menuItems = json_decode($jsonData, true);

    if ($menuItems === null) {
        echo "Errore: Il file JSON non è formattato correttamente.";
    } else {
        echo "<h2>Menu Laterale</h2>";
        echo "<ul>";
        foreach ($menuItems as $item) {
            echo "<li>";
            echo "<a href='{$item['link']}' title='{$item['title']}'>{$item['nome']}</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
} else {
    echo "Errore: Il file JSON non esiste.";
}
?>
