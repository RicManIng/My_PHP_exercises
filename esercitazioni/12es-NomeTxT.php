<?php
// Dati dell'utente
$nome = "Riccardo";
$cognome = "Mancinelli";

// Contenuto del file
$contenuto = "Nome: " . $nome . "\nCognome: " . $cognome;

// Nome del file
$nome_file = "ciao.txt";

// Creazione del file e scrittura dei dati
file_put_contents($nome_file, $contenuto);

echo "Il file $nome_file è stato creato con successo!";
?>