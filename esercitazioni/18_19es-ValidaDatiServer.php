<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modulo di Contatto</title>
</head>
<body>

<h2>Modulo di Contatto</h2>

<?php
// Definizione delle variabili e inizializzazione dei messaggi di errore
$nome = $email = $messaggio = "";
$errore_nome = $errore_email = $errore_messaggio = $messaggio_successo = "";

// Verifica se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Validazione del campo Nome
    if (empty($_POST["nome"])) {
        $errore_nome = "Il nome è obbligatorio";
        $valid = false;
    } else {
        $nome = (trim($_POST["nome"])); // questa funzione rimuove spazi e caratteri speciali
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
            $errore_nome = "Sono permessi solo lettere e spazi";
            $valid = false;
        }
    }

    // Validazione del campo Email
    if (empty($_POST["email"])) {
        $errore_email = "L'email è obbligatoria";
        $valid = false;
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errore_email = "Formato email non valido";
            $valid = false;
        }
    }

    // Validazione del campo Messaggio
    if (empty($_POST["messaggio"])) {
        $errore_messaggio = "Il messaggio è obbligatorio";
        $valid = false;
    } else {
        $messaggio = htmlspecialchars(trim($_POST["messaggio"]));
    }

    // Se tutti i campi sono validi, mostra il messaggio di successo
    if ($valid) {
        $messaggio_successo = "Grazie, $nome! Il tuo messaggio è stato inviato con successo.";
        // Qui puoi aggiungere codice per inviare il messaggio via email o salvarlo in un database
    }
}
?>

<form action="" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
    <span style="color:red;"><?php echo $errore_nome; ?></span>
    <br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $errore_email; ?></span>
    <br><br>

    <label for="messaggio">Messaggio:</label>
    <textarea id="messaggio" name="messaggio" rows="4" cols="50"><?php echo $messaggio; ?></textarea>
    <span style="color:red;"><?php echo $errore_messaggio; ?></span>
    <br><br>

    <input type="submit" value="Invia">
</form>

<?php
// Mostra il messaggio di successo, se presente
if (!empty($messaggio_successo)) {
    echo "<p style='color:green;'>$messaggio_successo</p>";
    $file = "18_19es-ValidaDatiServer.txt";
    $fp = fopen($file, "w");
    $contenuto = "Nome: $nome\nEmail: $email\nMessaggio: $messaggio\n";
    fwrite($fp, $contenuto);
    fclose($fp);
}
?>

</body>
</html>
