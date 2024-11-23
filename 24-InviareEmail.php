<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inviare email</title>
</head>
<body>
    <h1>Inviare email</h1>

    <h2>Inviare Email testuali</h2>
    <code>
        mail($to, $subject, $message, $headers, $parameters)<br>
    </code>
    <p>
        <?php
            $arrayIndirizzi = [
                "ric.man@virgilio.it",
                "riccardo.mancinelliing@gmail.com"
            ];
            $a = implode(", ", $arrayIndirizzi);
            $subject = "Prova invio email";
            $message = "Questo è un messaggio di prova";

            if(mail($a, $subject, $message)){
                echo "Email inviata correttamente";
            }else{
                echo "Errore nell'invio dell'email";
            }
        ?>
    </p>
    <hr>

    <h2>Inviare email HTML</h2>
    <code>
        mail($to, $subject, $message, $headers, $parameters)<br>
    </code>
    <p>
        <?php
            $arrayIndirizzi = [
                "ric.man@virgilio.it",
                "riccardo.mancinelliing@gmail.com"
            ];
            $a = implode(", ", $arrayIndirizzi);
            $subject = "Prova invio email";
            $message = "<html><head><title>Questo è un messaggio di prova</title></head>";
            $message .= "<h1>Questo è un messaggio di prova</h1>";
            $message .= "<p>Questo è un paragrafo</p></html>";
            
            $arrayHeaders = [
                "MIME-Version: 1.0",
                "Content-type: text/html; charset=utf-8",
            ];

            $headers = implode("\r\n", $arrayHeaders);

            if(mail($a, $subject, $message, $headers)){
                echo "Email inviata correttamente";
            }else{
                echo "Errore nell'invio dell'email";
            }

        ?>
    </p>
    <hr>
</body>
</html>